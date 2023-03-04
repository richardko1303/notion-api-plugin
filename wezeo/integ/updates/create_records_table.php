<?php namespace Wezeo\Integ\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateRecordsTable extends Migration
{
    public function up()
    {
        Schema::create('wezeo_integ_records', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');

            $table->string('project_name');
            $table->integer('wgrid_project_id');
            $table->string('notion_block_id');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wezeo_integ_records');
    }
}
