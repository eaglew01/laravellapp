<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Vacancy;
use App\Models\User;

class VacancyController extends Controller
{
public function index()
{
    $vacancies = Vacancy::orderBy('id','desc')->paginate(5);

    return view('vacancies.index', compact('vacancies'));
}

public function getAll()
{
    $vacancies = Vacancy::all();

    return view('vacancyHome', compact('vacancies'));
}

public function user()
{
    return $this->belongsTo(User::class, 'user_id', 'ID');
}




public function create()
{
    return view('vacancies.create');
}

/**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            
            'title' => 'required',
            'body' => 'required',
            'user_id' => ['required', 'exists:users,id'],
        ]);
        
        Vacancy::create($request->post());

        return redirect()->route('vacancies.index')->with('success','Vacancy has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('vacancies.show',compact('vacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacancy $vacancy)
    {
        return view('vacancies.edit',compact('vacancy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vacancy $vacancy)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'user_id' => ['required', 'exists:users,id'],
        ]);
        
        
        $vacancy->fill($request->post())->save();

        return redirect()->route('vacancies.index')->with('success','Vacancy Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();
        return redirect()->route('vacancies.index')->with('success','Vacancy has been deleted successfully');
    }

}