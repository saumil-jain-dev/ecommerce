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
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->unsignedBigInteger('author_id')->nullable();
            $table->string('slug')->nullable(); // For SEO-friendly URLs
            $table->string('image')->nullable(); // For blog post images
            $table->text('excerpt')->nullable(); // Short description or summary
            $table->enum('blog_status', ['draft', 'published'])->default('draft'); // Status of the blog post
            $table->timestamp('published_at')->nullable(); // Date and time when the blog post was published
            $table->tinyInteger('status')->default(1)->comment('1-Active, 2-Inactive');
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
        Schema::dropIfExists('blogs');
    }
}
