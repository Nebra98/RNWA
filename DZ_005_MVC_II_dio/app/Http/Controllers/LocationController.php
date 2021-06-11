<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lokacije = Location::all();
        return view('lokacija.index',compact('lokacije'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drzave = Country::all();

        return view('lokacija.create', compact('drzave'));
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
            'city' => 'required',
            'country_id' => 'required',
        ]);

        Location::create($request->all());

        return redirect()->route('lokacija.index')
            ->with('success','Nova lokacija je uspješno kreirana.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lokacija = Location::where('location_id', $id)->first();
        $drzave = Country::all();

        return view('lokacija.show',compact('lokacija', 'drzave'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lokacija = Location::where('location_id', $id)->first();
        $drzave = Country::all();
        return view('lokacija.edit',compact('lokacija', 'drzave'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'city' => 'required',
            'country_id' => 'required',
        ]);

        $lokacija = Location::where('location_id',$id)->first();

        $lokacija->update($request->all());

        return redirect()->route('lokacija.index')
            ->with('success','Uspješno ste uredili lokaciju.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lokacija = Location::where('location_id',$id)->first();
        $lokacija->delete();


        return redirect()->route('lokacija.index')
            ->with('success','Lokacija je uspješno izbrisana.');
    }
}
