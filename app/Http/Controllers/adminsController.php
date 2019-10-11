<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class adminsController extends Controller
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
            return datatables()->of(Admin::all())
                 
                    
                    ->addColumn('action', function($data){
                        $button = '<a class="btn btn-primary" href="/admins/'.$data->id.'/edit"> Edit </a>';
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




        return view('admin.admins.index');







    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create');
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

            'name'=>'required|max:255|min:3',
            'password'=>'required|min:5',
            'email'=>'required|email'
            
            
            ]);
            
            
            
            $newuser = new Admin();
            $newuser->name = $request->input('name');
            $newuser->email = $request->input('email');
            $newuser->password = Hash::make($request->input('password'));
            
            $newuser->save();
            
            return redirect('/admins')->with('sucsess','Admin Has Been Added');
            



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
        $admin = Admin::FindOrFail($id);

        return view('admin.admins.edit',compact('admin'));
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
        

 
        $this->validate($request,[

            'name'=>'required|max:255|min:3',
            'password'=>'nullable|min:5',
            'email'=>'required|email'
            
            
            ]);
            
            
            
            $newuser =Admin::FindOrFail($id);
            $newuser->name = $request->input('name');
            $newuser->email = $request->input('email');

            if($request->has('password')){

                $newuser->password = Hash::make($request->input('password'));
            }
            
            
            $newuser->save();
            
            return redirect('/admins')->with('sucsess','Admin Has Been Edited');
            




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "a7a";
    }
}
