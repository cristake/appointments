<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1516824153ContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            if(Schema::hasColumn('contacts', 'skype')) {
                $table->dropColumn('skype');
            }
            
        });
Schema::table('contacts', function (Blueprint $table) {
            if(! Schema::hasColumn('contacts', 'deleted_at')) {
                $table->softDeletes();
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
        Schema::table('contacts', function (Blueprint $table) {
            if(Schema::hasColumn('contacts', 'deleted_at')) {
                $table->dropColumn('deleted_at');
            }
            
        });
        Schema::table('contacts', function (Blueprint $table) {
                        $table->string('skype')->nullable();
                
        });

    }
}
