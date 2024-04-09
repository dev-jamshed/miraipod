<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Country;
use App\Models\Admin\tmp_image;
use App\Http\Controllers\Controller;
use App\Models\Admin\ShippingCharge;
use Illuminate\Support\Facades\Validator;

class ShippingController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::get();
        $shippingCharges = ShippingCharge::select('countries.name', 'shipping_charges.*')
            ->leftJoin('countries', 'countries.id', 'shipping_charges.country_id')->orderBy('shipping_charges.id', 'asc')->get();
        $data['shippingCharges'] = $shippingCharges;
        $data['countries'] = $countries;
        return view('admin.shipping.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $validator =  Validator::make($req->all(), [
            'country' => 'required',
            'port' => 'required|unique:shipping_charges,port',
            'amount' => 'required|numeric'
        ]);
        if ($validator->passes()) {

            $count = ShippingCharge::where('port', $req->port)->count();
            if ($count > 0) {
                Session()->flash('error', 'Shipping already Added .');
                return response()->json([
                    'status' => true,
                    'message' => 'Shipping already Added'
                ]);
            }

            $shipping = new ShippingCharge;
            $shipping->country_id = $req->country;
            $shipping->port = $req->port;
            $shipping->amount = $req->amount;
            $shipping->save();
            Session()->flash('success', 'Shipping Added Successfully');
            return response()->json([
                'status' => true,
                'message' => 'Shipping Added Successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $shippingCharge = ShippingCharge::find($id);
        if ($shippingCharge == null) {
            Session()->flash('error', 'Shipping not found');

            return redirect()->route('admin.shipping.create');
        }
        $countries = country::get();
        $data['shippingCharge'] = $shippingCharge;
        $data['countries'] = $countries;
        return view('admin.shipping.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validator =  Validator::make($request->all(), [
            'country' => 'required',
            'port' => 'required|unique:shipping_charges,port,' . $id . ',id',
            'amount' => 'required|numeric'
        ]);
        if ($validator->passes()) {
            $shipping = ShippingCharge::find($id);

            $shipping->country_id = $request->country;
            $shipping->amount = $request->amount;
            $shipping->save();
            Session()->flash('success', 'Shipping updated Successfully');
            return response()->json([
                'status' => true,
                'message' => 'Shipping updated Successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $shipping =  ShippingCharge::find($id);
        if ($shipping == null) {
            Session()->flash('error', 'Shipping not found');
            return response()->json([
                'status' => true,
                'message' => 'Shipping not found'
            ]);
        }
        $shipping->delete();
        Session()->flash('success', 'Shipping deleted Successfully');
        return response()->json([
            'status' => true,
            'message' => 'Shipping deleted Successfully'
        ]);
    }

    public function tempImagesCreate(Request $request)
    {
        $images = $request->file('images');
        $uploadedImages = [];

        foreach ($images as $image) {
            if (!empty($image)) {
                $ext = $image->getClientOriginalExtension();
                $newName = time() . '_' . mt_rand() . '.' . $ext;
                $image->move(public_path('temp'), $newName);

                $tempImage = new tmp_image();
                $tempImage->name = $newName;
                $tempImage->save();



                $uploadedImages[] = [
                    'image_id' => $tempImage->id,
                    'image_path' => asset('temp/' . $newName),
                    'ext' => $ext,
                ];
            }
        }

        return response()->json([
            'status' => true,
            'images' => $uploadedImages,
            'message' => 'Images uploaded successfully',
        ]);
    }
}
