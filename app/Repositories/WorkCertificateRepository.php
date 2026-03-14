<?php

namespace App\Repositories;

use App\Models\WorkCertificate;

class WorkCertificateRepository
{
    public function paginate($limit = 10, $search = '')
    {
        return WorkCertificate::with(['employee.department', 'employee.position'])
            ->where('certificate_number', 'like', '%' . $search . '%')
            ->orWhereHas('employee', function($q) use ($search) {
                $q->where('full_name', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate($limit);
    }

    public function find($id) { return WorkCertificate::findOrFail($id); }

    public function create(array $data) { return WorkCertificate::create($data); }

    public function delete($id)
    {
        $cert = $this->find($id);
        return $cert->delete();
    }
}
