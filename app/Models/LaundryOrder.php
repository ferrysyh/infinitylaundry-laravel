<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaundryOrder extends Model
{
    protected $fillable = ['laundry_id', 'package_id'];

    public function selectedLaundryItems()
    {
        return $this->hasMany(SelectedLaundryItem::class);
    }

    public function laundry()
    {
        return $this->belongTo(Laundry::class,'laundry_id');
    }
    
}
