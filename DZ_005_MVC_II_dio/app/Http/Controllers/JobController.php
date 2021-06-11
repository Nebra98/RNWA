<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poslovi = Job::all();
        return view('posao.index',compact('poslovi'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posao.create');
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
            'job_id' => 'required',
            'job_title' => 'required',
        ]);

        Job::create($request->all());

        return redirect()->route('posao.index')
            ->with('success','Novi posao je uspješno kreiran.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posao = Job::where('job_id', $id)->first();
        return view('posao.show',compact('posao'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posao = Job::where('job_id', $id)->first();

        return view('posao.edit',compact('posao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'job_title' => 'required',
        ]);
        $posao = Job::where('job_id',$id)->first();

        $posao->update($request->all());

        return redirect()->route('posao.index')
            ->with('success','Uspješno ste uredili posao.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posao = Job::where('job_id',$id)->first();
        $posao->delete();


        return redirect()->route('posao.index')
            ->with('success','Posao je uspješno izbrisan.');
    }
}
