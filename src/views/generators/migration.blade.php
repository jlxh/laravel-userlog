<?php echo '<?php' ?>

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UserLogSetupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table for storing user log
        Schema::create('{{ $userLogTable }}', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->comment('user id');
            $table->string('title')->comment('display title');
            $table->enum('type', ['A', 'D', 'U', 'S'])->default('S')->comment('operation type');
            $table->string('object')->comment('operation module');
            $table->integer('object_id')->unsigned()->comment('operation object id');
            $table->text('data')->comment('operation data');
            $table->text('sql')->comment('operation sql');
            $table->string('ip', 15)->comment('user ip');
            $table->timestamp('pushed_at')->comment('pushed time');
            $table->timestamp('poped_at')->comment('poped time');
            $table->timestamp('created_at')->comment('created time');
            $table->timestamp('deleted_at')->comment('deleted time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('{{ $userLogTable }}');
    }
}
