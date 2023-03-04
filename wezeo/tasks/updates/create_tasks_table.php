<?php namespace Wezeo\Tasks\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('wezeo_tasks_tasks', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('task_name');
            $table->integer('wgrid_task_id');
            $table->string('notion_block_id');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wezeo_tasks_tasks');
    }
}
