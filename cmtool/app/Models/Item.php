<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $table = "item";
    protected $primaryKey = 'item_id';
    use HasFactory;
}
