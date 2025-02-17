<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DRT extends Model
{
    use HasFactory;

    protected $table = 'drts';
    
    protected $fillable = ['code_drt','intitule_drt','poste_comptable_id'];


    public function DRT()
    {
        return $this->hasMany(PosteComptable::class);
    }
}

