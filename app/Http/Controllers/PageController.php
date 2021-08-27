<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function welcome()
    {
        $page = Page::findOrFail(1); // Welcome page

        return view('page', compact('page'));
    }

    public function consultation()
    {
        $page = Page::findOrFail(2); // Get Consultation page

        return view('page', compact('page'));
    }
}