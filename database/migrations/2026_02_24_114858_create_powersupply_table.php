<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('powerSupply', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyText('imageUrl');
            $table->foreignId('brandId');
            $table->integer('potency');
            $table->enum('badge80Plus', ['none', 'white', 'bronze', 'silver', 'gold', 'platinum', 'titanium']);
            $table->index(['brandId'], 'brandId');
        });
    }

    public function down()
    {
        Schema::dropIfExists('powerSupply');
    }
};
