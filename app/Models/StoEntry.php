<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoEntry extends Model
{
    use HasFactory;

    protected $table = 'stock_opname';
    protected $primaryKey = 'id';

    protected $fillable = [
        'item_code',
        'part_name',
        'type',
        'location',
        'qty',
        'status',
        'created_by',
        'created_date',
        'update_date',
        'update_by'
    ];
}
