<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('screen_readers', function (Blueprint $table) {
            $table->id();
            $table->string('screen_reader_eng');
            $table->string('screen_reader_hin');
            $table->string('website');
            $table->enum('type', ['Free', 'Commercial']);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('screen_readers');
    }
};
