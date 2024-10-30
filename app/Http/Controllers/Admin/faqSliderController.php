<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\faqSlider; // Ensure this model exists
use App\Models\Admin\tmp_image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class faqSliderController extends Controller
{
    public function index()
    {
        $banner_images  = faqSlider::get(); 

        return view('admin.faq_slider.create', compact('banner_images')); 
    }

    public function update(Request $request)     {
        if (!empty($request->images_array)) {
            foreach ($request->images_array as $temp_img_id) {
                $temp_img = tmp_image::find($temp_img_id);
                $ext = last(explode('.', $temp_img->name));
                $faqSliderImage = new faqSlider();
                $image_name = 'faqSlider' . '-' . $faqSliderImage->id . '-' . Str::random(6) . time() . '.' . $ext;
                $faqSliderImage->image = $image_name; 
                $faqSliderImage->save();

                // Copy image to new location
                $tempImagePath = public_path('temp/' . $temp_img->name);
                $newImagePath = public_path('images/faq_slider/' . $image_name); 
                File::copy($tempImagePath, $newImagePath);

                // Delete temporary image record from database
                $temp_img->delete();

                // Delete temporary image file from storage
                if (File::exists($tempImagePath)) {
                    File::delete($tempImagePath);
                }
            }
        }
        return redirect()->route('admin.faqs.sliders.index'); // Change route name
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $req)
    {
        // Retrieve the image record from the database
        $faqSliderImage = faqSlider::findOrFail($req->id); 
        // Check if the image record exists
        if (!empty($faqSliderImage)) {
            // Delete the file from storage
            if (!empty($faqSliderImage->image)) {
                $imagePath = public_path('images/faq_slider/' . $faqSliderImage->image); 
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            // Delete the record from the database
            $faqSliderImage->delete();

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
