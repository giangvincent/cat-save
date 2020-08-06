<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('hashtags')->nullable();
            $table->string('image');
            $table->string('content')->nullable();
            $table->unsignedBigInteger('author_id');
            $table->string('status')->default('publish');
            $table->string('common_key')->nullable();
            $table->unsignedBigInteger('cat_id');
            
            $table->timestamps();
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
}
