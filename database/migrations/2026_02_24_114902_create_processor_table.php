<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('processor', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyText('imageUrl');
            $table->foreignId('brandId');
            $table->integer('socketTypeId');
            $table->integer('cores');
            $table->float('baseFrequency');
            $table->float('maxFrequency');
            $table->float('cacheMemory');
            $table->integer('tdp');
            $table->index(['brandId'], 'brandId');
            $table->index(['socketTypeId'], 'socketTypeId');
        });
    }

    public function down()
    {
        Schema::dropIfExists('processor');
    }
};
