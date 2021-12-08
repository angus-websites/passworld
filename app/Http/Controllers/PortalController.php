<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;
use App\Models\User;
use App\Models\Suggestion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class PortalController extends Controller
{
    /**
     * Will load the dashboard for the user
     * and fetch all the correct stats
     */
    public function index(){
        $wordCount = Word::all()->count();
        $suggestionCount = Suggestion::all()->count();
        return view('portal.index',["wordCount" => $wordCount, "suggestionCount" => $suggestionCount]); 
    }

    /**
     * Will load the account screen
     */
    public function account(){
        return view('portal.account', ["user" => auth()->user()]); 
    }

    /**
     * Allow the user
     * to change password etc
     * @return [type] [description]
     */
    public function update(Request $request){

        //First check the user is logged in
        if(Auth::Check()){

          //Validation 1
          $validated = $request->validate(
              [
                  'current_password' => 'required',
                  'new_password' => 'required',
                  'confirm_password' => 'required|same:new_password',
              ],
              [
                  'confirm_password.same' => 'Your passwords do not match',
              ]
          );  

          //Get the current users current password
          $current_password = Auth::User()->password;

          //Check if it matches the given password
          if(Hash::check($request->current_password, $current_password)){

            //Update the users password to the new one
            $user = User::findOrFail(Auth::User()->id);
            $user->password = $request->new_password;
            $user->save();

            //Return with success message
            return redirect()->back()->with('success', 'Updated password');

          }else{
            //Return error - Password incorrect
            return redirect()->back()->withErrors(['Error'=>'Your current password is incorrect']);
          }

        }
        else{
            return redirect()->to('/');
        }
        
    }


}
