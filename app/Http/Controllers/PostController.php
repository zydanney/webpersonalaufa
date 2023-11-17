<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::user()->id;

        if ($request->has('thumbnail')) {
            $path = 'uploads/posts/thumbnail/';
            $file = $request->file('thumbnail');
            $fileName = $path . Str::random(5) . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/' . $path;
            $file->move($destinationPath, $fileName);
            $validated['thumbnail'] = $fileName;
        } else {
            $validated['thumbnail'] = null;
        }

        $post = Post::create($validated);

        if (!$post) {
            return redirect()->route('posts.index')->with(['status' => 'error', 'color' => 'red', 'message' => 'Failed to save post.']);
        }

        return redirect()->route('posts.index')->with(['status' => 'success', 'color' => 'green', 'message' => 'Post has been saved.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (Auth::user()->id != $post->user_id) {
            abort(404);
        }

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::user()->id;

        if ($request->has('thumbnail')) {
            $path = 'uploads/posts/thumbnail/';
            $file = $request->file('thumbnail');
            $fileName = $path . Str::random(5) . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/' . $path;
            $file->move($destinationPath, $fileName);
            $validated['thumbnail'] = $fileName;
        } else {
            $validated['thumbnail'] = $post->thumbnail;
        }

        $post->update($validated);

        if (!$post) {
            return redirect()->route('posts.index')->with(['status' => 'error', 'color' => 'red', 'message' => 'Failed to update post.']);
        }

        return redirect()->route('posts.index')->with(['status' => 'success', 'color' => 'green', 'message' => 'Post has been updated.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (Storage::exists($post->thumbnail)) {
            Storage::delete($post->thumbnail);
        }

        $post->delete();

        return redirect()->route('posts.index')->with(['status' => 'success', 'color' => 'green', 'message' => 'Post was deleted.']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatables()
    {
        $collection = Post::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $posts = collect();
        foreach ($collection as $item) {
            $posts->push((object) [
                'id' => $item->id,
                'user_id' => $item->user_id,
                'title' => $item->title,
                'description' => $item->description,
                'content' => $item->content,
                'thumbnail' => $item->thumbnail,
                'created_at' => $item->created_at_tz,
                'updated_at' => $item->updated_at_tz
            ]);
        }

        return DataTables::of($posts)
            ->addIndexColumn()
            ->addColumn('action', function ($posts) {
                return '
                    <div class="flex gap-2">
                        <a href="' . route('posts.show', $posts->id) . '"
                            <button type="button" class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Show</button>
                        </a>
                        <a href="' . route('posts.edit', $posts->id) . '"
                            <button type="button" class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
                        </a>
                        <form id="form-delete-' . $posts->id . '" action="' . route('posts.destroy', $posts->id) . '" method="post">
                            <input type="hidden" name="_token" value="' . csrf_token() . '">
                            ' . method_field('delete') . '
                            <button type="button" class="btn-delete px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="confirmDelete(event, ' . $posts->id . ')">Delete</button>
                        </form>
                    </div>
                ';
            })
            ->toJson();
    }
}
