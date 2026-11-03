<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'date',
        'time',
        'guests',
        'table_type',
        'notes',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'guests' => 'integer',
        ];
    }

    public static function statusLabel(?string $status): string
    {
        return match ($status) {
            'confirmed' => 'Terkonfirmasi',
            'completed' => 'Selesai / Hadir',
            'cancelled' => 'Dibatalkan',
            default => 'Menunggu Konfirmasi',
        };
    }
}
