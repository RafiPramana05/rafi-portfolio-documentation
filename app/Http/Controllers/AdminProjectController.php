<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Session;

class AdminProjectController extends Controller
{
    private function checkAuth()
    {
        if (!Session::has('admin_id')) {
            return redirect()->route('admin.login');
        }
        return null;
    }

    public function index()
    {
        if ($redirect = $this->checkAuth()) return $redirect;
        
        $projects = Project::ordered()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        if ($redirect = $this->checkAuth()) return $redirect;
        
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        if ($redirect = $this->checkAuth()) return $redirect;
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string',
            'gradient_from' => 'required|string',
            'gradient_to' => 'required|string',
            'tags' => 'required|string',
            'type' => 'required|in:project,experience,organization',
            'duration' => 'nullable|string',
            'location' => 'nullable|string',
            'link' => 'nullable|url',
            'sort_order' => 'nullable|integer'
        ]);

        $tags = array_map('trim', explode(',', $request->tags));

        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
            'gradient_from' => $request->gradient_from,
            'gradient_to' => $request->gradient_to,
            'tags' => $tags,
            'type' => $request->type,
            'duration' => $request->duration,
            'location' => $request->location,
            'link' => $request->link,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => true
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil ditambahkan!');
    }

    public function edit(Project $project)
    {
        if ($redirect = $this->checkAuth()) return $redirect;
        
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        if ($redirect = $this->checkAuth()) return $redirect;
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string',
            'gradient_from' => 'required|string',
            'gradient_to' => 'required|string',
            'tags' => 'required|string',
            'type' => 'required|in:project,experience,organization',
            'duration' => 'nullable|string',
            'location' => 'nullable|string',
            'link' => 'nullable|url',
            'sort_order' => 'nullable|integer'
        ]);

        $tags = array_map('trim', explode(',', $request->tags));

        $project->update([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
            'gradient_from' => $request->gradient_from,
            'gradient_to' => $request->gradient_to,
            'tags' => $tags,
            'type' => $request->type,
            'duration' => $request->duration,
            'location' => $request->location,
            'link' => $request->link,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil diupdate!');
    }

    public function destroy(Project $project)
    {
        if ($redirect = $this->checkAuth()) return $redirect;
        
        $project->delete(); // This will soft delete
        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil dipindahkan ke trash!');
    }

    public function trash()
    {
        if ($redirect = $this->checkAuth()) return $redirect;
        
        $trashedProjects = Project::onlyTrashed()->orderBy('deleted_at', 'desc')->get();
        
        // Count by type
        $stats = [
            'total' => $trashedProjects->count(),
            'projects' => $trashedProjects->where('type', 'project')->count(),
            'experiences' => $trashedProjects->where('type', 'experience')->count(),
            'organizations' => $trashedProjects->where('type', 'organization')->count()
        ];
        
        return view('admin.projects.trash', compact('trashedProjects', 'stats'));
    }

    public function restore($id)
    {
        if ($redirect = $this->checkAuth()) return $redirect;
        
        $project = Project::onlyTrashed()->findOrFail($id);
        $project->restore();
        
        return redirect()->route('admin.projects.trash')->with('success', 'Project berhasil dipulihkan!');
    }

    public function forceDelete($id)
    {
        if ($redirect = $this->checkAuth()) return $redirect;
        
        $project = Project::onlyTrashed()->findOrFail($id);
        $project->forceDelete();
        
        return redirect()->route('admin.projects.trash')->with('success', 'Project berhasil dihapus permanen!');
    }

    public function toggleStatus(Project $project)
    {
        if ($redirect = $this->checkAuth()) return $redirect;
        
        $project->update(['is_active' => !$project->is_active]);
        $status = $project->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return redirect()->route('admin.projects.index')->with('success', "Project berhasil {$status}!");
    }
}
