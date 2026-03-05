<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('motherboard', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyText('imageUrl');
            $table->foreignId('brandId');
            $table->integer('socketTypeId');
            $table->integer('ramMemoryTypeId');
            $table->integer('ramMemorySlots');
            $table->integer('maxTdp');
            $table->integer('sataSlots');
            $table->integer('m2Slots');
            $table->integer('pciSlots');
            $table->index(['brandId'], 'brandId');
            $table->index(['socketTypeId'], 'socketTypeId');
            $table->index(['ramMemoryTypeId'], 'ramMemoryTypeId');
        });
    }

    public function down()
    {
        Schema::dropIfExists('motherboard');
    }
};
