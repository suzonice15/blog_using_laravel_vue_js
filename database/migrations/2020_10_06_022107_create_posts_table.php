<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->integer('post_id');
            $table->string('post_title')->nullable();
            $table->string('post_name')->nullable();
            $table->text('post_description')->nullable();
            $table->integer('visitor')->unsigned();
            $table->integer('folder')->unsigned();
            $table->tinyInteger('status');
            $table->string('user')->nullable();
            $table->dateTime('modified_time');
            $table->string('feasured_image');
            $table->string('seo_title')->nullable;
            $table->string('seo_keywords')->nullable;
            $table->string('seo_content')->nullable;
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
        Schema::dropIfExists('posts');
    }
}
