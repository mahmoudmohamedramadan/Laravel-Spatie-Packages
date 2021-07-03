<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use Spatie\Searchable\ModelSearchAspect;

class UserPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('tags')->get();

        /* retrieving posts that have any of the given tags */
        // Post::withAnyTags(['python', 'tag2'])->get();

        /* retrieve posts that have all of the given tags */
        // Post::withAllTags(['python', 'tag2'])->get();

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validatePost($request);

        $post = Post::create([
            'user_id' => auth()->id(),
            'title' => $data["title"],
            'body' => $data["body"],
            // 'tags' => preg_split('/,/', $data['tags']),
        ]);

        /* you can attach only one tag to the saved post */
        // $post->attachTag('c#');
        /* or, you can attach an array */
        // $post->attachTags(['java', 'python']);

        /* you can detach only one tag to the saved post */
        // $post->detachTag('c#');
        /* or, you can detach an array */
        // $post->detachTags(['java', 'python']);
        /* `syncTags()` method will remove all of the records, and will add `java` and `python`  */
        // $post->syncTags(['java', 'python']);

        return back()->with("success", "data saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $search
     * @return \Illuminate\Http\Response
     */
    public function show($search)
    {
        $posts = (new Search())
            ->registerModel(Post::class, function (ModelSearchAspect $modelSearchAspect) {
                $modelSearchAspect
                    ->addSearchableAttribute('user_id')
                    ->addSearchableAttribute('title');
            })
            ->search($search);

        return view('posts.search', compact('posts'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $this->validatePost($request);

        $post->update([
            'user_id' => auth()->id(),
            'title' => $data["title"],
            'body' => $data["body"],
            'tags' => preg_split('/,/', $data['tags']),
        ]);

        return back()->with("success", "data saved successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }

    /**
     * Validate the post data
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    private function validatePost($request)
    {
        return $request->validate([
            'title' => 'required|min:5|max:30',
            'body' => 'required|min:5|max:255',
            'tags' => ['required'],
        ]);
    }
}
