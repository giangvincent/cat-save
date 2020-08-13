<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contents', function (Blueprint $table) {
            $table->text('image')->change();
            $table->renameColumn('image', 'images');
            $table->dropColumn('content');
            $table->string('slug')->after('title');
            $table->text('hashtags')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contents', function (Blueprint $table) {
            $table->renameColumn('images', 'image');
            $table->string('image')->change();
            $table->string('content')->after('image');
            $table->dropColumn('slug');
            $table->string('hashtags')->change();
        });
    }
}
