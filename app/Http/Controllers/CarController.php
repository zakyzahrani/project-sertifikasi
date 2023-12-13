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

        // Lakukan pencarian berdasarkan query
        $cars = Car::where('name', 'like', '%' . $query . '%')
                ->orWhere('brand', 'like', '%' . $query . '%')
                ->get();

        // Kirim data hasil pencarian ke tampilan
        return view('search_results', compact('cars', 'query'));
    }

    // public function edit_product(Product $product)
    // {
    //     return view('edit_product', compact('product'));
    // }
}
