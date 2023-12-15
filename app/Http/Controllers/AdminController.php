<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    //!CONTROLLER DASHBOARD User
    public function dashboard_user()
    {

        $users = User::all();
        return view('admin.dashboard_user', compact('users'));
    }
    public function delete_user(User $user)
    {
        $user->delete();
        return Redirect::back();
    }


    //!CONTROLLER DASHBOARD CAR
    public function dashboard_car()
    {
        $cars = Car::all();
        return view('admin.dashboard_car', compact('cars'));
    }
    public function create_car()
    {
        return view('admin.dashboard_create_car');
    }
    public function store_car(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'category' => 'required',
                'colour' => 'required',
                'capacity' => 'required',
                'fuel' => 'required',
                'price' => 'required',
                'boat_img' => 'required'
            ]
        );

        $file = $request->file('boat_img');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/' . $path, file_get_contents($file));
        Car::create([
            'name' => $request->name,
            'category' => $request->category,
            'colour' => $request->colour,
            'capacity' => $request->capacity,
            'fuel' => $request->fuel,
            'price' => $request->price,
            'boat_img' => $path
        ]);
        return Redirect::route('dashboard_car');
    }

    public function delete_car(Car $car)
    {
        $car->delete();
        return Redirect::route('dashboard_car');
    }

    public function edit_car(Car $car)
    {
        return view('admin.dashboard_edit_car', compact('car'));
    }

    public function update_car(Car $car, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'colour' => 'required',
            'capacity' => 'required',
            'fuel' => 'required',
            'price' => 'required',
        ]);

        if ($request->hasFile('boat_img')) {
            $file = $request->file('boat_img');
            $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

            Storage::disk('local')->put('public/' . $path, file_get_contents($file));

            $car->update([
                'boat_img' => $path
            ]);
        }


        $car->update([
            'name' => $request->name,
            'category' => $request->category,
            'colour' => $request->colour,
            'capacity' => $request->capacity,
            'fuel' => $request->fuel,
            'price' => $request->price,
        ]);

        return Redirect::route('dashboard_car');
    }
    //!END CONTROLLER DASHBOARD CAR
}
