@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold gradient-text mb-2">Manage Projects</h1>
            <p class="text-gray-400">Kelola semua projects, experiences & organizations</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.projects.trash') }}" class="btn-secondary text-gray-300 px-6 py-3 rounded-lg font-medium border border-gray-600 hover:border-gray-500 transition-all">
                <i class="fas fa-trash-restore mr-2"></i>
                Trash
            </a>
            <a href="{{ route('admin.projects.create') }}" class="btn-primary text-white px-6 py-3 rounded-lg font-medium">
                <i class="fas fa-plus mr-2"></i>
                Add Project
            </a>
        </div>
    </div>

    <!-- Projects Table -->
    <div class="glass rounded-xl overflow-hidden">
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-700">
                            <th class="text-left py-3 px-4 font-medium text-gray-300">Title</th>
                            <th class="text-left py-3 px-4 font-medium text-gray-300">Type</th>
                            <th class="text-left py-3 px-4 font-medium text-gray-300">Tags</th>
                            <th class="text-left py-3 px-4 font-medium text-gray-300">Status</th>
                            <th class="text-left py-3 px-4 font-medium text-gray-300">Created</th>
                            <th class="text-left py-3 px-4 font-medium text-gray-300">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($projects as $project)
                        <tr class="border-b border-gray-800 hover:bg-gray-800 hover:bg-opacity-30 transition-all duration-200">
                            <td class="py-4 px-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 {{ $project->gradient_class ? 'bg-gradient-to-r ' . $project->gradient_class : '' }} rounded-lg flex items-center justify-center mr-3" @if($project->gradient_style) style="{{ $project->gradient_style }}" @endif>
                                        <i class="{{ $project->icon }} text-white text-sm"></i>
                                    </div>
                                    <div>
                                        <div class="font-medium text-white">{{ $project->title }}</div>
                                        <div class="text-sm text-gray-400">{{ Str::limit($project->description, 50) }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="px-2 py-1 bg-blue-600 bg-opacity-20 text-blue-300 rounded-full text-xs font-medium capitalize">
                                    {{ $project->type }}
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex flex-wrap gap-1">
                                    @if($project->tags)
                                        @foreach(array_slice($project->tags, 0, 2) as $tag)
                                            <span class="px-2 py-1 bg-purple-600 bg-opacity-20 text-purple-300 rounded-full text-xs">
                                                {{ $tag }}
                                            </span>
                                        @endforeach
                                        @if(count($project->tags) > 2)
                                            <span class="px-2 py-1 bg-gray-600 bg-opacity-20 text-gray-300 rounded-full text-xs">
                                                +{{ count($project->tags) - 2 }}
                                            </span>
                                        @endif
                                    @endif
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <form method="POST" action="{{ route('admin.projects.toggle', $project) }}" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn-status px-3 py-1 rounded-full text-xs font-medium {{ $project->is_active ? 'bg-green-600 bg-opacity-20 text-green-300' : 'bg-red-600 bg-opacity-20 text-red-300' }}">
                                        <i class="fas fa-circle mr-1"></i>
                                        {{ $project->is_active ? 'Active' : 'Inactive' }}
                                    </button>
                                </form>
                            </td>
                            <td class="py-4 px-4 text-sm text-gray-400">
                                {{ $project->created_at->format('M d, Y') }}
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex items-center space-x-1">
                                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn-edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" class="inline delete-form" data-project-title="{{ $project->title }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn-delete delete-btn">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="py-8 px-4 text-center text-gray-400">
                                <i class="fas fa-inbox text-4xl mb-4"></i>
                                <p>No projects found. <a href="{{ route('admin.projects.create') }}" class="text-blue-400 hover:text-blue-300">Create your first project</a></p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle delete confirmations
    const deleteButtons = document.querySelectorAll('.delete-btn');
    
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            const form = this.closest('.delete-form');
            const projectTitle = form.dataset.projectTitle;
            
            showConfirmation({
                title: 'Move to Trash',
                message: `Are you sure you want to move "${projectTitle}" to trash? You can restore it later from the trash.`,
                confirmText: 'Move to Trash',
                cancelText: 'Cancel',
                type: 'warning',
                onConfirm: () => {
                    form.submit();
                }
            });
        });
    });
});
</script>
