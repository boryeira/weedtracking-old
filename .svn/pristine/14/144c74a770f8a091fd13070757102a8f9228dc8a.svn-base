<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('plant_id')->nullable();
            $table->integer('user_id');
            $table->integer('feed_id');
            $table->integer('post_id')->nullable();
            $table->enum('type', ['text','video','image','phase','comment','day','feedback']);
            $table->integer('type_id')->nullable();
            $table->text('value');
            $table->integer('phase_id');
            $table->integer('phase_day');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
