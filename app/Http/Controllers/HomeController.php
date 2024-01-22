<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id())
    {
        if(Auth::user()->usertype==0)
        {
            $doctors = Doctor::all();
            return view('user.home',compact('doctors'));
        }
        else
        {
            return view('admin.home');
        }

           

    }
    else
    {
        return redirect()->back();

    }
    } 
    public function index()
    {
        if(Auth::id())
        {
            return redirect('home');
        }
        else{

        $doctors = Doctor::all();
        return view('user.home',compact('doctors'));
        }
    }
    public function appointment(Request $request)
    {
        $appointments = new Appointment;
        $appointments->name=$request->name;
        $appointments->email=$request->email;
        $appointments->phone=$request->number;
        $appointments->doctor=$request->doctor;
        $appointments->date=$request->date;
        $appointments->message=$request->message;
        $appointments->status= 'IN PROGRESS';
        if(Auth::id()){
        $appointments->user_id=Auth::user()->id;
        }
        $appointments->save();
        return redirect()->back()->with('flashy_message','we will contact you soon ,thanks');




    }
    public function myappointment()
    {
        if(Auth::id())
        {
            $userid = Auth::user()->id;
            $appoints = Appointment::where('user_id',$userid)->get();
            return view('user.my_appointment',compact('appoints'));

            
        }
        else
        {
            return redirect()->back();
        }
    }
    public function cancel_appoint($id)

    {
        $appointments = Appointment::find($id);
       // $appointments->delete(); li bghiti 
       Appointment::destroy($id);
        return redirect()->back();

    }
}
