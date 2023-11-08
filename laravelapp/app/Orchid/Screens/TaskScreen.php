<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;

class TaskScreen extends Screen
{
    /**
     * A method that defines all screen input data
     * is in it that database queries should be called,
     * api or any others (not necessarily explicit),
     * the result of which should be an array,
     * appeal to which his keys will be used.
     */
    public function query(): array
    {
        return [];
    }

    /**
     * The name is displayed on the user's screen and in the headers
     */
    public function name(): ?string
    {   

        return 'Simple To-Do List';
    }

    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {   
        $included = include('C:\xampp\htdocs\laravellapp\laravelapp\resources\views\vacancies\index.blade.php');
    
        // if ($included === false) {
        //     // File inclusion failed, handle the error as needed
        //     // For example, log an error or return a specific message
        //     return 'Error: Unable to include file vacancies.index';
        // } else {
        //     // File inclusion was successful, return the desired string
        //     return 'Orchid Quickstart';
        // }
        return $included;

    }
    
    /**
     * Identifies control buttons and events.
     * which will have to happen by pressing
     */
    public function commandBar(): array
    {
        return [];
    }

    /**
     * Set of mappings
     * rows, tables, graphs,
     * modal windows, and their combinations
     */
    public function layout(): array
    {
        return [];
    }

}