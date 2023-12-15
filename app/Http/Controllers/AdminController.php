<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    //!CONTROLLER DASHBOARD USER
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

    public function create_user()
    {
        return view('admin.dashboard_user_create');
    }
    public function add_user(Request $request)
    {
        $request->validate(
            [
                'name'  =>  'required',
                'email' =>  'required|email|unique:users,email',
                'password'  =>  'required',
                'is_admin'  =>  'required',
                'call_num'  => 'required',
            ]
        );

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_admin' => $request->is_admin,
            'call_num' => $request->call_num,
        ]);
        return Redirect::route('dashboard_user');
    }

    public function edit_user(User $user)
    {
        return view('admin.dashboard_user_edit', compact('user'));
    }

    public function update_user(User $user, Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id, // Ignore unique check for the current user
            'is_admin'  => 'required',
            'call_num'  => 'required',
        ]);
    
        $dataToUpdate = [
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => $request->is_admin,
            'call_num' => $request->call_num,
        ];
    
        // Only update password if it's provided
        if (!empty($request->password)) {
            $dataToUpdate['password'] = bcrypt($request->password);
        }
    
        $user->update($dataToUpdate);
    
        return redirect()->route('dashboard_user');
    }
    //!END CONTROLLER DASHBOARD USER

    //!CONTROLLER DASHBOARD CAR
    public function dashboard_car()
    {
        $cars = Car::all();
        return view('admin.dashboard_car', compact('cars'));
    }
    public function create_car()
    {
        $categories = Category::all();
        return view('admin.dashboard_create_car', compact('categories'));
    }
    public function store_car(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'brand' => 'required',
                'colour' => 'required',
                'plat_num' => 'required',
                'capacity' => 'required',
                'fuel' => 'required',
                'price' => 'required',
                'car_img' => 'required'
            ]
        );

        $file = $request->file('car_img');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/' . $path, file_get_contents($file));
        Car::create([
            'name' => $request->name,
            'brand' => $request->brand,
            'colour' => $request->colour,
            'plat_num' => $request->plat_num,
            'capacity' => $request->capacity,
            'fuel' => $request->fuel,
            'price' => $request->price,
            'car_img' => $path
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
            'brand' => 'required',
            'colour' => 'required',
            'plat_num' => 'required',
            'capacity' => 'required',
            'fuel' => 'required',
            'price' => 'required',
            // 'car_img' => 'required'
        ]);

        if ($request->hasFile('car_img')) {
            $file = $request->file('car_img');
            $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

            Storage::disk('local')->put('public/' . $path, file_get_contents($file));

            $car->update([
                'car_img' => $path
            ]);
        }


        $car->update([
            'name' => $request->name,
            'brand' => $request->brand,
            'colour' => $request->colour,
            'plat_num' => $request->plat_num,
            'capacity' => $request->capacity,
            'fuel' => $request->fuel,
            'price' => $request->price,
            // 'car_img' => $path
        ]);

        return Redirect::route('dashboard_car');
    }
    //!END CONTROLLER DASHBOARD CAR


    //!CONTROLLER DASHBOARD CATEGORY
    public function dashboard_category()
    {
        $categories = Category::all();
        return view('admin.dashboard_category', compact('categories'));
    }
    public function delete_category(Category $category)
    {
        $category->delete();
        return Redirect::back();
    }

    public function create_category()
    {
        return view('admin.dashboard_create_category');
    }
    public function add_category(Request $request)
    {
        $request->validate(
            [
                'category'  =>  'required',                
            ]
        );

       Category::create([
            'category' => $request->category,            
        ]);
        return Redirect::route('dashboard_category');
    }

    public function edit_category(Category $category)
    {
        return view('admin.dashboard_edit_category', compact('category'));
    }

    public function update_category(Category $category, Request $request)
    {
        $request->validate([
            'category'  => 'required',
        ]);
    
        $dataToUpdate = [
            'category' => $request->category,
        ];
    
        // Only update password if it's provided
        if (!empty($request->password)) {
            $dataToUpdate['password'] = bcrypt($request->password);
        }
    
        $category->update($dataToUpdate);
    
        return redirect()->route('dashboard_category');
    }
    //!END CONTROLLER DASHBOARD CATEGORY
}
