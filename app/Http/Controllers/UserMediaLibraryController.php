<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserMediaLibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->has('id')) {
            $id = request()->query('id');

            if (is_numeric($id)) {
                /* use `getFirstMedia` if you want to download that file */
                return auth()->user()->getMedia()[$id - 1];
            }

            return abort(404, 'Invalid Query');
        }

        $allMedia = auth()->user()->getMedia();

        return view('media_library.index', compact('allMedia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('media_library.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateMedia($request);
        $image = uploadFile('image', 'public/media', '/media/');

        if (!empty($image)) {
            auth()->user()
                /* add media by passing the uploaded file NOT the path into the `addMedia()` */
                ->addMedia($data['image'])
                // ->addMediaFromUrl("http://localhost:8000/media/{$image}")
                ->usingName($image)
                /* also you can add media by passing the path of uploaded file, and the disk name */
                // ->addMediaFromDisk("/media/{$image}", "public")
                ->toMediaCollection($data['collection_name']);
        }

        return back()->with('success', 'data saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        auth()->user()->getMedia()[$id - 1]->delete();

        return redirect()->route('media_library.index');
    }

    private function validateMedia($request)
    {
        return $request->validate([
            'collection_name' => '',
            'image' => 'required|image|mimes:png,jpg',
        ]);
    }
}
