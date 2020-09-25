<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumsController extends Controller
{
    //

    public function index()
    {
        $albums = Album::with('photos')->get();
//        return dd($albums);
        return view('albums.index')->with('albums', $albums);
    }

    public function create()
    {
        return view('albums.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'cover-image' => 'required|image',
        ]);

        $filename = pathinfo($request->file('cover-image')->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $request->file('cover-image')->getClientOriginalExtension();
        $filenameToStore = $filename . '_' . time() . '.' . $extension;

        $request->file('cover-image')->storeAs('/public/album_covers', $filenameToStore);

        $album = new Album();

        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image = $filenameToStore;
        $album->save();
        return redirect()->to('/')->with('success', 'Album created successfully!!!');
    }

    public function show($albumId)
    {
        $album = Album::with('photos')->find($albumId);
        return view('albums.show')->with('album', $album);
    }

    public function destroy($albumId)
    {
        $album = Album::find($albumId);
        if (Storage::delete('/public/album_covers/' . $album->cover_image)) {
            if(Storage::deleteDirectory('/public/albums/' . $albumId)){
                Photo::where("album_id", $albumId)->delete();
            }
            $album->delete();
            return redirect('/')->with('success', 'Album Deleted Successfully!!!');
        }
    }
}
