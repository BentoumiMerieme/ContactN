<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class naltis_contacts extends Model
{
    use HasFactory;
    protected $fillable =[
        'id_parent',
        'nom',
        'prenom',
        'tel',
        'tel2',
        'email',
        'address',
        'groupe'  
    ];
}
