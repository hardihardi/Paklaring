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

    public function find($id)
    {
        return WorkCertificate::findOrFail($id);
    }

    public function create(array $data)
    {
        return WorkCertificate::create($data);
    }

    public function generateNumber($date)
    {
        $year = date('Y', strtotime($date));
        $month = date('m', strtotime($date));
        $count = WorkCertificate::whereYear('issued_date', $year)->count() + 1;

        return sprintf('SKK/BUMAME/HR/%s/%s/%04d', $year, $month, $count);
    }

    public function delete($id)
    {
        $cert = $this->find($id);
        return $cert->delete();
    }
}
