<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGifImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gif_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('gif_id');

            $table->char('type', 64);
            $table->text('url');
            $table->text('file_name');

            $table->foreign('gif_id')->references('id')->on('gifs')->onDelete('cascade');
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
        Schema::dropIfExists('gif_images');
    }
}
