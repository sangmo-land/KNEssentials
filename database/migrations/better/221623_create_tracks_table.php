<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
            Schema::create('tracks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('album_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('title');
            $table->integer('duration')->comment('in seconds');
            $table->string('file_path');
            $table->unsignedInteger('track_number')->nullable();
            $table->string('genre')->nullable();
            $table->date('release_date')->nullable();
            $table->text('lyrics')->nullable();
            $table->unsignedInteger('plays')->default(0);
            $table->timestamps();
        });
    }

    /**s
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracks');
    }
};
