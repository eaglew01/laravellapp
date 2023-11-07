<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index()
    {
        // Retrieve all FAQs from the database
        $faqs = FAQ::all();

        // Return the view and pass the FAQs data to it
        return view('faqs.index', compact('faqs'));
    }

    public function create()
{   
    $categories = Category::all(); // Retrieve all categories
    return view('faqs.create', ['categories' => $categories]);

}

/**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            
            'question' => 'required',
            // 'answer' => 'nullable',
            'category_id' => 'required',
            
        ]);
        
        FAQ::create($request->post());

        return redirect()->route('faqs.index')->with('success','Youre question has been posted successfully.');
    }

}
