<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $primarykey = 'id';

    protected $fillable = ['courseName'];

    public function batches() {
        return $this->hasMany(Batch::class);
    }
}
