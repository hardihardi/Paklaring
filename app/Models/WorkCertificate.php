<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkCertificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'certificate_number',
        'issued_date',
        'end_date',
        'content',
        'qr_code_path',
        'pdf_path',
        'created_by',
    ];

    public function employee() { return $this->belongsTo(Employee::class); }
    public function creator() { return $this->belongsTo(User::class, 'created_by'); }
}
