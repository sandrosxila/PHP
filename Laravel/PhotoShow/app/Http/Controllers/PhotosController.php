<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function create($albumId){
        return view('photos.create')->with('albumId',$albumId);
    }

    public function store(Request $request, $albumId){
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'photo' => 'required|image',
        ]);

        $filename = pathinfo($request->file('photo')->getClientOriginalName(),PATHINFO_FILENAME);
        $extension = $request->file('photo')->getClientOriginalExtension();
        $filenameToStore = $filename . '_' . time() . '.' . $extension;

        $request->file('photo')->storeAs('/public/albums/'.$albumId, $filenameToStore);

        $photo = new Photo();

        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->photo = $filenameToStore;
        $photo->album_id = $albumId;
        $photo->size = $request->file('photo')->getSize();
        $photo->save();
        return redirect()->to('/albums/'.$albumId)->with('success', 'Photo uploaded successfully!!!');
    }

    public function show($photoId){
        $photo = Photo::find($photoId);
        return view('photos.show')->with('photo',$photo);
    }

    public function destroy($photoId){
        $photo = Photo::find($photoId);
        if(Storage::delete('/public/albums/'.$photo->album_id.'/'.$photo->photo)){
            $albumId = $photo->album_id;
            $photo->delete();
            return redirect('/albums/'.$albumId)->with('success','Photo Deleted successfully');
        }
    }
}
