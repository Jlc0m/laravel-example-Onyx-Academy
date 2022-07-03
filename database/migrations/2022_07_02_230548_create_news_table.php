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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            
            $table->string('author');
            $table->string('title');
            $table->text('description');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();

            $table->index('user_id', 'news_user_idx');
            $table->foreign('user_id', 'news_user_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
};
