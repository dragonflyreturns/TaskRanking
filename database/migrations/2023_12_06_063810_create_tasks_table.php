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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->string('color_id')->constrained()->default(1);
            $table->dateTime('end_date')->nullable();
            $table->dateTime('fast_end_date')->nullable();
            $table->longText('body')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
