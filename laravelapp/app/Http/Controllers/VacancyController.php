<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancy;
use App\Models\User;

class VacancyController extends Controller
{
public function index()
{
    $vacancies = Vacancy::all(); // Retrieve all vacancies from the database

    return view('vacancy', compact('vacancies'));
}

public function user()
{
    return $this->belongsTo(User::class, 'user_id', 'ID');
}


}
