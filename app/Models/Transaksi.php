<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'nama','no_booking','section','harga','date_of_issue'
    ];  
}
