<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


/**
 * @method static \Illuminate\Database\Query\Builder|\App\User increments($value)
 */
class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(Blueprint $table = null)
    {
        
        
        Schema::create('posts', function (Blueprint $table) {
            
            $table->increments('id');
            $table->unsignedInteger('author_id');
            $table->string('title');
            $table->string('read_more');
            $table->text('content');
            $table->unsignedInteger('comment_count');
            $table->timestamps();
            $table->engine = 'MyISAM';
            
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
