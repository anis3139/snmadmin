<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->unsignedBigInteger('tag_id')->nullable();
            $table->text('title')->nullable();
            $table->text('titleBn')->nullable();
            $table->text('titleEn')->nullable();
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->longText('descriptionEn')->nullable();
            $table->longText('descriptionBn')->nullable();
            $table->integer('view_count')->default(0);
            $table->boolean('is_approved')->default(true);
            $table->boolean('status')->default(1)->comment('0 => inactive, 1 => active, 2 => pending' );
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
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
        Schema::dropIfExists('blog');
    }
}
