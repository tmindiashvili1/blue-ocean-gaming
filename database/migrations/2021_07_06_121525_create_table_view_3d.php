<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableView3d extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('view_3d', function (Blueprint $table) {
            $table->id();
            $table->date('date')->index();
            $table->unsignedInteger('playerid')->index();
            $table->unsignedInteger('agentid')->index();
            $table->char('currency',3);
            $table->decimal('bet',10,2)->nullable();
            $table->decimal('win',10,2)->nullable();
            $table->decimal('tournament',10,2)->nullable();
            $table->decimal('net',10,2);
            $table->decimal('fin',10,2)->nullable();
            $table->string('aams_ticket',40);
            $table->string('aams_table',40);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('view_3d');
    }
}
