<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use YourAppRocks\EloquentUuid\Traits\HasUuid;

class Address extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'street',
        'neighborhood',
        'city',
        'uf',
        'postcode',
    ];

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

}
