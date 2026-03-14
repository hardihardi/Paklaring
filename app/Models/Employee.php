<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'full_name',
        'joined_date',
        'department_id',
        'position_id',
        'employment_status',
    ];

    public function department() { return $this->belongsTo(Department::class); }
    public function position() { return $this->belongsTo(Position::class); }
    public function certificates() { return $this->hasMany(WorkCertificate::class); }
}
