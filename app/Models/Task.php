<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'long_description',
        'is_completed'
    ];

    public function toggleComplete()
    {
        $this->is_completed = !$this->is_completed;
        $this->save();
    }
}
