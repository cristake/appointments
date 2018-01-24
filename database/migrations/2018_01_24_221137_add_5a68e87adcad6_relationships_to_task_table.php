<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5a68e87adcad6RelationshipsToTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function(Blueprint $table) {
            if (!Schema::hasColumn('tasks', 'equipment_id')) {
                $table->integer('equipment_id')->unsigned()->nullable();
                $table->foreign('equipment_id', '110825_5a68e87911cce')->references('id')->on('equipments')->onDelete('cascade');
                }
                if (!Schema::hasColumn('tasks', 'employee_id')) {
                $table->integer('employee_id')->unsigned()->nullable();
                $table->foreign('employee_id', '110825_5a68e8791d7f1')->references('id')->on('employees')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function(Blueprint $table) {
            
        });
    }
}
