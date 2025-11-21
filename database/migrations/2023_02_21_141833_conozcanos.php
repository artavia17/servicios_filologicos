<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conozcanos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('photo');
            $table->longText('descripcion');
            $table->longText('slug');
            $table->string('status')->default('public');
            $table->longText('video');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conozcanos');
    }
};
