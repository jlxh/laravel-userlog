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
        // Create table for storing roles
        Schema::create('{{ $userLogTable }}', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->comment('用户ID');
            $table->enum('type', ['A', 'D', 'U', 'S'])->default('S')->comment('操作类型(增删改查)');
            $table->string('title')->comment('显示标题');
            $table->text('data')->comment('操作数据');
            $table->text('sql')->comment('SQL语句');
            $table->string('ip', 15)->comment('用户IP');
            $table->timestamps('pushed_at')->comment('入队时间');
            $table->timestamps('poped_at')->comment('出队时间');
            $table->timestamps('created_at')->comment('创建时间');
            $table->timestamps('deleted_at')->comment('删除时间');
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
