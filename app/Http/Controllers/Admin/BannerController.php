<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\Admin\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\Admin\tmp_image;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner_images = Banner::get();

        // return $banner_image;
        return view('admin.banner.create', compact('banner_images'));
    }

    public function updateBanner(Request $request)
    {
        if (!empty($request->images_array)) {
            foreach ($request->images_array as $temp_img_id) {
                $temp_img = tmp_image::find($temp_img_id);
                $ext = last(explode('.', $temp_img->name));
                $banner_image = new Banner();
                $image_name =  'banner' . '-' . $banner_image->id . '-' . Str::random(6) . time() . '.' . $ext;
                $banner_image->image = $image_name;
                $banner_image->save();



                // Copy image to new location
                $tempImagePath = public_path('temp/' . $temp_img->name);
                $newImagePath = public_path('images/banner/' . $image_name);
                File::copy($tempImagePath, $newImagePath);
                // Delete temporary image record from database
                $temp_img->delete();

                // Delete temporary image file from storage
                if (File::exists($tempImagePath)) {
                    File::delete($tempImagePath);
                }
            }
        }
        return redirect()->route('admin.banners.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $req)
    {
        // Retrieve the image record from the database
        $productImage = Banner::findOrFail($req->id);

        // Check if the image record exists
        if (!empty($productImage)) {
            // Delete the file from storage
            if (!empty($productImage->image)) {
                $imagePath = public_path('images/banner/' . $productImage->image);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            // Delete the record from the database
            $productImage->delete();

            return response()->json([
                'status' => true,
                'message' => 'Image deleted successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Image not found'
            ]);
        }
    }
}
