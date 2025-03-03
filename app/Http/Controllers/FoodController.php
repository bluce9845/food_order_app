<?php
namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    public function index()
    {
        $foodDatas = Food::all();

        return view('Food.index', compact('foodDatas'));
    }

    public function form()
    {
        return view('Food.form.form');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'food_name'  => 'required',
            'supply'     => 'required',
            'price'      => 'required',
            'image_food' => 'required|image|mimes:png,jpg,jpeg,gif,webp,avif',
        ]);

        $image     = $request->file('image_food');
        $imagePath = $image->storeAs('public', $image->hashName(), 'public');

        $validateData['image_food'] = $imagePath;

        Food::create($validateData);
        return redirect()->route('food-dashboard')->with('success', 'Add data food successfully!!');
    }

    public function edit($id)
    {
        $food = Food::findOrFail($id);
        return view('Food.form.editForm', compact('food'));
    }

    public function storeEdit(Request $request ,$id)
    {
        $request->validate( [
            'food_name'  => 'required',
            'supply'     => 'required',
            'price'      => 'required',
            'image_food' => 'image|mimes:png,jpg,jpeg,gif,webp,avif',
        ]);

        $food = Food::findOrFail($id);

        if($request->hasFile('image_food')){
            $image_food = $request->file('image_food');
            $image_food->storeAs('public', $image_food->hashName());

            Storage::delete('public'.$food->image_food);

            $food->update([
                'food_name' => $request->food_name,
                'price' => $request->price,
                'supply' => $request->supply,
                'image_food' => $request->image_food,
            ]);
        }else{
            $food->update([
                'food_name' => $request->food_name,
                'price' => $request->price,
                'supply' => $request->supply,
            ]);
        }

        return redirect()->route('food-dashboard')->with('success', "Update data food successfully!!");
    }

    public function destroy($id)
    {
        $foodDel = Food::findOrFail($id);
        $foodDel->delete();

        return redirect()->route('food-dashboard')->with('success', 'Delete data food successfully!!');
    }

}