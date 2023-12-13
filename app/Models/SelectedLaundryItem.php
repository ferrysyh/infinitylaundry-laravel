<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectedLaundryItem extends Model
{
    protected $fillable = ['laundry_order_id', 'name', 'quantity'];

    public function laundryOrder()
    {
        return $this->belongsTo(LaundryOrder::class);
    }
}
