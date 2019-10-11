<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class engineersController extends Controller
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
            return datatables()->of(User::latest()->get())
                 
                    
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




        return view('admin.users.index');




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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



$newuser = new User();
$newuser->name = $request->input('name');
$newuser->email = $request->input('email');
$newuser->password = Hash::make($request->input('name'));

$newuser->save();

return redirect('/engineers')->with('sucsess','Engineer Has Been Added');


        
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
        $engineer = User::FindOrFail($id);

        return view('admin.users.edit',compact('engineer'));
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
            
            
            
            $newuser =User::FindOrFail($id);
            $newuser->name = $request->input('name');
            $newuser->email = $request->input('email');

            if($request->has('password')){

                $newuser->password = Hash::make($request->input('password'));
            }
            
            
            $newuser->save();
            
            return redirect('/engineers')->with('sucsess','Engineer Has Been Edited');
            
    




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
