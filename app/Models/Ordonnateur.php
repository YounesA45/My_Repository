<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordonnateur extends Model
{
    use HasFactory;
    protected $fillable = ['code_ordonnateur','intitule_ordonnateur','poste_comptable_id'];

    // A Boy belongs to one Father
    public function PosteComptable()
    {
        return $this->belongsTo(PosteComptable::class);
    }


}
