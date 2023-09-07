<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SettingsController extends Controller
{
    public function show()
    {
        $settings = Setting::first();
        return view('backend.settings.view_settings', compact('settings'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
           'author' => 'required|min:3',
           'system_name' => 'required|min:3',
           'address' => 'required|min:4',
           'phone' => 'required|min:3',
           'email' => 'required|min:3',
           'website' => 'required|url',
           'facebook' => 'required|url',
           'twitter' => 'required|url',
           'linked_in' => 'required|url',
           'google_plus' => 'required|url',
           'youtube' => 'required|url',
            'logo' =>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $settings = Setting::find($id);
        $settings->author = $request->author;
        $settings->system_name = $request->system_name;
        $settings->address = $request->address;
        $settings->phone = $request->phone;
        $settings->email = $request->email;
        $settings->website = $request->website;
        $settings->facebook = $request->facebook;
        $settings->twitter = $request->twitter;
        $settings->linked_in = $request->linked_in;
        $settings->google_plus = $request->google_plus;
        $settings->youtube = $request->youtube;

        $image = $request->file('logo');
        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fill_name = $image_name . '.' . $ext;
            //----Resize Main Image----
            $upload_path = 'public/backend/upload/posts/logo/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(620, 200)->save($image_url);
            if(!empty($settings->image)){
                unlink($settings->image);
            }

            $settings->logo = $image_url;
        }

        $settings->save();

        $notification = array(
            'messege' => "Settings Updated Successfully :)",
            'alert-type' => 'success'
        );
        return redirect()->route('view.settings')->with($notification);
    }
}
