<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $table = 'batches';

    protected $primarykey = 'id';

    protected $fillable = ['batchName','course_id'];

    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function student() {
        return $this->hasMany(Student::class);
    }
}
