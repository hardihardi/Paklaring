<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_email',
        'company_phone',
        'company_address',
        'company_logo',
        'favicon',
        'app_name',
        'letter_location',
        'signature_image',
        'company_stamp',
        'signer_name',
        'signer_position',
    ];
}
