<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveImagesColumnFromNewsTable extends Migration
{
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn('images');
        });
    }

    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->string('images')->nullable();
        });
    }
}

