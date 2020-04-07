<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new Post();
        $post->save();
    }
}
