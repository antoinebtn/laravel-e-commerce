<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'surname',
        'company',
        'address',
        'postal',
        'city',
        'card_number',
        'card_expiration_date',
        'cryptogramme',
        'card_name',
        'user_id',
        'total_amount',
        'status',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity', 'price');
    }
}
