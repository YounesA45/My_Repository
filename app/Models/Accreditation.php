<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accreditation extends Model
{
    use HasFactory;
    protected $fillable =[
            'NumeroDenvoi',
            'DateDenvoi',
            'Sender',
            'FamilyName',
            'Name',
            'Poste',
            'Wilaya',
            'NumeroDecision',
            'DateDecision',
            'fileDemande',
            'fileDecision'
    ];
}
