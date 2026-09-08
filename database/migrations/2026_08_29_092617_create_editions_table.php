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
        Schema::create('editions', function (Blueprint $table) {
            $table->id();
            $table->string('isbn_10')->nullable()->unique();
            $table->string('isbn_13')->nullable()->unique();
            $table->string('google_volume_id')->nullable()->unique();
            $table->string('open_library_edition_id')->nullable()->unique();
            $table->foreignId('book_id')->constrained();
            $table->foreignId('language_id')->constrained();
            $table->string('cover');
            $table->dateTime('release_date');
            $table->text('summary');
            $table->integer('page_count')->nullable();
            $table->string('publisher')->nullable();
            $table->foreignId("format_id")->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('editions');
    }
};
