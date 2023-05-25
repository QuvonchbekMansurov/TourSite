<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Http\Requests\Country\StoreRequest;
use App\Models\Country;
use App\Models\Feedback;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        $comment=Feedback::get();
        return view('admin.country.index', compact('countries', 'comment'));
    }
    public function create()
    {
        return view('admin.country.create');
    }
    public function store(Request $request)
    {
        Country::create([
            'name_uz' => $request->name_uz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'images_id'=>$request->images_id,
        ]);
        return redirect('admin/country');
    }
    public function delete(int $country_id)
    {
        Country::findOrFail($country_id)->delete();
        return redirect('admin/country');
    }
    public function edit(int $id)
    {
        $id= Country::findOrFail($id);
        return view('admin.country.edit', compact('id'));
    }
    public function update(Request $request)
    {
        $country = Country::findOrFail($request->id);
        $country->update([
            'name_uz' => $request->name_uz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
        ]);
        return redirect('admin/country');
    }
    public function active($id)
    {
        $country=Country::findOrFail($id);
        $is_active = '1';
        if ($country->is_active==1) {
            $is_active = '0';
        }
        $country->update(['is_active'=>$is_active]);
        return back();
    }
}
