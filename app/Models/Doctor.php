<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use YourAppRocks\EloquentUuid\Traits\HasUuid;

class Doctor extends Model
{
    use HasFactory;
    use HasUuid;

    protected $attributes = [
        'sex' => 'M',
    ];

    protected $fillable = [
        'address_id',
        'number_home',
        'complement',
        'name',
        'email',
        'cellphone',
        'cpf',
        'birth',
        'sex',
        'crm',
    ];
    protected $hidden = [
        'address_id',
    ];
    protected $casts = [
        'schedules' => 'array',
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
