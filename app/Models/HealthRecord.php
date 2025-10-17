<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthRecord extends Model
{
    /** @use HasFactory<\Database\Factories\HealthRecordFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'type',
        'value',
        'measurement_date',
        'notes',
    ];

    /**
     * Get the user that owns the health record.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
