<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'total',
        'status',
        'reference_code',
        'customer_name',
        'service_type',
        'payment_method',
        'customer_phone',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public static function serviceLabel(?string $type): string
    {
        return match ($type) {
            'takeaway' => 'Takeaway',
            'delivery' => 'Delivery',
            default => 'Dine-in',
        };
    }

    public static function statusLabel(?string $status): string
    {
        return match ($status) {
            'processing' => 'Sedang Dimasak',
            'completed' => 'Selesai / Lunas',
            'cancelled' => 'Dibatalkan',
            default => 'Menunggu Diproses',
        };
    }

    public static function paymentLabel(?string $method): string
    {
        return match ($method) {
            'qris' => 'QRIS',
            'transfer' => 'Transfer Bank',
            default => 'Tunai / Kasir',
        };
    }
}
