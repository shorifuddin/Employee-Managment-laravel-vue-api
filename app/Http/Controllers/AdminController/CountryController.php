<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Requests\ContryStoreRequest;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $countries = Country::all();
        if ($request->has('search')) {
            $countries = Country::where('name', 'like', "%{$request->search}%")->orWhere('country_code', 'like', "%{$request->search}%")->get();
        }

        return view('country.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContryStoreRequest $request)
    {
        Country::create($request->validated());

        return redirect()->route('countries.index')->with('message', 'Country Created Successfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('country.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(ContryStoreRequest $request, Country $country)
    {
        $country->update($request->validated());

        return redirect()->route('countries.index')->with('message', 'Country Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();

        return redirect()->route('countries.index')->with('message', 'Country Deleted Successfully');
    }
}
