<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use YourAppRocks\EloquentUuid\Traits\HasUuid;

class Patient extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'address_id',
        'number_home',
        'complement',
        'name',
        'email',
        'cellphone',
        'cpf',
    ];
    protected $hidden = [
        'address_id',
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
