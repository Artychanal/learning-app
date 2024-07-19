<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $post = Post::where('is_published', 0)->first();
        dump($post->title);
        dd('end');
    }

    public function create() {
        $postsArr = [
            [
                'title' => 'title of post',
                'content' => 'some content',
                'image' => 'image.jpg',
                'likes' => 20,
                'is_published' => 1,
            ],
            [
                'title' => 'another title of post',
                'content' => 'another some content',
                'image' => 'anotherImage.jpg',
                'likes' => 50,
                'is_published' => 1,
            ],
        ];

        foreach ($postsArr as $item){
            dump($item);
            Post::create($item);
        }

        dd('created');
    }

    public function update() {
        $post = Post::find(6);

        $post->update([
            'title' => '111updated',
            'content' => '111updated',
            'image' => '111updated',
        ]);
        dd('updated');
    }

    public function delete() {
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('deleted');
    }

    public function firstOrCreate() {
        $anotherPost = [
            'title' => 'some post',
            'content' => 'some content',
            'image' => 'someImage.jpg',
            'likes' => 5000,
            'is_published' => 1,
        ];
         $post = Post::firstOrCreate([
             'title' => 'some title of post'
         ], [
             'title' => 'some title of post',
             'content' => 'some interesting content',
             'image' => 'image.jpg',
             'likes' => 5000,
             'is_published' => 1,
         ]);
         dump($post->content);
        dd('finished');
    }

    public function updateOrCreate() {
        $anotherPost = [
            'title' => 'some title not of post',
            'content' => 'update or create some content',
            'image' => 'update or create image.jpg',
            'likes' => 3000,
            'is_published' => 0,
        ];

        $post = Post::updateOrCreate([
            'title' => 'some title not of post',
        ], $anotherPost);
        dump($post->content);
        dd('updated');
    }
}
