<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    use HasFactory;

    /**
     * THE FIX: Explicitly tell this model to use the 'booking_schedule' table.
     *
     * @var string
     */
    protected $table = 'booking_schedules';

    /**
     * The attributes that are mass assignable.
     * MAKE SURE these column names match your 'booking_schedule' table exactly.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'pet_id',
        'phone_number',
        'booking_date', // This should match the column name in your table
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'booking_date' => 'datetime',
    ];


    /**
     * Get the user that owns the appointment.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the pet associated with the appointment.
     */
    public function pet(): BelongsTo
    {
        return $this->belongsTo(Pet::class);
    }
}