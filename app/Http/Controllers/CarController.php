<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{

    public function index_boat()
    {
        $cars = Car::all();
        return view('index_boat', compact('cars'));
    }



    public function show_boat(Car $car)
    {
        return view('show_boat', compact('car'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $carsQuery = Car::query();

        if ($query) {
            $carsQuery->where(function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%')
                    ->orWhere('category', 'like', '%' . $query . '%');
            });
        }
    
        $cars = $carsQuery->get();
    
        return view('index_boat', ['cars' => $cars]);
    }


    // public function edit_product(Product $product)
    // {
    //     return view('edit_product', compact('product'));
    // }
}
