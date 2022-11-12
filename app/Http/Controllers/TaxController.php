<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaxController extends Controller
{
    public function view()
    {
        $tax = DB::table('cars')
            ->join('tax', 'cars.tagno', '=', 'tax.tagno')
            ->select('cars.id','cars.tagno','tax.driver_name','tax.owner_name','cars.ownertelephone','tax.amount','tax.Year')
            ->get();
            return view('tax.taxinfo',compact('tax'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag=DB::table('cars')->select('cars.tagno')->get();
        return view('tax.create',compact('tag'));
    }
    public function carinfo($id)
    {
        return DB::table('cars')->where('tagno',$id)->select('ownername')->get();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'driver_name' =>'required',
            'tagno' =>'required',
            'owner_name' =>'required|min:5',
            'Year' =>'required',
            'amount' =>'required|numeric',]);
        $count=DB::table('tax')->where('tagno',$request->tagno)->where('Year',$request->Year)->count();
        if ($count>0){
            return back()->with('Esist','Tax Details has been Added');
        }
        $post=new Tax;
        $post->driver_name=$request->driver_name;
        $post->owner_name=$request->owner_name;
        $post->tagno=$request->tagno;
        $post->amount=$request->amount;
        $post->Year=$request->Year;
        $post->purpose='None';
        $post->save();
        return back()->with('success','Tax Details has been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function show(Tax $tax)
    {
        $allTax = Tax::all();
        return view('show',['allTax'=>$allTax]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function edit(Tax $tax, $id)
    {
        $posts = Tax::find($id);
        return view('edit',['posts'=>$posts]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tax $tax, $id)
    {
        $post = Tax::find($id);
        $post->driver_name=$request->get('dname');
        $post->owner_name=$request->get('oname');
        $post->amount=$request->get('amount');
        $post->purpose=$request->get('purpose');
        $post->save();

        return redirect('show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tax $tax, $id)
    {
        $post = Tax::find($id);
        $post->delete();
        return redirect('show');
    }
}