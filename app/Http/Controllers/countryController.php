<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;

class countryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(request()->ajax())
        {
            return datatables()->of(Country::all())
                 
                    
                    ->addColumn('action', function($data){
                        $button = '<a class="btn btn-primary" href="/engineers/'.$data->id.'/edit"> Edit </a>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<form method="post" style="display: inline" action = "/admins/'.$data->id.'">'
                        .csrf_field().method_field('DELETE').'
              <button type="submit" class="btn btn-danger" onclick="return confirm('."'".'are You Sure to completete delete process ?'."')".'"> Delete</button>
                  </form>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    
        }




        return view('admin.countries.index');



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $this->validate($request,[

            'name'=>'required|max:255|min:2',
           
            
            ]);
            



            $newcountry = new Country();
            $newcountry->name = $request->input('name');
            
            $newcountry->save();
            
            return redirect('/countries')->with('sucsess','Country Has Been Added');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
