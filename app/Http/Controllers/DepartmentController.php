<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Http\Resources\DepartmentResource;
use App\Http\Resources\DepartmentResourceCollection;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PhpParser\Builder;

class DepartmentController extends Controller
{

    public function index()
    {
        $department = Department::query()
            ->select('*')
            ->selectSub(function($query){
            return $query->from('employees')
            ->selectRaw('max(salary)')
            ->join('department_employee', 'employees.id', '=', 'department_employee.employee_id')
            ->whereRaw('department_id = departments.id');
        }, 'salary')
            ->withCount('employees')
            ->get()
            ->load('employees');
        return new DepartmentResourceCollection($department);

    }


    public function store(DepartmentRequest $request)
    {
        Department::create($request->all());
    }


    public function show(Department $department)
    {
        return new DepartmentResource($department->load('employees'));
    }


    public function update(DepartmentRequest $request, Department $department)
    {
        $department->update($request->all());

    }


    public function destroy(Department $department)
    {
        //ещё пока не работает
        abort_if($department->employees, 400, 'Этот отдел нельзя удалить, так как в нем работают сотрудники');
        $department->delete();
    }

}
