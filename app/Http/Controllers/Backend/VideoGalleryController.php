<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\VideoGallery;
use Illuminate\Http\Request;

class VideoGalleryController extends Controller
{
    public function show()
    {
        $video_galleries = VideoGallery::all();
        return view('backend.video_gallery.view_video', compact('video_galleries'));
    }

    public function edit($id)
    {
        $video_gallery = VideoGallery::find($id);
        return view('backend.video_gallery.edit_video', compact('video_gallery'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
           'embed_code' => 'required|url'
        ]);

        $video_gallery = VideoGallery::find($id);
        $video_gallery->embed_code = $request->embed_code;
        $video_gallery->save();

        $notification = array(
            'messege' => "Video Updated Successfully :)",
            'alert-type' => 'success'
        );
        return redirect()->route('view.video')->with($notification);
    }

    public function status(Request $request){
        $video_gallery = VideoGallery::find($request->id);
        $video_gallery->status = $request->status;
        $video_gallery->save();
        return response()->json(['messege' => 'success']);
    }
}
