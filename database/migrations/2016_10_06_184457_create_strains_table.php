<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStrainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('strains', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bank_id')->nullable();
            $table->string('name');
            $table->integer('sativa')->nullable();
            $table->integer('indica')->nullable();
            $table->integer('rudelaris')->nullable();
            $table->text('description')->nullable();
            $table->integer('thc')->nullable();
            $table->integer('cbd')->nullable();
            $table->integer('bank_flowering')->nullable();
            $table->enum('type', ['automatica','feminizada','normal'])->default('normal');
            $table->boolean('validated')->default(false); 
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
        Schema::drop('strains');
    }
}
