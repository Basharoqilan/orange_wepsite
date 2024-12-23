<?php

// app/Http/Controllers/ManagerController.php
namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index()
    {
        // Get all managers
        $managers = Manager::all();

        // Return view with managers data
        return view('managers.index', compact('managers'));
    }

    public function show($id)
    {
        // Find a specific manager
        $manager = Manager::findOrFail($id);

        // Return view with manager data
        return view('managers.show', compact('manager'));
    }

    // Other CRUD methods can be added here
}
