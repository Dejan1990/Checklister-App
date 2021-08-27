<?php

namespace App\Http\Controllers\User;

use App\Models\Checklist;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChecklistController extends Controller
{
    public function show(Checklist $checklist): View
    {
        return view('users.checklists.show', compact('checklist'));
    }
}
