<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoEntry extends Model
{
    use HasFactory;

    protected $table = 'input_stock';
    protected $primaryKey = 'id';

    protected $fillable = [
        'item_code',
        'part_name',
        'type',
        'location',
        'qty',
        'action',

    ];
}
