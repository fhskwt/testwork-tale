<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOptionStore extends Model
{
    use HasFactory;

    protected $table = 'product_option_store';
    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'option_id',
        'code_1c'
    ];
}
