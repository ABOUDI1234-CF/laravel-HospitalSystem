<?php

namespace App\Http\Controllers;


use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function addview()
    {
     if(Auth::id())
     {
       if(Auth::user()->usertype==1)
       {
        return view('admin.add_doctor');
       }
       else
       {
          return redirect()->back();
       }
     }
     else
     {
       return redirect('login');
     }
       
    }
    public function upload(Request $request)
{
    $doctor = new Doctor; // Fix the capitalization of the model name

    $image = $request->file; // Use 'file' instead of file
    $imagename = time().'.'.$image->getClientOriginalExtension();
    $image->move('doctorimage', $imagename); // Use the 'move' method directly on the image instance

    $doctor->image = $imagename; // Use = to assign the image name
    $doctor->room = $request->room;

    $doctor->name = $request->name;
    $doctor->phone = $request->phone;
    $doctor->speciality = $request->speciality;

    $doctor->save();
    return redirect()->back()->with('flashy_message','Doctor added succesfully');
}
   public function showappointment()
   {
    if(Auth::id())
     {
       if(Auth::user()->usertype==1)
       {
        $appointments = Appointment::all();
        return view('admin.showappointment',compact('appointments'));
       }
       else
       {
          return redirect()->back();
       }
     }
     else
     {
       return redirect('login');
     }

   }
   public function approved($id)
   {
    $appointments = Appointment::find($id);
    $appointments->status='approved';
    $appointments->save();
    return redirect()->back();
   }
   public function cancled($id)
   {
    $appointments = Appointment::find($id);
    $appointments->status='cancled';
    $appointments->save();
    return redirect()->back();
   }
   public function showdoctor()
   {
    if(Auth::id())
    {
      if(Auth::user()->usertype==1)
      {
        $doctors = Doctor::all();
   return view('admin.showdoctor',compact('doctors'));
      }
      else
      {
         return redirect()->back();
      }
    }
    else
    {
      return redirect('login');
    }
      
   }
   public function deletedoctor($id)
   {
     $doctors = Doctor::find($id);
     Doctor::destroy($id);
     return redirect()->back();


   }
   public function updatedoctor($id)

   {
        $doctors = Doctor::find($id);    
        return view('admin.update_doctor',compact('doctors'));

   }
   public function editdoctor(Request $request,  $id)
   {
      $doctor = Doctor::find($id);
      $doctor->name = $request->name;
      $doctor->phone = $request->phone;
      $doctor->speciality = $request->speciality;
      $doctor->room = $request->room;
      $image = $request->file; 
      if($image){// Use 'file' instead of file
      $imagename = time().'.'.$image->getClientOriginalExtension();
      $image->move('doctorimage', $imagename); // Use the 'move' method directly on the image instance
  
      $doctor->image = $imagename; }// Use = to assign the image name
      $doctor->save();
    return redirect()->back();


   }
   public function emailview($id)
   {
      $appointments = Appointment::find($id);
      return view('admin.email_view',compact('appointments'));
   }
   public function sendemail(Request $request,$id)
   {
    $appointments = Appointment::find($id);
    $details =[ 
      'greeting' => $request->greeting ,
      'body' => $request->body ,
      'actiontext' => $request->actiontext ,
      'actionurl' => $request->actionurl ,
      'endpart' => $request->endpart 


    ];
    Notification::send($appointments,new SendEmailNotification($details));
    return redirect()->back();
     
   }
}


