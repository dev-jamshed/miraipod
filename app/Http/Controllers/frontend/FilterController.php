<?php

namespace App\Http\Controllers\frontend;

use App\Models\Admin\Car;
use App\Models\Admin\Make;
use App\Models\Admin\Type;
use App\Models\Admin\Banner;
use Illuminate\Http\Request;
// use App\Models\Fob;
use App\Models\Admin\Country;
use App\Models\Admin\CarsModel;
use App\Models\Admin\Transmission;
use App\Http\Controllers\Controller;
use App\Models\Admin\ShippingCharge;


class FilterController extends Controller
{
    public function cars(){
        $cars = Car::with(['make','model','carImages'])->where('status',1)->paginate(12);
        $bodyTypes = Type::where('status',1)->get();
        $carMakes = Make::where('status',1)->get();
        $carsModels = CarsModel::where('status',1)->get();

        $carYears = Car::selectRaw('YEAR(`year_month`) as year')
        ->where('status', 1)
        ->distinct()
        ->pluck('year');

        $carMileages = Car::select('mileage')
        ->where('status', 1)
        ->distinct()
        ->orderBy('mileage', 'asc')
        ->pluck('mileage');

        $carFobPrices = Car::select('fob_price')
        ->where('status', 1)
        ->distinct()
        ->orderBy('fob_price', 'asc')
        ->pluck('fob_price');

        $carCC = Car::select('cc')
        ->where('status', 1)
        ->distinct()
        ->orderBy('cc', 'asc')
        ->pluck('cc');

        $carFuels = Car::select('fuel')
        ->where('status', 1)
        ->distinct()
        ->orderBy('fuel', 'asc')
        ->pluck('fuel');

        $carColors = Car::select('color')
        ->where('status', 1)
        ->distinct()
        ->orderBy('color', 'asc')
        ->pluck('color');

        $transmissions = Transmission::all();
        
        return view('frontend.filter_cars',compact('transmissions','cars','carMileages','carFobPrices','carCC','carMakes','bodyTypes','carsModels','carYears','carFuels','carColors'));

    }

    public function filterCarsWeb(request $req){

        // dd($req->all());
        $cars = Car::with(['make', 'model','carImages'])->where('status',1);
        $oldReq = [];
         $transmissions = Transmission::all();

        // Filtering based on request parameters
        if (isset($req->make) && !empty($req->make)) {
            $cars = $cars->where('make_id', $req->make);
            $oldReq['make'] = $req->make;
        }
        if (isset($req->model) && !empty($req->model)) {
            $cars = $cars->where('model_id', $req->model);
            $oldReq['model'] = $req->model;
        }
        if (isset($req->bodyType) && !empty($req->bodyType)) {
            $cars = $cars->where('body_type', $req->bodyType);
            $oldReq['bodyType'] = $req->bodyType;
        }
        if (isset($req->color) && !empty($req->color)) {
            $cars = $cars->where('color', $req->color);
            $oldReq['color'] = $req->color;

        }
        if (isset($req->transmission) && !empty($req->transmission)) {
            $cars = $cars->where('transmission', $req->transmission);
            $oldReq['transmission'] = $req->transmission;

        }

        // Mileage Range
        if (isset($req->mileage_from) && empty($req->mileage_to)) {
            $cars = $cars->where('mileage', '>=', $req->mileage_from);
            $oldReq['mileage_from'] = $req->mileage_from;
        } elseif (empty($req->mileage_from) && isset($req->mileage_to)) {
            $cars = $cars->where('mileage', '<=', $req->mileage_to);
            $oldReq['mileage_to'] = $req->mileage_to;
        } elseif (isset($req->mileage_from) && isset($req->mileage_to)) {
            $cars = $cars->whereBetween('mileage', [$req->mileage_from, $req->mileage_to]);
            $oldReq['mileage_from'] = $req->mileage_from;
            $oldReq['mileage_to'] = $req->mileage_to;
        }

        // CC Range
        if (isset($req->cc_from) && empty($req->cc_to)) {
            $cars = $cars->where('cc', '>=', $req->cc_from);
            $oldReq['cc_from'] = $req->cc_from;
        } elseif (empty($req->cc_from) && isset($req->cc_to)) {
            $cars = $cars->where('cc', '<=', $req->cc_to);
            $oldReq['cc_to'] = $req->cc_to;
        } elseif (isset($req->cc_from) && isset($req->cc_to)) {
            $cars = $cars->whereBetween('cc', [$req->cc_from, $req->cc_to]);
            $oldReq['cc_to'] = $req->cc_to;
            $oldReq['cc_from'] = $req->cc_from;
        }

        // FOB Price Range
        if (isset($req->fob_price_from) && empty($req->fob_price_to)) {
            $cars = $cars->where('fob_price', '>=', $req->fob_price_from);
            $oldReq['fob_price_from'] = $req->fob_price_from;
        } elseif (empty($req->fob_price_from) && isset($req->fob_price_to)) {
            $cars = $cars->where('fob_price', '<=', $req->fob_price_to);
            $oldReq['fob_price_to'] = $req->fob_price_to;
        } elseif (isset($req->fob_price_from) && isset($req->fob_price_to)) {
            $cars = $cars->whereBetween('fob_price', [$req->fob_price_from, $req->fob_price_to]);
            $oldReq['fob_price_to'] = $req->fob_price_to;
            $oldReq['fob_price_from'] = $req->fob_price_from;
        }

        // Date Range
        if (isset($req->date_from) && empty($req->date_to)) {
            $cars = $cars->whereYear('year_month', '>=', $req->date_from);
            $oldReq['date_from'] = $req->date_from;
        } elseif (empty($req->date_from) && isset($req->date_to)) {
            $cars = $cars->whereYear('year_month', '<=', $req->date_to);
            $oldReq['date_to'] = $req->date_to;
        } elseif (isset($req->date_from) && isset($req->date_to)) {
            $cars = $cars->whereYear('year_month', '>=', $req->date_from)
                    ->whereYear('year_month', '<=', $req->date_to);
            $oldReq['date_from'] = $req->date_from;
            $oldReq['date_to'] = $req->date_to;
        }

        // Additional Filters
        if (isset($req->steering) && !empty($req->steering)) {
            $cars = $cars->where('drive', $req->steering);
            $oldReq['steering'] = $req->steering;
        }
        if (isset($req->fuel) && !empty($req->fuel)) {
            $cars = $cars->where('fuel', $req->fuel);
            $oldReq['fuel'] = $req->fuel;
        }
        // if (isset($req->fobPrice) && !empty($req->fobPrice)) {
        //     $cars = $cars->where('fob_price', $req->fobPrice);
        //     $oldReq['fobPrice'] = $req->fobPrice;
        // }

        $cars = $cars->paginate(12);
        // dd($cars);
        if ($req->ajax()) {
            $paginationView = view('frontend.render_component.cars-pagination', compact('cars'))->render();
            $carsHtml = view('frontend.render_component.cars-list', compact('cars'))->render();
            $carsCount = view('frontend.render_component.cars-count', compact('cars'))->render();
            return response()->json(['pagination' => $paginationView, 'carsHtml' => $carsHtml, 'carsCount' => $carsCount]);
        }


        $bodyTypes = Type::where('status',1)->get();
        $carMakes = Make::where('status',1)->get();
        $carsModels = CarsModel::where('status',1)->get();

        $carYears = Car::selectRaw('YEAR(`year_month`) as year')
        ->where('status', 1)
        ->distinct()
        ->pluck('year');

        $carMileages = Car::select('mileage')
        ->where('status', 1)
        ->distinct()
        ->orderBy('mileage', 'asc')
        ->pluck('mileage');

        $carFobPrices = Car::select('fob_price')
        ->where('status', 1)
        ->distinct()
        ->orderBy('fob_price', 'asc')
        ->pluck('fob_price');

        $carCC = Car::select('cc')
        ->where('status', 1)
        ->distinct()
        ->orderBy('cc', 'asc')
        ->pluck('cc');

        $carFuels = Car::select('fuel')
        ->where('status', 1)
        ->distinct()
        ->orderBy('fuel', 'asc')
        ->pluck('fuel');

        $carColors = Car::select('color')
        ->where('status', 1)
        ->distinct()
        ->orderBy('color', 'asc')
        ->pluck('color');

        return view('frontend.filter_cars',compact('transmissions','cars','oldReq','carMileages','carFobPrices','carCC','carMakes','bodyTypes','carsModels','carYears','carFuels','carColors'));
    }

    public function carShow($id){
        $car = Car::with(['make','model','carImages'])->findOrFail($id);
        $allcar = Car::with(['make','model','carImages'])->paginate(10);
        $countries = Country::all();

        // dd($car);
        return view('frontend.car_show',compact('car','allcar','countries'));
    }
    public function getport(Request $req){
        $data = ShippingCharge::where('country_id',$req->country_id)->get();
        
        if(count($data) > 0){
            return response()->json([
                'status' => 200,
                'data' => $data        
            ]);
        }
        return response()->json([
            'status' => 404,
            'data' => 'not found'        
        ]);
    }
    public function getCalculate(Request $req){

        $port = ShippingCharge::find($req->port_id);
        
        $formula = $req->m3 * $port->amount;
        $calculatedPrice = $formula + $req->fob_price;

            return response()->json([
                'status' => 200,
                'data' => $calculatedPrice        
            ]);
    }

    public function search(request $req){
        $query = Car::with(['make', 'model','carImages'])->where('status',1);

        if($req->has('search')){
            $searchTerm = $req->search;
    
            // Use the search term for a LIKE search on make->name, model->name, and year
            $query->where(function($q) use ($searchTerm){
                $q->whereHas('make', function($q) use ($searchTerm){
                    $q->where('name', 'LIKE', '%' . $searchTerm . '%');
                })->orWhereHas('model', function($q) use ($searchTerm){
                    $q->where('name', 'LIKE', '%' . $searchTerm . '%');
                })->orWhere('year_month', 'LIKE', '%' . $searchTerm . '%');
            });
        }
    
        $cars = $query->paginate(10);
        // dd($cars);


        $bodyTypes = Type::where('status',1)->get();
        $carMakes = Make::where('status',1)->get();
        $carsModels = CarsModel::where('status',1)->get();

        $carYears = Car::selectRaw('YEAR(`year_month`) as year')
        ->where('status', 1)
        ->distinct()
        ->pluck('year');

        $carMileages = Car::select('mileage')
        ->where('status', 1)
        ->distinct()
        ->orderBy('mileage', 'asc')
        ->pluck('mileage');

        $carFobPrices = Car::select('fob_price')
        ->where('status', 1)
        ->distinct()
        ->orderBy('fob_price', 'asc')
        ->pluck('fob_price');

        $carCC = Car::select('cc')
        ->where('status', 1)
        ->distinct()
        ->orderBy('cc', 'asc')
        ->pluck('cc');

        $carFuels = Car::select('fuel')
        ->where('status', 1)
        ->distinct()
        ->orderBy('fuel', 'asc')
        ->pluck('fuel');

        $carColors = Car::select('color')
        ->where('status', 1)
        ->distinct()
        ->orderBy('color', 'asc')
        ->pluck('color');

        return view('frontend.filter_cars',compact('cars','carMileages','carFobPrices','carCC','carMakes','bodyTypes','carsModels','carYears','carFuels','carColors','searchTerm'));
        // dd($cars);

        // if($cars){
        //     return response()->json([
        //         'status' => 200,
        //         'data'  => $cars,
        //     ]);
        // }
        // return response()->json([
        //     'status' => 404,
        //     'data'  => 'No Cars Available Rights Now..!',
        // ]);
    }




}
