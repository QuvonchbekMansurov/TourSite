<?php

namespace App\Http\Controllers\Tour;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tour\SearchRequest;
use App\Models\Category;
use App\Models\Tour;
use Illuminate\Http\Request;
use App\Http\Requests\Tour\StoreRequest;
use App\Models\Country;
use App\Models\Feedback;
use App\Models\Images;
use App\Models\TourCategory;
use App\Models\TourImages;
use Illuminate\Support\Str;



class TourController extends Controller
{
    public function index()
    {
        $tour = Tour::paginate(5);
        $comment=Feedback::get();
        return view('admin.tour.index', compact('tour','comment'));
    }
    public function create()
    {
        $country = Country::all();
        $category = Category::all();
        return view('admin.tour.create', compact('country', 'category'));
    }
    public function update(StoreRequest $request)
    {
        $country = Country::findOrFail($request->id);
        if ($request->hasFile('image')) {
            $imageId = [];
            foreach ($request->file('image') as $file) {
                $extension = $file->getClientOriginalExtension();
                $random = Str::random(15);
                $storePath = 'public/images';
                $filename = $random . time() . '.' . $extension;
                $path = $file->storeAs($storePath, $filename);
                $image = new Images();
                $image->name = $filename;
                $image->token = $random;
                $image->path = str_replace('public','storage', $path);
                $image->save();
                $imageId[] = $image->id;
            }
        }
        $country->update([
            'name_uz' => $request->name_uz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'teaser_uz' => $request->teaser_uz,
            'teaser_ru' => $request->teaser_ru,
            'teaser_en' => $request->teaser_en,
            'description_uz' => $request->description_uz,
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,
            'price' => $request->price,
            'country_id' => $request->country_id,
            'sale' => $request->sale,
            'is_active' => 0,
            'is_popular' => 1,
            'month' => $request->month,
        ]);
    }
    public function edit(int $id)
    {
        $tour= Tour::findOrFail($id);
        $country= Country::get();
        $category= Category::get();
        return view('admin.tour.edit', compact('tour','country','category'));

    }
    public function store(StoreRequest $request)
    {
        if ($request->hasFile('image')) {
            $imageId = [];
            foreach ($request->file('image') as $file) {
                $extension = $file->getClientOriginalExtension();
                $random = Str::random(15);
                $storePath = 'public/images';
                $filename = $random . time() . '.' . $extension;
                $path = $file->storeAs($storePath, $filename);
                $image = new Images();
                $image->name = $filename;
                $image->token = $random;
                $image->path = str_replace('public','storage', $path);
                $image->save();
                $imageId[] = $image->id;
            }
        }

        $tour = new Tour();
        $tour->name_ru = $request->name_ru;
        $tour->name_uz = $request->name_uz;
        $tour->name_en = $request->name_en;
        $tour->teaser_ru = $request->teaser_ru;
        $tour->teaser_uz = $request->teaser_uz;
        $tour->teaser_en = $request->teaser_en;
        $tour->description_ru = $request->description_ru;
        $tour->description_uz = $request->description_uz;
        $tour->description_en = $request->description_en;
        $tour->price = $request->price;
        $tour->country_id = $request->country_id;
        $tour->sale = $request->sale;
        $tour->is_active = 0;
        $tour->is_popular = 1;
        $tour->month = $request->month;
        $tour->save();

        foreach ($imageId as $id) {
            $image = new TourImages();
            $image->tours_id = $tour->id;
            $image->images_id = $id;
            $image->save();
        }
        foreach ($request->tour_categories as $id) {
            $item = new TourCategory();
            $item->tours_id = $tour->id;
            $item->category_id = $id;
            $item->save();
        }
        return redirect('/tour');
    }
    public function delete(int $tour_id)
    {
        Tour::findOrFail($tour_id)->delete();
        return redirect('/tour');
    }
    public function active($id)
    {
        $tour_active = Tour::findOrFail($id);
        $is_active = '1';
        if ($tour_active->is_active == 1) {
            $is_active = '0';
        }
        $tour_active->update(['is_active' => $is_active]);
        return back();
    }
    public function info($tour_id)
    {
        $tour_info = Tour::where('id',$tour_id)->first();
        // $country = Country::all();
        return view('admin.tour.info', compact('tour_info'));
    }
     public function search(SearchRequest $request)
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
        $tours->with('images')->get();
        // dd($tours);
        return view('welcome', compact('tours'));
     }
}
