<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOptionStore extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'product_option_store';

    protected $fillable = [
        'product_id',
        'option_id',
        'code_1c'
    ];
}
