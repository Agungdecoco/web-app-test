<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'no_hp',
        'alamat',
        'gender'
    ];

    public function cuti(): HasMany
    {
        return $this->hasMany(Cuti::class, 'employee_id');
    }
}
