<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Region;


use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drzave = Country::all();
        return view('drzava.index',compact('drzave'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regije = Region::all();

        return view('drzava.create', compact('regije'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'country_id' => 'required',
            'region_id' => 'required',
        ]);

        Country::create($request->all());

        return redirect()->route('drzava.index')
            ->with('success','Nova država je uspješno kreirana.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $drzava = Country::where('country_id', $id)->first();
        $regije = Region::all();

        return view('drzava.show',compact('drzava', 'regije'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $drzava = Country::where('country_id', $id)->first();
        $regije = Region::all();
        return view('drzava.edit',compact('drzava', 'regije'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'region_id' => 'required',
        ]);
        $drzava = Country::where('country_id',$id)->first();

        $drzava->update($request->all());

        return redirect()->route('drzava.index')
            ->with('success','Uspješno ste uredili drzavu.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $drzava = Country::where('country_id',$id)->first();
        $drzava->delete();


        return redirect()->route('drzava.index')
            ->with('success','Država je uspješno izbrisana.');
    }
}
