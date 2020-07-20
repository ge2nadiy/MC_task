<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Http\Requests\EmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\EmployeeResourceCollection;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::query()->get()->load('departments');

        return new EmployeeResourceCollection($employees);
    }


    public function store(EmployeeRequest $request)
    {
        $employee = Employee::create($request->all());
        $employee->departments()->sync($request->get('selectedDepart'));
    }

    public function show(Employee $employee)
    {
        return new EmployeeResource($employee->load('departments'));
    }


    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->all());
        $employee->departments()->sync($request->get('selectedDepart'));
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
    }
}
