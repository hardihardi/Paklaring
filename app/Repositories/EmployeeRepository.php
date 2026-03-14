<?php

namespace App\Repositories;

use App\Models\Employee;

class EmployeeRepository
{
    public function paginate($limit = 10, $search = '')
    {
        return Employee::with(['department', 'position'])
            ->where(function($query) use ($search) {
                $query->where('full_name', 'like', '%' . $search . '%')
                      ->orWhere('employee_id', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate($limit);
    }

    public function find($id) { return Employee::findOrFail($id); }

    public function create(array $data) { return Employee::create($data); }

    public function update($id, array $data)
    {
        $employee = $this->find($id);
        $employee->update($data);
        return $employee;
    }

    public function delete($id)
    {
        $employee = $this->find($id);
        return $employee->delete();
    }
}
