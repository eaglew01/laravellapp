<?php

namespace App\Http\Controllers;

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
}
