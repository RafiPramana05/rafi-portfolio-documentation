@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold gradient-text mb-2">Admin Dashboard</h1>
        <p class="text-gray-400">Selamat datang di panel admin untuk mengelola projects & experiences</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="glass p-6 rounded-xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-400">Total Projects</p>
                    <p class="text-2xl font-bold text-white">{{ $totalProjects }}</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-project-diagram text-white"></i>
                </div>
            </div>
        </div>

        <div class="glass p-6 rounded-xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-400">Active Projects</p>
                    <p class="text-2xl font-bold text-white">{{ $activeProjects }}</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-teal-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-check-circle text-white"></i>
                </div>
            </div>
        </div>

        <div class="glass p-6 rounded-xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-400">Total Messages</p>
                    <p class="text-2xl font-bold text-white">{{ \App\Models\Contact::count() }}</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-orange-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-envelope text-white"></i>
                </div>
            </div>
        </div>

        <div class="glass p-6 rounded-xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-400">Unread Messages</p>
                    <p class="text-2xl font-bold text-white">{{ \App\Models\Contact::unread()->count() }}</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-red-500 to-pink-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-exclamation-circle text-white"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="mb-8">
        <h2 class="text-xl font-bold text-white mb-4">Quick Actions</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <a href="{{ route('admin.projects.create') }}" class="glass quick-action-card p-6 rounded-xl block">
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-plus text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white">Add Project</h3>
                    <p class="text-sm text-gray-400">Tambah project baru</p>
                </div>
            </a>

            <a href="{{ route('admin.projects.index') }}" class="glass quick-action-card p-6 rounded-xl block">
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-teal-600 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-list text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white">Manage Projects</h3>
                    <p class="text-sm text-gray-400">Kelola semua projects</p>
                </div>
            </a>

            <a href="{{ route('admin.messages.index') }}" class="glass quick-action-card p-6 rounded-xl block">
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-r from-yellow-500 to-orange-600 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-envelope text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white">Messages</h3>
                    <p class="text-sm text-gray-400">Kelola pesan visitor</p>
                    @if(\App\Models\Contact::unread()->count() > 0)
                        <span class="inline-block bg-red-500 text-white text-xs px-2 py-1 rounded-full mt-1">
                            {{ \App\Models\Contact::unread()->count() }} unread
                        </span>
                    @endif
                </div>
            </a>

            <a href="{{ route('project.index') }}" target="_blank" class="glass quick-action-card p-6 rounded-xl block">
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-600 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-eye text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white">View Site</h3>
                    <p class="text-sm text-gray-400">Lihat halaman project</p>
                </div>
            </a>
        </div>
    </div>

    <!-- Project Types Distribution -->
    @if(count($projectTypes) > 0)
    <div class="glass p-6 rounded-xl">
        <h2 class="text-xl font-bold text-white mb-4">Project Distribution</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($projectTypes as $type => $count)
            <div class="bg-gray-800 bg-opacity-50 p-4 rounded-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-400 capitalize">{{ $type }}</p>
                        <p class="text-xl font-bold text-white">{{ $count }}</p>
                    </div>
                    <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-chart-pie text-white text-sm"></i>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
