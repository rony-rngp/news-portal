<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\PhotoGallery;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $first_ads = \App\Models\Ads::where('id',1)->where('status',1)->first();
        $second_ads = \App\Models\Ads::where('id',2)->where('status',1)->first();
        $third_ads = \App\Models\Ads::where('id',3)->where('status',1)->first();
        $footer_categories = Category::where('status', 1)->inRandomOrder()->orderBy('id', 'desc')->take(9)->get()->toArray();
        $footer_categories_chunk = array_chunk($footer_categories, 3);
        $setting = Setting::first();
        View::share(['first_ads'=> $first_ads, 'second_ads' => $second_ads, 'third_ads' => $third_ads, 'footer_categories_chunk'=>$footer_categories_chunk, 'setting'=>$setting ]);
    }
}
