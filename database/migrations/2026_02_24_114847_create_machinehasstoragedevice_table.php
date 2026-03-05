<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('machineHasStorageDevice', function (Blueprint $table) {
            $table->foreignId('machineId');
            $table->integer('storageDeviceId');
            $table->integer('amount');
            $table->unique(['machineId', 'storageDeviceId'], 'PRIMARY');
            $table->index(['storageDeviceId'], 'storageDeviceId');
        });
    }

    public function down()
    {
        Schema::dropIfExists('machineHasStorageDevice');
    }
};
