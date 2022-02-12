<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'room_id',
        'checkin',
        'checkout'
    ];

    // Define booking's relationship with room
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
