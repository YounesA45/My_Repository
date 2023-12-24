<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostAccreditationController extends Controller
{
    public function addPost()
    {
        return view('Accreditation.post');
    }
    public function showPost()
    {
        return view('Accreditation.table');
    }
}
