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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tmdb_id')->unique();
            $table->string('title');
            $table->string('slug');
            $table->text('overview');
            $table->date('release_date');
            $table->string('runtime');
            $table->string('language');
            $table->text('poster_path');
            $table->text('backdrop_path')->nullable();
            $table->string('video_format');
            $table->boolean('is_public')->default(0);
            $table->unsignedBigInteger('visits')->default(0);
            $table->decimal('rating', places: 1);
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
        Schema::dropIfExists('movies');
    }
};
