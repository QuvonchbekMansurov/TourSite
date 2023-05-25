<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Tour\SearchRequest;
use App\Models\Category;
use App\Models\Country;
use App\Models\Feedback;
use App\Models\Images;
use App\Models\Tour;
use App\Models\TourImages;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function welcome()
    {
        $category=Category::where('is_active',0)->get();
        $country=Country::where('is_active',0)->get();
        $tour=Tour::paginate(5);
        $images=TourImages::all();
        return view('welcome', compact('tour','category','country'));
    }
    public function search(Request $request)
    {
        $name = $request->name ?? null;
        $country_id = $request->country_id ?? null;
        $category_id = $request->category_id ?? null;
        $tours = Tour::where('is_active',0);
        if(!is_null($name)){
            $tours->where('name_uz','like',"%$name%")
            ->orWhere('name_ru','like',"%$name%")
            ->orWhere('name_en','like',"%$name%");
        }
        if(!is_null($country_id)){
            $tours->where('country_id',$country_id);
        }
        if(!is_null($category_id)){
            $tours->where('country_id',$category_id);
        }
        $tours = $tours->get();
        return view('search', compact('tours'));
    }

    public function card(int $id)
    {
        $country=Country::all();
        $tour=Tour::findOrFail($id); 
        // dd($tour->category->name);
        return view('card', compact('country', 'tour',));

    }
    
}
