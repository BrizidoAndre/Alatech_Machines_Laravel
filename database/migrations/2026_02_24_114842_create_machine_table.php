<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('machine', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyText('description');
            $table->tinyText('imageUrl');
            $table->integer('motherboardId');
            $table->integer('processorId');
            $table->integer('ramMemoryId');
            $table->integer('ramMemoryAmount');
            $table->foreignId('graphicCardId');
            $table->integer('graphicCardAmount');
            $table->integer('powerSupplyId');
            $table->index(['motherboardId'], 'motherboardId');
            $table->index(['processorId'], 'processorId');
            $table->index(['ramMemoryId'], 'ramMemoryId');
            $table->index(['graphicCardId'], 'graphicCardId');
            $table->index(['powerSupplyId'], 'powerSupplyId');
        });
    }

    public function down()
    {
        Schema::dropIfExists('machine');
    }
};
