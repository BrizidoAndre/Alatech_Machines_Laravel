<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('graphicCard', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyText('imageUrl');
            $table->foreignId('brandId');
            $table->integer('memorySize');
            $table->enum('memoryType', ['gddr5', 'gddr6']);
            $table->integer('minimumPowerSupply');
            $table->boolean('supportMultiGpu');
            $table->index(['brandId'], 'brandId');
        });
    }

    public function down()
    {
        Schema::dropIfExists('graphicCard');
    }
};
