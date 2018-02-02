<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();

        $post = new Post;
        $post->title= 'Mi primer posts';
        $post->excerpt='primer posts';
        $post->body='<p>Este es mi primer posts</p>';
        $post->published_at=Carbon::now()->subDay(4);
        $post->category_id=1;
        $post->save();


        $post = new Post;
        $post->title= 'Mi segundo posts';
        $post->excerpt='segundo posts';
        $post->body='<p>Este es mi segundo posts</p>';
        $post->published_at=Carbon::now()->subDay(3);
        $post->category_id=2;
        $post->save();

        $post = new Post;
        $post->title= 'Mi tercer posts';
        $post->excerpt='tercer posts';
        $post->body='<p>Este es mi tercer posts</p>';
        $post->published_at=Carbon::now()->subDay(2);
        $post->category_id=1;
        $post->save();

        $post = new Post;
        $post->title= 'Mi cuarto posts';
        $post->excerpt='cuarto posts';
        $post->body='<p>Este es mi cuarto posts</p>';
        $post->published_at=Carbon::now()->subDay(1);
        $post->category_id=2;
        $post->save();
    }
}
