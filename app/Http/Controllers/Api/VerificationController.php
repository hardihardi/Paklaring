<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WorkCertificate;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verify($number)
    {
        $cert = WorkCertificate::where('certificate_number', $number)
            ->with(['employee.department', 'employee.position'])
            ->first();

        if (!$cert) {
            return response()->json(['valid' => false], 404);
        }

        return response()->json([
            'valid' => true,
            'employee_name' => $cert->employee->full_name,
            'position' => $cert->employee->position->position_name,
            'company' => 'Bumame',
            'issued_date' => $cert->issued_date,
        ]);
    }
}
