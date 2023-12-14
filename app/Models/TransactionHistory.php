<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'laundry_id',
        'package_id',
        'order_id',
        'statuspembayaran',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function laundry()
    {
        return $this->belongsTo(Laundry::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function laundryOrder()
    {
        return $this->belongsTo(LaundryOrder::class, 'order_id');
    }
}
