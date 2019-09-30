<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class languageController extends Controller
{
    

public function changelanguage($lang){


    if(in_array($lang,['en','ar'])){


        if(Auth::user()){
            
        $user = Auth::user();
        $user->lang = $lang;
        $user->save();
        
        }else{
        if(Session::has('lang')){
            Session::forget('lang');
        }
        Session::put('lang',$lang);
        }
        
        
        
        
        }
        else{
            if(Auth::user()){
                $user = Auth::user();
                $user->lang = $lang;
                $user->save();
                
                }else{
                if(Session::has('lang')){
                    Session::forget('lang');
                }
                Session::put('lang',$lang);
                }
        
        
        
            }


//for admin change language
         if(Auth('admin')->user()){
            $user = Auth('admin')->user();
            $user->lang = $lang;
            $user->save();
          




         }
         else{
            if(Session::has('lang')){
                Session::forget('lang');
            }
            Session::put('lang',$lang);
            }


            
//end admin






            return back();



}



}
