<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeApiController extends Controller
{
    public function index() {
        return Employee::with(['department', 'position'])->paginate(20);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'employee_id' => 'required|unique:employees',
            'full_name' => 'required',
            'department_id' => 'required|exists:departments,id',
            'position_id' => 'required|exists:positions,id',
        ]);
        return Employee::create($data);
    }

    public function show($id) {
        return Employee::with(['department', 'position'])->findOrFail($id);
    }

    public function update(Request $request, $id) {
        $emp = Employee::findOrFail($id);
        $data = $request->validate([
            'full_name' => 'sometimes|required',
            'department_id' => 'sometimes|required|exists:departments,id',
            'position_id' => 'sometimes|required|exists:positions,id',
        ]);
        $emp->update($data);
        return $emp;
    }

    public function destroy($id) {
        $emp = Employee::findOrFail($id);
        $emp->delete();
        return response()->json(['message' => 'Employee deleted']);
    }
}
