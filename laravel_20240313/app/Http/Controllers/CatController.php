<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cat;
class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        // $url = route('cats.edit', ['id' => 1]); 
        // $url = route('cats.edit', ['cat' => 1]);
        // dd($url);
        $data= DB::select('SELECT * FROM cats');
       
        // dd($data);

      
            // DB::table('dogs')->insert(
            //     [
            //         'name' => 'kay',
            //         'mobile' => '09123456789',
            //             'address' => '09123456789'
            //     ]
            //     );
           
            $data = Cat::where('id', '>', 5)->orderByDesc('id')->get();
            return view('cat.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      
        return view('cat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $input = $request->except('_token');
        // die();
        // dd($input);
        // dd('hello cat store');
            DB::table('cats')->insert(
                [
                    'name' => $input['name'],
                    'mobile' => $input['mobile'],
                        'address' => '999',
                        'created_at'=>now(),
                        'updated_at'=>now()
                ]
                );
           
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
        dd("Hello $id");
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
        dd('hello cats excel');
    }

    
}
