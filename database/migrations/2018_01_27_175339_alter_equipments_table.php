<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('equipments', function (Blueprint $table) {
            if(Schema::hasColumn('equipments', 'is_available')) {
                $table->dropColumn('is_available');
            }
        });

        Schema::table('equipments', function (Blueprint $table) {
            $table->string('speed');            
            $table->string('link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipments', function (Blueprint $table) {
            if(Schema::hasColumn('equipments', ['speed', 'link'])) {
                $table->dropColumn(['speed', 'link']);
            }
        });

        Schema::table('equipments', function (Blueprint $table) {
            $table->string('is_available')->nullable();            
        });
    }
}
