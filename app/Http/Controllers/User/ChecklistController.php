<?php

namespace App\Http\Controllers\User;

use App\Models\Checklist;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\ChecklistService;
use App\Http\Controllers\Controller;

class ChecklistController extends Controller
{
    public function show(Checklist $checklist): View
    {
        // Sync checklist from admin
        (new ChecklistService())->sync_checklist($checklist, auth()->id());
        return view('users.checklists.show', compact('checklist'));
    }
}
