<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PhotoGalleryController extends Controller
{
    public function show()
    {
        $photo_galleries = PhotoGallery::latest()->get();
        return view('backend.photo_gallery.view_photo', compact('photo_galleries'));
    }

    public function add()
    {
        return view('backend.photo_gallery.add_photo');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
            'image' =>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $photo = new PhotoGallery();
        $photo->title = $request->title;

        $image = $request->file('image');
        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fill_name = $image_name . '.' . $ext;
            //----Resize Main Image----
            $upload_path = 'public/backend/upload/posts/photo_gallery/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(700, 390)->save($image_url);
            $photo->image = $image_url;
        }
        $photo->save();
        $notification = array(
            'messege' => "Photo Added Successfully :)",
            'alert-type' => 'success'
        );
        return redirect()->route('view.photos')->with($notification);
    }

    public function edit($id)
    {
        $photo = PhotoGallery::find($id);
        return view('backend.photo_gallery.edit_photo', compact('photo'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
            'image' =>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $photo = PhotoGallery::find($id);
        $photo->title = $request->title;

        $image = $request->file('image');
        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fill_name = $image_name . '.' . $ext;
            //----Resize Main Image----
            $upload_path = 'public/backend/upload/posts/photo_gallery/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(700, 390)->save($image_url);
            if(!empty($photo->image)){
                unlink($photo->image);
            }
            $photo->image = $image_url;
        }
        $photo->save();
        $notification = array(
            'messege' => "Photo Updated Successfully :)",
            'alert-type' => 'success'
        );
        return redirect()->route('view.photos')->with($notification);
    }

    public function destroy($id)
    {
        $photo = PhotoGallery::find($id);
        if(!empty($photo->image)){
            unlink($photo->image);
        }
        $photo->delete();
        $notification = array(
            'messege' => "Photo Deleted Successfully :)",
            'alert-type' => 'success'
        );
        return redirect()->route('view.photos')->with($notification);
    }

    public function status(Request $request)
    {
        $photo = PhotoGallery::find($request->id);
        $photo->status = $request->status;
        $photo->save();
        return response()->json(['messege' => 'success']);
    }
}
