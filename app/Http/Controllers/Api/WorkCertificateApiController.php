<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WorkCertificate;
use Illuminate\Http\Request;

class WorkCertificateApiController extends Controller
{
    public function index() {
        return WorkCertificate::with('employee')->paginate(20);
    }

    public function show($id) {
        return WorkCertificate::with('employee')->findOrFail($id);
    }

    public function download($id) {
        $cert = WorkCertificate::findOrFail($id);
        return response()->download(storage_path('app/public/' . $cert->pdf_path));
    }
}
