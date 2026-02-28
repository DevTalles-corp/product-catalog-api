<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ["name", "price", "stock"];

    protected $casts = [
        "price" => "decimal:2",
        "stock" => "integer"
    ];
}
