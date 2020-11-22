<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lessons extends Model
{
    use HasFactory;
    protected $primaryKey = 'lessons_id';
    protected $table = "lessons";
    protected $fillable = [
        'title',
        'img',

    ];


    public function sections()
    {
        return $this->belongsTo(Sections::class, 'sections_id');
    }

}
