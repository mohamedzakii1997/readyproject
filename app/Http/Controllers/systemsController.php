<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Country;
use App\Notification;
use App\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class systemsController extends Controller
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
            return datatables()->of(System::latest()->get())
                 
                    
                    ->addColumn('action', function($data){
                       $button = '<div class="row col-md-6">';
                        $button .= '<a class="btn btn-primary" href="/systems/'.$data->id.'/edit"> Edit </a>';
                        $button .= '&nbsp;&nbsp;';
                      if($data->attachment != null)
                        $button .= '<a class="btn btn-primary" href="/systems/downloadattach/'.$data->id.'">Download Attachment</a>';
                        $button .= '<form method="post" style="display: inline" action = "/admins/'.$data->id.'">'
                        .csrf_field().method_field('DELETE').'
              <button type="submit" class="btn btn-danger" onclick="return confirm('."'".'are You Sure to completete delete process ?'."')".'"> Delete</button>
                  </form>';
                  $button .='</div>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    
        }




        return view('admin.systems.index');



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {$countries = Country::all();


        return view('admin.systems.create',compact('countries'));
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
    'customer_name'=>'required|min:5|max:255',
    'modality'=>'required|min:5|max:255',
    'version'=>'required|min:5|max:255',
    'Radios'=>'required|exists:countries,id',
    'contcat_person'=>'required|min:5|max:255',
    'hmme'=>'required|min:5|max:255',
    'po'=>'required|numeric',
    'systemprefs'=>'required|min:5|max:255',
    'installationoptios'=>'required|min:5|max:255',
    'shippingdate'=>'required|date',
    'installationdate'=>'required|date',
    'warrantlystart'=>'required|date',
    'warrantlyend'=>'required|date',
    'upload'=>'nullable',
    ]);
    



$newsystem = new System();
$newsystem->name = $request->input('name');
$newsystem->customer_name = $request->input('customer_name');
$newsystem->modality = $request->input('modality');
$newsystem->version = $request->input('version');
$newsystem->country = $request->input('Radios');
$newsystem->contcat_person = $request->input('contcat_person');
$newsystem->hmme_sales_person = $request->input('hmme');
$newsystem->po_no = $request->input('po');
$newsystem->shipping_date = $request->input('shippingdate');
$newsystem->installtion_date = $request->input('installationdate');
$newsystem->system_preferences = $request->input('systemprefs');
$newsystem->install_options = $request->input('installationoptios');
$newsystem->warrantly_start_date = $request->input('warrantlystart');
$newsystem->warrantly_end_date = $request->input('warrantlyend');


if($request->has('upload')){

    $newsystem->attachment = $request->file('upload')->store('attach');

}


$newsystem->save();

$name = auth('admin')->user()->name;
$notification = new Notification();
$notification->title = 'New System Has Been Added';
$notification->body = 'By  Admin :'.$name;
$notification->header = '/systems';
$notification->save();


return redirect('/systems')->with('sucsess','System Has Been Added');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */




public function download($id){

    $attac = System::FindOrFail($id);
    return Storage::download($attac->attachment);


}


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
    {$system = System::FindOrFail($id);
        $countries = Country::all();
        return view('admin.systems.edit',compact('system','countries'));
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
            'customer_name'=>'required|min:5|max:255',
            'modality'=>'required|min:5|max:255',
            'version'=>'required|min:5|max:255',
            'Radios'=>'required',
            'contcat_person'=>'required|min:5|max:255',
            'hmme'=>'required|min:5|max:255',
            'po'=>'required|numeric',
            'systemprefs'=>'required|min:5|max:255',
            'installationoptios'=>'required|min:5|max:255',
            'shippingdate'=>'required|date',
            'installationdate'=>'required|date',
            'warrantlystart'=>'required|date',
            'warrantlyend'=>'required|date',
            'upload'=>'nullable',
            ]);
            
        

            
$newsystem =  System::FindOrFail($id);
$newsystem->name = $request->input('name');
$newsystem->customer_name = $request->input('customer_name');
$newsystem->modality = $request->input('modality');
$newsystem->version = $request->input('version');
$newsystem->country = $request->input('Radios');
$newsystem->contcat_person = $request->input('contcat_person');
$newsystem->hmme_sales_person = $request->input('hmme');
$newsystem->po_no = $request->input('po');
$newsystem->shipping_date = $request->input('shippingdate');
$newsystem->installtion_date = $request->input('installationdate');
$newsystem->system_preferences = $request->input('systemprefs');
$newsystem->install_options = $request->input('installationoptios');
$newsystem->warrantly_start_date = $request->input('warrantlystart');
$newsystem->warrantly_end_date = $request->input('warrantlyend');


if($request->has('upload')){



    Storage::delete($newsystem->attachment);
    $newsystem->attachment = $request->file('upload')->store('attach');

}


$newsystem->save();




$name = auth('admin')->user()->name;
$notification = new Notification();
$notification->title = $newsystem->name .' System  Updated';
$notification->body = 'By  Admin :'.$name;
$notification->header = '/systems';
$notification->save();


$admins = Admin::all();

foreach($admins as $admin){

    $admin->unseen_notification = $admin->unseen_notification +1;
$admin->save();

}

return redirect('/systems')->with('sucsess','System Has Been Updated');






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
