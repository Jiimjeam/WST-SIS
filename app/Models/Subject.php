<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'code', 'units',];

    public function enrollments()
        {
            return $this->hasMany(Enrollment::class, 'subject_id');
        }

}
