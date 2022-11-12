<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Crypt;

class CarController extends Controller
{
    
    public function CarRegistration(){
        $cars = Car::get();
        return view('car.CarRegistration',compact('cars'));
    }
    public function CarRegistered(Request $request){
        $request->validate([
            'tagno' =>'required|max:255|unique:cars',
           'carname' =>'required|max:255',
           'carmodel' =>'required|max:255',
            'carcolor' =>'required|max:255',
           'ownername' =>'required|max:255',
           'ownertelephone' =>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);
        $cars = new car();
        $cars->tagno=$request->input('tagno');
        $cars->carname=$request->input('carname');
        $cars->carmodel=$request->input('carmodel');
        $cars->carcolor=$request->input('carcolor');
        $cars->ownername=$request->input('ownername');
        $cars->ownertelephone=$request->input('ownertelephone');
        $cars->slug='2';
        $cars->save();
        return back()->with('success','Car has been registered');

    }
    public function EditRegisteredCar(Request $request){
        $cars=Car::where('id',Crypt::decryptString($request->id))->first();
        return view('car.editcarinfo',compact('cars'));
    }
    public function EditCardetails(Request $request){
        $request->validate([
            'tagno' =>'required|max:255',
           'carname' =>'required|max:255',
           'carmodel' =>'required|max:255',
            'carcolor' =>'required|max:255',
           'ownername' =>'required|max:255',
           'ownertelephone' =>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);
        Car::where('id',Crypt::decryptString($request->id))->update([
            'tagno'=> $request->tagno,
            'carname'=> $request->carname,
            'carmodel'=> $request->carmodel,
            'carcolor'=> $request->carcolor,
            'ownername'=> $request->ownername,
            'ownertelephone'=>$request->ownertelephone,
        ]);
        return back()->with('success','Car Details has been updated');

    }
    public function DeleteCardetails($id){
        $id=Crypt::decryptString($id);
        Car::where('id',$id)->delete();
        return back()->with('danger','Car Details has been deleted');
    }
}