<?php

namespace App\Http\Controllers\delivery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\DeliveryHistory;
Use Auth;
class deliveryController extends Controller
{
<<<<<<< HEAD

=======
>>>>>>> a9f6677a4bd5b372b3be4c854229758cb0e41444
    public function logindel(){
        return view('delivery-views.login');
           }
   
       public function login(Request $request){
<<<<<<< HEAD
        // return $request;
            if (Auth::guard('employ')->attempt(['email' => request('email'), 'password' => request('password')])){

                return redirect()->route('admin-delivery.dashboard');
            }else{
                  return redirect()->back()->withErrors(['Credentials does not match.']);
            }
       }

     public function dashboard(){

        $deliveryhistory = DeliveryHistory::all();
        return view('delivery-views.system.dashboard',compact('deliveryhistory'));
    }

           public function logout(Request $request)
           {
               auth()->guard('employ')->logout();
=======

        // return $request;
        if (auth('delivery')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin-delivery.dashboard');
                   }else{
               return redirect()->back()->withErrors(['Credentials does not match.']);
               }
       }

       public function dashboard(){
        $deliveryhistory = DeliveryHistory::all();
        return view('delivery-views.system.dashboard',compact('deliveryhistory'));
           }

           public function logout(Request $request)
           {
               auth()->guard('delivery')->logout();
>>>>>>> a9f6677a4bd5b372b3be4c854229758cb0e41444
       
               $request->session()->invalidate();
       
               return redirect()->route('admin-delivery.auth.login');
           }
}
