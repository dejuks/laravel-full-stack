<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees=Employee::all();
        return response()->json([
            'employees'=>$employees,
            'message'=>"Data fetched successfully"
        ],200);
    }
    public function show($id){
        $employee=Employee::find($id);
        return response()->json(
            [
                'employee'=>$employee,
                'message'=>'Employee data fetched'
            ], 200
        );
    }
    public function edit($id){
        $employee=Employee::find($id);
        return response()->json([
            'employee'=>$employee,
            'message'=>'Edit data fetched'
        ],200);
    }
    public function store(Request $request){
        $employee=new Employee();
        $employee->name=$request->name;
        $employee->phone=$request->phone;
        $employee->salary=$request->salary;
        $result= $employee->save();
        if($result){
            return response()->json([
                'employee'=>$employee,
                'message'=>'Successfully Added'
            ],200);
        }
    }

    public function update(Request $request,$id)
    {
        $employee=Employee::find($id);
        $employee->name=$request->name;
        $employee->phone=$request->phone;
        $employee->salary=$request->salary;
        $result= $employee->update();
        if($result){
            return response()->json([
                'employee'=>$employee,
                'message'=>'Successfully Updated'
            ],200);
        }
    }

    public function destroy($id)
    {
        $employee=Employee::find($id);
        $result=$employee->delete();
        if($result){
            return response()->json([
                'employee'=>$employee,
                'message'=>'Successfully Deleted'
            ],200);
        }
    }

}
