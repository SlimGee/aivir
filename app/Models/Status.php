<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    /** @use HasFactory<\Database\Factories\StatusFactory> */
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function color()
    {
        return match ($this->value) {
            'active' => 'bg-teal-100',
            'in call' => 'bg-green-100',
            'lunch' => 'bg-purple-100',
            'bathroom' => 'bg-blue-100',
            'on leave' => 'bg-orange-100',
            'case worker' => 'bg-red-100',
        };
    }
}
