<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageBanner;
use App\Models\Admin\tmp_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class HomepageBannersController extends Controller
{
    public function index()
    {
        $banner_images = HomepageBanner::get();
        // return $banner_images;
        return view('admin.homepage_banners.index', compact('banner_images'));
    }

    // Used Cars Banner Update Method
    public function uploadBanners(Request $request)
    {
        // Validate the request
        $request->validate([
            'used_cars_banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured_cars_banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Process Used Cars Banner
        if ($request->hasFile('used_cars_banner')) {
            // Check if a used cars banner already exists
            $existingBanner = HomepageBanner::where('type', 'used_cars')->first();
            
            if ($existingBanner) {
                // Delete the existing image if it exists
                $existingImagePath = public_path('images/banner/' . $existingBanner->image);
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath); // Delete the old image
                }
                // Update the existing banner record
                $existingBanner->image = 'used_cars_banner-' . Str::random(6) . time() . '.' . $request->file('used_cars_banner')->extension();
                $existingBanner->is_active = true;
                $existingBanner->save();
            } else {
                // Create a new banner record if it does not exist
                $existingBanner = new HomepageBanner();
                $existingBanner->image = 'used_cars_banner-' . Str::random(6) . time() . '.' . $request->file('used_cars_banner')->extension();
                $existingBanner->type = 'used_cars';
                $existingBanner->is_active = true;
                $existingBanner->save();
            }
    
            // Move the uploaded image to the final location
            $request->file('used_cars_banner')->move(public_path('images/banner/'), $existingBanner->image);
        }
    
        // Process Featured Cars Banner
        if ($request->hasFile('featured_cars_banner')) {
            // Check if a featured cars banner already exists
            $existingBanner = HomepageBanner::where('type', 'featured_cars')->first();
            
            if ($existingBanner) {
                // Delete the existing image if it exists
                $existingImagePath = public_path('images/banner/' . $existingBanner->image);
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath); // Delete the old image
                }
                // Update the existing banner record
                $existingBanner->image = 'featured_cars_banner-' . Str::random(6) . time() . '.' . $request->file('featured_cars_banner')->extension();
                $existingBanner->is_active = true;
                $existingBanner->save();
            } else {
                // Create a new banner record if it does not exist
                $existingBanner = new HomepageBanner();
                $existingBanner->image = 'featured_cars_banner-' . Str::random(6) . time() . '.' . $request->file('featured_cars_banner')->extension();
                $existingBanner->type = 'featured_cars';
                $existingBanner->is_active = true;
                $existingBanner->save();
            }
    
            // Move the uploaded image to the final location
            $request->file('featured_cars_banner')->move(public_path('images/banner/'), $existingBanner->image);
        }
    
        return redirect()->route('admin.homepage_banners.index')->with('success', 'Banners uploaded successfully.');
    }
    
}
