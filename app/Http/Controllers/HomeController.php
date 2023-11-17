<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $posts = Post::with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('home', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function post(Post $post)
    {
        return view('post', compact('post'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function userPosts(User $user)
    {
        $posts = Post::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user-posts', compact('user', 'posts'));
    }
}
