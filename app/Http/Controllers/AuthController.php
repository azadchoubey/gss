<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
class AuthController extends Controller
{
    public function register(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'role' => $request->role,
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'api_token' => Str::random(20),
            'role_id'=>$validatedData['role'],
            'status'=>1,
            'parent_id'=>$request->ro?$request->ro:Auth::user()->id,
            'created_by'=>Auth::user()->id,
        ]);

        if($user){
            return redirect('adduser')->with('status', 'User added successfully !'); 
        }else{
            return redirect('adduser')->with('status', 'Oprestion failed !');        

        }
    }
    public function userdetails($id){
        $user= User::find($id);
        return response()->json($user);
    }
    public function updateuserdetails($id,Request $request){
        $User= User::find($id);
        $User->name=$request->uname;
        $User->email=$request->email;
        $User->role_id=$request->role;
       
        if( $User->update()){
            return redirect('edituser')->with('status', 'Record Updated successfully !');        
        }else{
            return redirect('edituser')->with('status', 'Oprestion failed !');        
        }
    }
    public function deactiveuser($id){
        $User= User::find($id)->update(['status'=>0]);
       
       
        if( $User){
            return redirect('edituser')->with('status', 'Record Updated successfully !');        
        }else{
            return redirect('edituser')->with('status', 'Oprestion failed !');        
        }
    }
}