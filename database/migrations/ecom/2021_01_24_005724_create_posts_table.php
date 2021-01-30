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
        Schema::connection('ecommerce')->create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->on('ecom.categories');
            $table->text('image')->nullable();
            $table->text('video')->nullable();
            $table->string('title_en')->unique();
            $table->string('title_fr')->unique();
            $table->string('title_es')->unique();
            $table->text('text_en');
            $table->text('text_fr');
            $table->text('text_es');
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
        Schema::connection('ecommerce')->dropIfExists('posts');
    }
}
