<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Gallery $gallery)
    {
        return view('images.index',compact('gallery'));
    }

    public function create(Gallery $gallery)
    {
        return view('images.create',compact('gallery'));
    }

    public function store(Request $request,Gallery $gallery)
    {
        $gallery->addMediaFromRequest('file')
                ->usingName($request->name)
                ->toMediaCollection();
        return redirect()->route('gallery.index',['gallery'=>$gallery])->with('success','Album is created successfully');
    }

    public function destroy(Gallery $gallery,$index)
    {
        $gallery->getMedia()[$index]->delete();
        return back();
    }
}
