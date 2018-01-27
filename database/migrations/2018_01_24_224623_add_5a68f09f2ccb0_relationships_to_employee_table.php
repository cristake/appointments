<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5a68f09f2ccb0RelationshipsToEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function(Blueprint $table) {
            if (!Schema::hasColumn('employees', 'department_id')) {
                $table->integer('department_id')->unsigned()->nullable();
                $table->foreign('department_id', '110825_5a68e96fd528d')->references('id')->on('departments')->onDelete('cascade');
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
        Schema::table('employees', function(Blueprint $table) {
            
        });
    }
}
