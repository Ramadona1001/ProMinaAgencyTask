<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $galleries = Gallery::where('user_id',auth()->user()->id)->paginate(12);
        return view('gallery.index',compact('galleries'));
    }

    public function create()
    {
        return view('gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:1|max:255',
        ]);

        $gallery = new Gallery();
        $gallery->name = $request->name;
        $gallery->user_id = auth()->user()->id;
        $gallery->save();

        return redirect()->route('gallery.index')->with('success','Album is created successfully');
    }

    public function show(Gallery $gallery)
    {
        return view('gallery.show',compact('gallery'));
    }

    public function edit(Gallery $gallery)
    {
        return view('gallery.edit',compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'name' => 'required|min:1|max:255',
        ]);

        $gallery->name = $request->name;
        $gallery->user_id = auth()->user()->id;
        $gallery->save();

        return redirect()->route('gallery.index')->with('success','Album is updated successfully');
    }

    public function move(Gallery $gallery,Request $request)
    {
        for ($i = 0; $i < $gallery->getMedia()->count(); $i++){
           $gallery->getMedia()[$i]->model_id = $request->album_name;
           $gallery->getMedia()[$i]->save();
        }
        return redirect()->route('gallery.index')->with('success','Album is moved successfully');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->clearMediaCollection();
        $gallery->delete();
        return redirect()->route('gallery.index')->with('success','Album is deleted successfully');
    }
}
