<?php

namespace App\Http\Controllers\Backend;

use App\Models\Ads;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AdsController extends Controller
{
    public function show(){
        $ads = Ads::orderBy('id', 'asc')->get();
        return view('backend.ads.view_ads', compact('ads'));
    }

    public function edit($id){
        $ads = Ads::find($id);
        return view('backend.ads.edit_ads', compact('ads'));
    }

    public function update(Request $request, $id){

        $this->validate($request, [
            'link' => 'required|url',
            'image' =>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $ads = Ads::find($id);
        $ads->link = $request->link;

        $image = $request->file('image');
        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fill_name = $image_name . '.' . $ext;
            //----Resize Main Image----
            $upload_path = 'public/backend/upload/posts/ads/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(725, 100)->save($image_url);
            if(!empty($ads->image)){
                unlink($ads->image);
            }

            $ads->image = $image_url;
        }
        $ads->save();

        $notification = array(
            'messege' => "Ads Updated Successfully :)",
            'alert-type' => 'success'
        );
        return redirect()->route('view.ads')->with($notification);
    }

    public function status(Request $request)
    {
        $category = Ads::find($request->id);
        $category->status = $request->status;
        $category->save();
        return response()->json(['messege' => 'success']);
    }
}
