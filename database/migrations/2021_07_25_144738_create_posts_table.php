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
            $table->id();
            $table->string('title');
            $table->string('img');
            $table->text('text');
            $table->unsignedBigInteger('categories_id');
            $table->timestamps();

            $table->foreign('categories_id') //создание ключа
            ->references('id')
                ->on('categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   Schema::table('posts', function (Blueprint $table) { //  удаление ключа
        $table->dropForeign('posts_categories_id_foreign');

    });
        Schema::dropIfExists('posts');
    }
}
