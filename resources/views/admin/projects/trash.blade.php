@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold gradient-text mb-2">Trash</h1>
            <p class="text-gray-400">Pulihkan atau hapus permanen data yang sudah dihapus</p>
        </div>
        <a href="{{ route('admin.projects.index') }}" class="btn-secondary text-gray-300 px-6 py-3 rounded-lg font-medium border border-gray-600 hover:border-gray-500 transition-all">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Projects
        </a>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="glass rounded-xl p-6">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-gradient-to-r from-red-500 to-pink-600 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-trash text-white text-xl"></i>
                </div>
                <div>
                    <div class="text-2xl font-bold text-white">{{ $stats['total'] }}</div>
                    <div class="text-sm text-gray-400">Total Deleted</div>
                </div>
            </div>
        </div>
        
        <div class="glass rounded-xl p-6">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-project-diagram text-white text-xl"></i>
                </div>
                <div>
                    <div class="text-2xl font-bold text-white">{{ $stats['projects'] }}</div>
                    <div class="text-sm text-gray-400">Projects</div>
                </div>
            </div>
        </div>
        
        <div class="glass rounded-xl p-6">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-teal-600 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-briefcase text-white text-xl"></i>
                </div>
                <div>
                    <div class="text-2xl font-bold text-white">{{ $stats['experiences'] }}</div>
                    <div class="text-sm text-gray-400">Experiences</div>
                </div>
            </div>
        </div>
        
        <div class="glass rounded-xl p-6">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-orange-600 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-building text-white text-xl"></i>
                </div>
                <div>
                    <div class="text-2xl font-bold text-white">{{ $stats['organizations'] }}</div>
                    <div class="text-sm text-gray-400">Organizations</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Trashed Projects Table -->
    <div class="glass rounded-xl overflow-hidden">
        <div class="p-6">
            @if($trashedProjects->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-700">
                                <th class="text-left py-3 px-4 font-medium text-gray-300">Title</th>
                                <th class="text-left py-3 px-4 font-medium text-gray-300">Type</th>
                                <th class="text-left py-3 px-4 font-medium text-gray-300">Tags</th>
                                <th class="text-left py-3 px-4 font-medium text-gray-300">Deleted At</th>
                                <th class="text-left py-3 px-4 font-medium text-gray-300">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trashedProjects as $project)
                            <tr class="border-b border-gray-800 hover:bg-gray-800 hover:bg-opacity-30 transition-all duration-200">
                                <td class="py-4 px-4">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 {{ $project->gradient_class ? 'bg-gradient-to-r ' . $project->gradient_class : '' }} rounded-lg flex items-center justify-center mr-3 opacity-60" @if($project->gradient_style) style="{{ $project->gradient_style }}" @endif>
                                            <i class="{{ $project->icon }} text-white text-sm"></i>
                                        </div>
                                        <div>
                                            <div class="font-medium text-gray-300">{{ $project->title }}</div>
                                            <div class="text-sm text-gray-500">{{ Str::limit($project->description, 50) }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="px-2 py-1 bg-gray-600 bg-opacity-40 text-gray-400 rounded-full text-xs font-medium capitalize">
                                        {{ $project->type }}
                                    </span>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex flex-wrap gap-1">
                                        @if($project->tags)
                                            @foreach(array_slice($project->tags, 0, 2) as $tag)
                                                <span class="px-2 py-1 bg-gray-600 bg-opacity-40 text-gray-400 rounded-full text-xs">
                                                    {{ $tag }}
                                                </span>
                                            @endforeach
                                            @if(count($project->tags) > 2)
                                                <span class="px-2 py-1 bg-gray-600 bg-opacity-40 text-gray-400 rounded-full text-xs">
                                                    +{{ count($project->tags) - 2 }}
                                                </span>
                                            @endif
                                        @endif
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-sm text-gray-400">
                                    {{ $project->deleted_at->format('M d, Y H:i') }}
                                    <div class="text-xs text-gray-500">{{ $project->deleted_at->diffForHumans() }}</div>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex items-center space-x-2">
                                        <!-- Restore Button -->
                                        <form method="POST" action="{{ route('admin.projects.restore', $project->id) }}" class="inline restore-form" data-project-title="{{ $project->title }}">
                                            @csrf
                                            @method('PATCH')
                                            <button type="button" class="btn-restore restore-btn w-8 h-8 bg-green-600 bg-opacity-20 text-green-400 rounded-lg hover:bg-green-600 hover:bg-opacity-40 transition-all flex items-center justify-center" title="Restore">
                                                <i class="fas fa-undo text-sm"></i>
                                            </button>
                                        </form>
                                        
                                        <!-- Permanent Delete Button -->
                                        <form method="POST" action="{{ route('admin.projects.force-delete', $project->id) }}" class="inline force-delete-form" data-project-title="{{ $project->title }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn-force-delete force-delete-btn w-8 h-8 bg-red-600 bg-opacity-20 text-red-400 rounded-lg hover:bg-red-600 hover:bg-opacity-40 transition-all flex items-center justify-center" title="Permanent Delete">
                                                <i class="fas fa-times text-sm"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-12">
                    <div class="w-20 h-20 bg-gradient-to-r from-green-500 to-teal-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-check text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Trash is Empty</h3>
                    <p class="text-gray-400 mb-6">No projects have been deleted yet.</p>
                    <a href="{{ route('admin.projects.index') }}" class="btn-primary text-white px-6 py-3 rounded-lg font-medium">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to Projects
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .btn-restore:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);
    }
    
    .btn-force-delete:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
    }
    
    .btn-restore, .btn-force-delete {
        transition: all 0.2s ease;
    }
    
    .glass {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
    }
    
    .gradient-text {
        background: linear-gradient(135deg, #6c78ff 0%, #c181f6 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
</style>
@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle restore confirmations
    const restoreButtons = document.querySelectorAll('.restore-btn');
    
    restoreButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            const form = this.closest('.restore-form');
            const projectTitle = form.dataset.projectTitle;
            
            showConfirmation({
                title: 'Restore Project',
                message: `Are you sure you want to restore "${projectTitle}"? It will be moved back to the active projects list.`,
                confirmText: 'Restore',
                cancelText: 'Cancel',
                type: 'info',
                onConfirm: () => {
                    form.submit();
                }
            });
        });
    });

    // Handle permanent delete confirmations
    const forceDeleteButtons = document.querySelectorAll('.force-delete-btn');
    
    forceDeleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            const form = this.closest('.force-delete-form');
            const projectTitle = form.dataset.projectTitle;
            
            showConfirmation({
                title: 'Permanent Delete',
                message: `Are you sure you want to permanently delete "${projectTitle}"? This action cannot be undone and all data will be lost forever.`,
                confirmText: 'Delete Forever',
                cancelText: 'Cancel',
                type: 'danger',
                onConfirm: () => {
                    form.submit();
                }
            });
        });
    });
});
</script>
