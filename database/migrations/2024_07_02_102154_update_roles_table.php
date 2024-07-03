<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRolesTable extends Migration
{
    public function up()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->string('guard_name', 125)->default('web')->change();
        });
    }

    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->string('guard_name')->default(null)->change();
        });
    }
}
