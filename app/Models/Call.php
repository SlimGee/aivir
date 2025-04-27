<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    /** @use HasFactory<\Database\Factories\CallFactory> */
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to only include active users.
     */
    #[Scope]
    protected function incoming(Builder $query): void
    {
        $query->where('type', 'incoming');
    }

    /**
     * Scope a query to only include active users.
     */
    #[Scope]
    protected function missed(Builder $query): void
    {
        $query->where('type', 'missed');
    }

    /**
     * Scope a query to only include active users.
     */
    #[Scope]
    protected function outgoing(Builder $query): void
    {
        $query->where('type', 'outgoing');
    }
}
