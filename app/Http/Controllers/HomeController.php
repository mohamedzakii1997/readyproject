<?php

namespace App\Http\Controllers;

use App\Notification;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth:web,admin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function dashboard()
    {
        return view('admin.adminpanel');
    }
    public function userindex()
    {



//return 
//$user= User::with('posts')->get();
 //return $user[0]->posts[0]->id;

        if(request()->ajax())
        {
            return datatables()->of(User::with('posts')->get())
                 
                    
                    ->addColumn('posts', function($data){
                        
                        return $data->posts;
                    })
                    ->rawColumns(['posts'])


                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    
        }




        return view('admin.users.index');
    }

public function addpost(Request $request){


$request->validate([
'content'=>'required'

]);



$post = new Post();
$post->user_id = Auth::user()->id;
$post->content = $request->content;
$post->save();

$notification = new Notification();
$notification->title='New Post';
$notification->body='This Is A New Post Added By '.Auth::user()->name . 'Now';
$notification->user_id = Auth::user()->id;
$notification->save();
return back();

}

public function getnotifications(){



$allnotifications = Notification::orderBy('id','asc')->get();
$unseen_notification_number = Auth::user()->unseen_notification;  //Notification::where('seen','=',0)->count();

$show_all_notifcations ='';



if($allnotifications->count() == 0){

    $show_all_notifcations = '
    <a href="#" class="dropdown-item ">
    <i class="fas fa-envelope mr-2"></i> There Is No Notificatons
    <br>
    
    <span class="float-right text-muted text-sm">3 mins</span>
  </a>
  
  <div class="dropdown-divider"></div>
';





}


if($unseen_notification_number>0){


    foreach($allnotifications as $row)
    {
        if($row->seen == 0){
            $show_all_notifcations .= '
            <a href="#" class="dropdown-item ">
            <i class="fas fa-envelope mr-2"></i> '.$row->title.'
            <br>
            '.$row->body.'
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          
          <div class="dropdown-divider"></div>
        ';
        

        }else{  

            $show_all_notifcations .= '
            <a href="#" class="dropdown-item ">
            <i class="fas fa-envelope mr-2"></i> '.$row->title.'
            <br>
            '.$row->body.'
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          
          <div class="dropdown-divider"></div>
        ';

        }
        
    


}


}

$data = array(
    'notification'  => $show_all_notifcations,
    'number'=>$unseen_notification_number    
    );
    
    

    
    return response()->json($data);




}

public function restnotification(){

    $allnotifications =  Notification::orderBy('id','desc')->get();


$user = Auth::user();
$user->unseen_notification = 0;
$user->save();

    $show_all_notifcations = '';

foreach($allnotifications as $row){

    $show_all_notifcations .= '
    <a href="#" class="dropdown-item ">
    <i class="fas fa-envelope mr-2"></i> '.$row->title.'
    <br>
    '.$row->body.'
    <span class="float-right text-muted text-sm">3 mins</span>
  </a>
  
  <div class="dropdown-divider"></div>
';



}


$data = array(
    'notification'  => $show_all_notifcations,
      
    );
    
    
    return response()->json($data);


}


}
