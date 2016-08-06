<?php

namespace Jlxh\UserLog;

/*
 * This file is part of UserLog,
 * a userlog management solution for Laravel.
 *
 * @license MIT
 * @package Jlxh\UserLog
 */

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class MigrationCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'userlog:migration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a migration following the UserLog specifications.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $this->laravel->view->addNamespace('userlog', substr(__DIR__, 0, -8) . 'views');

        $userLogTable = Config::get('userlog.table_name');

        $this->line('');
        $this->info("Tables: $userLogTable");

        $message = "A migration that creates '$userLogTable'" . ' tables will be created in database/migrations directory';

        $this->comment($message);
        $this->line('');

        if ($this->confirm('Proceed with the migration creation? [Yes|no]', 'Yes')) {
            $this->line('');

            $this->info('Creating migration...');
            if ($this->createMigration($userLogTable)) {
                $this->info('Migration successfully created!');
            } else {
                $this->error(
                    "Couldn't create migration.\n Check the write permissions" .
                    ' within the database/migrations directory.'
                );
            }

            $this->line('');
        }
    }

    /**
     * Create the migration.
     *
     * @param string $name
     *
     * @return bool
     */
    protected function createMigration($userLogTable)
    {
        $migrationFile = base_path('/database/migrations') . '/' . date('Y_m_d_His') . '_userlog_setup_tables.php';

        $data = compact('userLogTable');

        $output = $this->laravel->view->make('userlog::generators.migration')->with($data)->render();

        if (!file_exists($migrationFile) && $fs = fopen($migrationFile, 'x')) {
            fwrite($fs, $output);
            fclose($fs);

            return true;
        }

        return false;
    }
}
