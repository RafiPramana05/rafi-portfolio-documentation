<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::active()->byType('project')->ordered()->get();
        $experiences = Project::active()->byType('experience')->ordered()->get();
        $organizations = Project::active()->byType('organization')->ordered()->get();
        
        return view('project.index', compact('projects', 'experiences', 'organizations'));
    }
}
