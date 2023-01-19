<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Session;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        return view('admin.department.index',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dep = new Department;
        $dep->name = $request->name;
        $dep->save();
        if($dep->id){
            Session::flash('success','successfully store done!');
            return redirect(route('department.index'));
        }else{
            Session::flash('warning','Holy guacamole! You should check in on some of those fields below.');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dep=Department::find($id);
        return view('admin.department.edit',[
            'department'=>$dep,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dep = Department::find($id);
        $dep->name = $request->name;
        $dep->save();
        if($dep->id){
            Session::flash('success',' updated successfully!');
            return redirect(route('department.index'));
        }else{
            Session::flash('warning',' updated falid!');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::destroy($id);
        if($id){
            Session::flash('success','successfully Deleted');
            return redirect(route('department.index'));
        }else{
            Session::flash('warning',' Deleted falid!');
            return back();
        }
    }
}
