<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Redis;

class PostController extends Controller
{
    public function index()
    {
        $posts = unserialize(Redis::get('posts'));

        if (!$posts) {
            $posts = Post::all();
            Redis::set('posts', serialize($posts));
        }

        return view('home', ['posts' => $posts]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('edit', ['post' => $post]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'bail|required|unique:posts|max:255',
            'content' => 'required',
        ]);

        Post::find($id)->update([
            'title' => request('title'),
            'content' => request('content')
        ]);

        return redirect()->route('index');
    }

    /**
     * Show the form to create a new blog post.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a new blog post.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'bail|required|unique:posts|max:255',
            'content' => 'required',
        ]);

        $formData = $request->all();
        Post::create($formData);

        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('index');
    }
}
