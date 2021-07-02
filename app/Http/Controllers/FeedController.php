<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeds = Feed::get();

        return view('feeds.index', compact('feeds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('feeds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateFeed($request);

        Feed::create([
            'title' => $data['title'],
            'summary' => $data['summary'],
            'link' => $data['link'],
            'author_name' => $data['author_name'],
            'author_email' => $data['author_email'],
        ]);

        return back()->with('success', 'data saved successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function edit(Feed $feed)
    {
        return view('feeds.create', compact('feed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feed $feed)
    {
        $data = $this->validateFeed($request);

        $feed->update([
            'title' => $data['title'],
            'summary' => $data['summary'],
            'link' => $data['link'],
            'author_name' => $data['author_name'],
            'author_email' => $data['author_email'],
        ]);

        return back()->with('success', 'data saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feed  $feed

     * @return \Illuminate\Http\Response
     */
    public function destroy(Feed $feed)
    {
        $feed->delete();

        return redirect()->route('feeds.index');
    }

    /**
     * Validate the feed data
     *
     * @param \Illuminate\Http\Request  $request
     * @return array
     */
    public function validateFeed($request)
    {
        return $request->validate([
            'title' => ['required', 'unique:feeds,title,' . $request->id],
            'summary' => ['required', 'max:255'],
            'link' => ['required', 'url'],
            'author_name' => ['required', 'exists:users,name'],
            'author_email' => ['required', 'exists:users,email'],
        ]);
    }
}
