<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SaleRepresentative extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'telephone',
        'current_route',
        'comment',
        'joined_date',
        'manager_id'
    ];

    /**
     * Get the user|manager that owns the SaleRepresentative
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function managed_by(): BelongsTo
    {
        return $this->belongsTo(User::class, 'manager_id', 'id');
    }
}
