<?php

namespace App\Enums;

enum StatusEnum: string
{
    case STOCK = 'stock';
    case REPLACEMENT = 'replacement';
    case MISSING = 'missing';
}
