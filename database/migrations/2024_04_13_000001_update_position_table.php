<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePositionTable extends Migration
{
    public function up()
    {
        Schema::table('position', function (Blueprint $table) {
            // First drop the existing department column
            $table->dropColumn('department');
            
            // Add the new department_code column
            $table->string('department_code')->after('position_name');
            
            // Add foreign key
            $table->foreign('department_code')
                  ->references('department_code')
                  ->on('departments')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('position', function (Blueprint $table) {
            $table->dropForeign(['department_code']);
            $table->dropColumn('department_code');
            $table->string('department');
        });
    }
}
