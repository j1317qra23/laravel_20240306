<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        // $url = 'http://localhost/css/style.css';
        // $url = asset('css/style.css');
        // dd($url);
        // dd('hello cat index');
       
        // view('cat.index');資料夾cat
        // route('cats.index'); routename cats
        // $data=('');
        // dd($data);

        return view('cat.index');
        // return view('child');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $url = route('cats.store');
        // dd($url);
        return view('cat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //   dd($request);
      $input = $request->except('_token');
    //   dd($input);
    //   dd('hello cat store');
      return redirect()->route('cats.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        dd($id);
        return view('cat.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function excel()
    {
        dd('hello cat excel');
    }

}