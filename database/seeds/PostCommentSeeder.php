<?php

use Illuminate\Database\Seeder;
use \App\Model\Post;
use \App\Model\Comment;


class PostCommentSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        $content = "aaaaaaaaaaa xxxxxxxxx zzzzzzzzz";
        for ($i = 1; $i < 20; $i++) {

            $post = new Post();
            
            $post->title ="${i} posts";
            $post->author_id = 1;
            $post->read_more = substr($content,0,120);
            $post->content = $content;
            
            $post->save();
            
            $maxComments = mt_rand(3, 15);
            
            
            for($j = 0;$j<=$maxComments;$j++){
                
                $comment = new \App\Model\Comment();
                $comment->commenter = 'no name';
                $comment->comment = substr($content, 0,120);
                $comment->email = 'xyz@gmail.com';
                $comment->approved = 1;
                $post->comments()->save($comment);
                $post->increment('comment_count');
                
                
            }
        }
    }

}

