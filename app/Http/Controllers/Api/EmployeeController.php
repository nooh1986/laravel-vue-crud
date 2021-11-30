<?php

namespace App\Http\Controllers\Api;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;

class EmployeeController extends Controller
{
    
    public function index()
    {
        $data = EmployeeResource::collection(Employee::all());
        return response(['data' => $data , 'status' => 200 , 'message' => null]);
    }

    
    public function store(Request $request)
    {
        $data['name']  = $request->name;
        $data['email'] = $request->email;
        $data['age']   = $request->age;

        Employee::create($data);

        return response(['data' => null , 'status' => 201 , 'message' => 'Data has been created successfully']);
    }

    
    public function edit($id)
    {
        $data = new EmployeeResource(Employee::findOrFail($id));
        return response(['data' => $data , 'status' => 200 , 'message' => null]);
    }


    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);

        $data['name']  = $request->name;
        $data['email'] = $request->email;
        $data['age']   = $request->age;

        $employee->update($data);

        return response(['data' => null , 'status' => 201 , 'message' => 'Data has been updated successfully']);
    }

    
    public function destroy($id)
    {
        Employee::findorfail($id)->delete();
        return response(['data' => null , 'status' => 200 , 'message' => 'Data has been deleted successfully']);
    }
}
