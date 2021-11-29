<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::check()){
             return view('home');
        }
        else{
            return view('welcome');
        }
       
    }
     public function update()
    {
        return view('users.edit');
    }
    public function profileUpdate(Request $request){
          $password=Auth::user()->password;
        $oldpass=$request->oldpass;
        $newpass=$request->new_password;
        $confirm=$request->password_confirmation;
        if(Hash::check($oldpass,$password)){
           
            $user=array();
             $user['name']=$request->name;
                $user['email']=$request->email;      
                if($request->new_password){
                   if($newpass===$confirm){

                
                         $user['password']=Hash::make($request->new_password);
                      }
                    else{
                          $notification=array(
                              'messege'=>'New password and Confirm Password not matched!',
                              'alert-type'=>'error'
                                    );
                       return Redirect()->back()->with($notification);
                       }
                    }
             $update=DB::table('users')->where('id',Auth::user()->id)->update($user);
              
                        $notification=array(
                              'messege'=>'Updated Successfully',
                              'alert-type'=>'success'
                                    );
                            
                return Redirect()->back()->with($notification);
            
        }
        else{
                $notification=array(
                    'messege'=>'Wrong Password',
                    'alert-type'=>'error'
                );
                return Redirect()->back()->with($notification);
            }
            

        

    }
 }
       
        
    
    

