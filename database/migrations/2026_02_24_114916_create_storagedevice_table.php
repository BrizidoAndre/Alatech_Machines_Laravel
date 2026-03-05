<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('storageDevice', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyText('imageUrl');
            $table->foreignId('brandId');
            $table->enum('storageDeviceType', ['hdd', 'ssd']);
            $table->integer('size');
            $table->enum('storageDeviceInterface', ['sata', 'm2']);
            $table->index(['brandId'], 'brandId');
        });
    }

    public function down()
    {
        Schema::dropIfExists('storageDevice');
    }
};
