<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterItemCode extends Model
{
    use HasFactory;
    protected $table = 'item';
    protected $fillable = [
        'OPNAME_QTY',
    ];
    public $timestamps = false;
}
