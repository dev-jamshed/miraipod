<?php

namespace App\Http\Controllers\frontend;

use App\Models\Admin\Car;
use App\Models\Admin\Make;
use App\Models\Admin\Type;
use App\Models\Admin\Banner;
use Illuminate\Http\Request;
// use App\Models\Fob;
use App\Models\HomepageBanner;
use App\Models\Admin\CarsModel;
use App\Models\Admin\ExchangeRate;
use App\Models\Admin\Transmission;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home(){

        $homepageBannersUserCar = HomepageBanner::where('type','used_cars')->get();
        $homepageBannersFeatured_cars = HomepageBanner::where('type','featured_cars')->get();
        $transmissions = Transmission::all();
        $banner_images = Banner::get();
        $bodyTypes = Type::where('status',1)->get();
        $carMakes = Make::where('status',1)->get();
        $carsModels = CarsModel::where('status',1)->get();

        $cars = Car::with(['make','model','carImages'])->where('status',1)->paginate(6);

        $featuredCars = Car::with(['make', 'model', 'carImages'])
        ->where('status', 1)
        ->where('featured', 1)
        ->take(6)
        ->latest()
        ->paginate(6);

        $newArrivalCars = Car::with(['make', 'model', 'carImages'])
        ->where('status', 1)
        ->take(6)
        ->latest()
        ->paginate(10);


        $carYears = Car::selectRaw('YEAR(`year_month`) as year')
        ->distinct()
        ->pluck('year');

        $carMileages = Car::select('mileage')
        ->distinct()
        ->orderBy('mileage', 'asc')
        ->pluck('mileage');

        $carFobPrices = Car::select('fob_price')
        ->distinct()
        ->orderBy('fob_price', 'asc')
        ->pluck('fob_price');

        $carCC = Car::select('cc')
        ->where('status', 1)
        ->distinct()
        ->orderBy('cc', 'asc')
        ->pluck('cc');

        $carFuels = Car::select('fuel')
        ->distinct()
        ->orderBy('fuel', 'asc')
        ->pluck('fuel');

        $carColors = Car::select('color')
        ->distinct()
        ->orderBy('color', 'asc')
        ->pluck('color');
        
        // dd()
;   
// return $homepageBannersUserCar;
        return view('frontend.home',compact('transmissions','banner_images','cars','carMileages','carFobPrices','carCC','carMakes','bodyTypes','carsModels','carYears','carFuels','carColors','newArrivalCars','featuredCars' , 'homepageBannersUserCar','homepageBannersFeatured_cars'));
    }


    public function setCurrency(Request $request)
    {

        if($request->currency != 0){

            $data = ExchangeRate::find($request->currency);
            // Validate the selected currency
            // Store the selected currency in session
            session(['currency' => $data->currency]);
            session(['currencyId' => $data->id]);
            session(['currencyAmount' => $data->rate]);
        }else{
            session(['currency' => 'YEN']);
            session(['currencyId' => 0]);
            session(['currencyAmount' => 1]);
        }
        
        return redirect()->back()->with('success', 'Currency set ');
        // Redirect back with a success message
    }

}
