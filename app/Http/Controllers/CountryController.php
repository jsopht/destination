<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class CountryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $countries =  Country::all();

        return view('countries.index')->with(compact('countries'));
    }

    public function create()
    {
        return view('countries.create');
    }

    public function store(Request $request)
    {
        if (is_null(Country::where('name', $request->name)->first())) {
            Country::create(['name' => $request->name]);
        }

        return redirect()->route('countries.index')->withAlert('success');
    }

    public function edit($id)
    {
        $country = Country::find($id);

        return view('countries.edit')->with(compact('country'));
    }

    public function update($id, Request $request)
    {
        if (Country::find($id)->update(['name' => $request->name])) {
            return redirect()->route('countries.index')->withAlert('success');
        }

        return redirect()->route('countries.index')->withAlert('danger');
    }

    public function destroy($id)
    {
        if (Country::destroy($id)) {
            return redirect()->route('countries.index')->withAlert('success');
        }

        return redirect()->route('countries.index')->withAlert('danger');
    }
}
