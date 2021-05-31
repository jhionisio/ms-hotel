<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HOTELModel extends Model
{
    protected $table = 'table_hotel';

    protected $fillable = [
            'id', 'required',
            'Nome' , 'required',
            'Sobre' , 'required'
    ];
}
