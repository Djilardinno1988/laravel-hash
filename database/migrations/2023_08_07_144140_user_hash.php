<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hash', function (Blueprint $table) {
            $table->id();
            $table->string('item');
            $table->string('hash');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hash');
    }
};
