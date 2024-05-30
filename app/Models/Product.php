<?php

namespace App\Models;

use App\Casts\Decimal;
use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'status',
        'stock_quantity',
    ];

    public function casts(): array
    {
        return [
            'price' => Decimal::class,
            'status' => StatusEnum::class,
        ];
    }
}
