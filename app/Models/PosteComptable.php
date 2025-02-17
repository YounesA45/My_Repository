<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosteComptable extends Model
{
    use HasFactory;

    protected $fillable = ['code_poste_comptable','intitule_poste_comptable','drt_id','ordonnateur_id'];
     // A Father belongs to one Grandfather
     public function DRT()
     {
         return $this->belongsTo(DRT::class, 'drt_id');
     }
 
     // A Father has many Boys
     public function Ordonnateur()
     {
         return $this->hasMany(Ordonnateur::class);
     }
}
