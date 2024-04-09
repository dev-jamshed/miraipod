<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\ExchangeRate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;



class ExchangeRateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exchangeRates = ExchangeRate::all();
        return view('admin.exchange_rates.index', compact('exchangeRates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.exchange_rates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'currency' => 'required',
            'rate' => 'required|numeric|min:0',
        ]);
        if ($validator->passes()) {
            ExchangeRate::create($request->all());

            Session()->flash('success', 'Exchange Rate Added Successfully');
            return response()->json([
                'status' => true,
                'message' => 'Exchange Rate Added Successfully'
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
        
        $exchangeRate = ExchangeRate::findOrFail($id);
        return view('admin.exchange_rates.edit', compact('exchangeRate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // return "sdf";
        $exchangeRate = ExchangeRate::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'currency' => 'required',
            'rate' => 'required'
        ]);
        if ($validator->passes()) {
            $exchangeRate->update([
                'currency' => $request->currency,
                'rate' => $request->rate,
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Exchange Rate updated successfully.'
            ]);
        }
        return response()->json([
            'status' => false,
            'errors' => $validator->errors()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $exchangeRate = ExchangeRate::findOrFail($id);
        $exchangeRate->delete();

        return redirect()->route('admin.exchange_rates.index')->with('success', 'Exchange rate deleted successfully.');
    }
}
