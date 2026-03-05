<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->tinyText('password');
            $table->tinyText('accessToken');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user');
    }
};
