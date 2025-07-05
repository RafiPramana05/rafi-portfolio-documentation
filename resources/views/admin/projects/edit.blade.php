@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold gradient-text mb-2">Edit Project</h1>
        <p class="text-gray-400">Edit project: {{ $project->title }}</p>
    </div>

    <div class="glass rounded-xl p-8">
        <form method="POST" action="{{ route('admin.projects.update', $project) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-300 mb-2">
                        Title <span class="text-red-400">*</span>
                    </label>
                    <input type="text" name="title" id="title" required
                           class="w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white placeholder-gray-400 transition-all duration-300"
                           placeholder="Enter project title" value="{{ old('title', $project->title) }}">
                    @error('title')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Type -->
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-300 mb-2">
                        Type <span class="text-red-400">*</span>
                    </label>
                    <select name="type" id="type" required
                            class="w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white transition-all duration-300">
                        <option value="project" {{ old('type', $project->type) == 'project' ? 'selected' : '' }}>Project</option>
                        <option value="experience" {{ old('type', $project->type) == 'experience' ? 'selected' : '' }}>Experience</option>
                        <option value="organization" {{ old('type', $project->type) == 'organization' ? 'selected' : '' }}>Organization</option>
                    </select>
                    @error('type')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-300 mb-2">
                    Description <span class="text-red-400">*</span>
                </label>
                <textarea name="description" id="description" rows="4" required
                          class="w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white placeholder-gray-400 transition-all duration-300"
                          placeholder="Enter project description">{{ old('description', $project->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Icon -->
                <div>
                    <label for="icon" class="block text-sm font-medium text-gray-300 mb-2">
                        Icon Class <span class="text-red-400">*</span>
                    </label>
                    <input type="hidden" name="icon" id="icon" value="{{ old('icon', $project->icon) }}">

                    <!-- Selected Icon Display -->
                    <div class="mb-3 p-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 flex items-center justify-center bg-blue-500 rounded-lg">
                                <i id="selected-icon" class="{{ old('icon', $project->icon) }} text-white"></i>
                            </div>
                            <span id="selected-icon-text" class="text-white">{{ old('icon', $project->icon) }}</span>
                        </div>
                    </div>

                    <!-- Icon Picker Button -->
                    <button type="button" id="icon-picker-btn"
                            class="w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white transition-all duration-300 hover:bg-gray-700">
                        <i class="fas fa-th mr-2"></i>
                        Choose Icon
                    </button>

                    @error('icon')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Icon Picker Modal -->
                <div id="icon-picker-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
                    <div class="flex items-center justify-center min-h-screen p-4">
                        <div class="bg-gray-800 rounded-xl p-6 max-w-4xl w-full max-h-[80vh] overflow-y-auto">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-xl font-bold text-white">Choose an Icon</h3>
                                <button type="button" id="close-icon-picker" class="text-gray-400 hover:text-white">
                                    <i class="fas fa-times text-xl"></i>
                                </button>
                            </div>

                            <!-- Search -->
                            <div class="mb-4">
                                <input type="text" id="icon-search"
                                       class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400"
                                       placeholder="Search icons...">
                            </div>

                            <!-- Icon Grid -->
                            <div id="icon-grid" class="grid grid-cols-6 sm:grid-cols-8 md:grid-cols-10 lg:grid-cols-12 gap-3">
                                <!-- Icons will be populated by JavaScript -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tags -->
                <div>
                    <label for="tags" class="block text-sm font-medium text-gray-300 mb-2">
                        Tags <span class="text-red-400">*</span>
                    </label>
                    <input type="text" name="tags" id="tags" required
                           class="w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white placeholder-gray-400 transition-all duration-300"
                           placeholder="e.g., Leadership, Education, Management" value="{{ old('tags', is_array($project->tags) ? implode(', ', $project->tags) : $project->tags) }}">
                    <p class="mt-1 text-xs text-gray-400">Separate tags with commas</p>
                    @error('tags')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Gradient From -->
                <div>
                    <label for="gradient_from" class="block text-sm font-medium text-gray-300 mb-2">
                        Gradient From <span class="text-red-400">*</span>
                    </label>
                    <input type="hidden" name="gradient_from" id="gradient_from" value="{{ old('gradient_from', $project->gradient_from) }}">
                    
                    <!-- Color Preview -->
                    <div class="mb-3 p-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg">
                        <div class="flex items-center space-x-3">
                            <div id="gradient-from-preview" class="w-8 h-8 rounded-lg border-2 border-gray-500" style="background: {{ old('gradient_from', $project->gradient_from) }};"></div>
                            <span id="gradient-from-text" class="text-white text-sm">{{ old('gradient_from', $project->gradient_from) }}</span>
                        </div>
                    </div>
                    
                    <!-- Color Picker Button -->
                    <button type="button" id="gradient-from-btn" 
                            class="w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white transition-all duration-300 hover:bg-gray-700">
                        <i class="fas fa-palette mr-2"></i>
                        Choose Color
                    </button>
                    
                    @error('gradient_from')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Gradient To -->
                <div>
                    <label for="gradient_to" class="block text-sm font-medium text-gray-300 mb-2">
                        Gradient To <span class="text-red-400">*</span>
                    </label>
                    <input type="hidden" name="gradient_to" id="gradient_to" value="{{ old('gradient_to', $project->gradient_to) }}">
                    
                    <!-- Color Preview -->
                    <div class="mb-3 p-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg">
                        <div class="flex items-center space-x-3">
                            <div id="gradient-to-preview" class="w-8 h-8 rounded-lg border-2 border-gray-500" style="background: {{ old('gradient_to', $project->gradient_to) }};"></div>
                            <span id="gradient-to-text" class="text-white text-sm">{{ old('gradient_to', $project->gradient_to) }}</span>
                        </div>
                    </div>
                    
                    <!-- Color Picker Button -->
                    <button type="button" id="gradient-to-btn" 
                            class="w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white transition-all duration-300 hover:bg-gray-700">
                        <i class="fas fa-palette mr-2"></i>
                        Choose Color
                    </button>
                    
                    @error('gradient_to')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Color Picker Modal -->
            <div id="color-picker-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
                <div class="flex items-center justify-center min-h-screen p-4">
                    <div class="bg-gray-800 rounded-xl p-6 max-w-md w-full">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl font-bold text-white">Choose Color</h3>
                            <button type="button" id="close-color-picker" class="text-gray-400 hover:text-white">
                                <i class="fas fa-times text-xl"></i>
                            </button>
                        </div>
                        
                        <!-- Color Preview -->
                        <div class="mb-4">
                            <div id="color-preview" class="w-full h-16 rounded-lg border-2 border-gray-600 mb-2" style="background: #3B82F6;"></div>
                            <div id="gradient-preview" class="w-full h-8 rounded-lg border-2 border-gray-600"></div>
                        </div>
                        
                        <!-- Hue Slider -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-300 mb-2">Hue</label>
                            <input type="range" id="hue-slider" min="0" max="360" value="220" 
                                   class="w-full h-2 bg-gradient-to-r from-red-500 via-yellow-500 via-green-500 via-cyan-500 via-blue-500 via-purple-500 to-red-500 rounded-lg appearance-none cursor-pointer">
                        </div>
                        
                        <!-- Saturation Slider -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-300 mb-2">Saturation</label>
                            <input type="range" id="saturation-slider" min="0" max="100" value="100" 
                                   class="w-full h-2 bg-gradient-to-r from-gray-400 to-blue-500 rounded-lg appearance-none cursor-pointer">
                        </div>
                        
                        <!-- Lightness Slider -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-300 mb-2">Lightness</label>
                            <input type="range" id="lightness-slider" min="0" max="100" value="50" 
                                   class="w-full h-2 bg-gradient-to-r from-black via-blue-500 to-white rounded-lg appearance-none cursor-pointer">
                        </div>
                        
                        <!-- Hex Input -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-300 mb-2">Hex Color</label>
                            <input type="text" id="hex-input" 
                                   class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400"
                                   placeholder="#3B82F6" value="#3B82F6">
                        </div>
                        
                        <!-- Preset Colors -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-300 mb-2">Quick Colors</label>
                            <div class="grid grid-cols-8 gap-2">
                                <div class="preset-color w-8 h-8 rounded cursor-pointer border-2 border-gray-600 hover:scale-110 transition-transform" style="background: #3B82F6;" data-color="#3B82F6"></div>
                                <div class="preset-color w-8 h-8 rounded cursor-pointer border-2 border-gray-600 hover:scale-110 transition-transform" style="background: #10B981;" data-color="#10B981"></div>
                                <div class="preset-color w-8 h-8 rounded cursor-pointer border-2 border-gray-600 hover:scale-110 transition-transform" style="background: #8B5CF6;" data-color="#8B5CF6"></div>
                                <div class="preset-color w-8 h-8 rounded cursor-pointer border-2 border-gray-600 hover:scale-110 transition-transform" style="background: #EF4444;" data-color="#EF4444"></div>
                                <div class="preset-color w-8 h-8 rounded cursor-pointer border-2 border-gray-600 hover:scale-110 transition-transform" style="background: #F59E0B;" data-color="#F59E0B"></div>
                                <div class="preset-color w-8 h-8 rounded cursor-pointer border-2 border-gray-600 hover:scale-110 transition-transform" style="background: #EC4899;" data-color="#EC4899"></div>
                                <div class="preset-color w-8 h-8 rounded cursor-pointer border-2 border-gray-600 hover:scale-110 transition-transform" style="background: #6366F1;" data-color="#6366F1"></div>
                                <div class="preset-color w-8 h-8 rounded cursor-pointer border-2 border-gray-600 hover:scale-110 transition-transform" style="background: #06B6D4;" data-color="#06B6D4"></div>
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="flex justify-end space-x-3">
                            <button type="button" id="cancel-color" class="px-4 py-2 text-gray-400 hover:text-white transition-colors">
                                Cancel
                            </button>
                            <button type="button" id="apply-color" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                                Apply
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Duration -->
                <div>
                    <label for="duration" class="block text-sm font-medium text-gray-300 mb-2">Duration</label>
                    <div class="relative">
                        <input type="text" name="duration" id="duration"
                               class="w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white placeholder-gray-400 transition-all duration-300"
                               placeholder="e.g., 2023 - Present" value="{{ old('duration', $project->duration) }}" readonly>
                        <button type="button" id="duration-picker-btn" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-blue-400 hover:text-blue-300 transition-colors">
                            <i class="fas fa-calendar-alt"></i>
                        </button>
                    </div>
                    @error('duration')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Location -->
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-300 mb-2">Location</label>
                    <div class="relative">
                        <input type="text" name="location" id="location"
                               class="w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white placeholder-gray-400 transition-all duration-300"
                               placeholder="e.g., Indonesia" value="{{ old('location', $project->location) }}" readonly>
                        <button type="button" id="location-picker-btn" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-blue-400 hover:text-blue-300 transition-colors">
                            <i class="fas fa-map-marker-alt"></i>
                        </button>
                    </div>
                    @error('location')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Link -->
                <div>
                    <label for="link" class="block text-sm font-medium text-gray-300 mb-2">Link</label>
                    <input type="url" name="link" id="link"
                           class="w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white placeholder-gray-400 transition-all duration-300"
                           placeholder="https://example.com" value="{{ old('link', $project->link) }}">
                    @error('link')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Sort Order -->
                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-300 mb-2">Sort Order</label>
                    <input type="number" name="sort_order" id="sort_order"
                           class="w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white placeholder-gray-400 transition-all duration-300"
                           placeholder="0" value="{{ old('sort_order', $project->sort_order) }}">
                    @error('sort_order')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Status -->
            <div>
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" {{ old('is_active', $project->is_active) ? 'checked' : '' }}
                           class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                    <span class="ml-2 text-sm text-gray-300">Active (visible on website)</span>
                </label>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.projects.index') }}" class="btn-secondary px-6 py-3 text-white rounded-lg">
                    Cancel
                </a>
                <button type="submit" class="btn-primary px-6 py-3 text-white rounded-lg">
                    <i class="fas fa-save mr-2"></i>
                    Update Project
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Duration Picker Modal -->
<div id="duration-picker-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-gray-800 rounded-xl p-6 max-w-md w-full">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-white">Select Duration</h3>
                <button type="button" id="close-duration-picker" class="text-gray-400 hover:text-white">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <div class="space-y-4">
                <!-- Start Date -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Start Date</label>
                    <input type="date" id="start-date" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                </div>

                <!-- End Date -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">End Date</label>
                    <div class="flex items-center space-x-2">
                        <input type="date" id="end-date" class="flex-1 px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                        <label class="flex items-center text-sm text-gray-300">
                            <input type="checkbox" id="is-present" class="mr-2">
                            Present
                        </label>
                    </div>
                </div>

                <!-- Quick Options -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Quick Options</label>
                    <div class="grid grid-cols-2 gap-2">
                        <button type="button" class="duration-preset px-3 py-2 bg-gray-700 text-white rounded hover:bg-gray-600 transition-colors" data-duration="2024 - Present">2024 - Present</button>
                        <button type="button" class="duration-preset px-3 py-2 bg-gray-700 text-white rounded hover:bg-gray-600 transition-colors" data-duration="2023 - 2024">2023 - 2024</button>
                        <button type="button" class="duration-preset px-3 py-2 bg-gray-700 text-white rounded hover:bg-gray-600 transition-colors" data-duration="2022 - 2023">2022 - 2023</button>
                        <button type="button" class="duration-preset px-3 py-2 bg-gray-700 text-white rounded hover:bg-gray-600 transition-colors" data-duration="2021 - 2022">2021 - 2022</button>
                    </div>
                </div>

                <!-- Preview -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Preview</label>
                    <div id="duration-preview" class="px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                        Select dates to see preview
                    </div>
                </div>
            </div>

            <div class="flex justify-end space-x-3 mt-6">
                <button type="button" id="cancel-duration" class="px-4 py-2 text-gray-400 hover:text-white transition-colors">
                    Cancel
                </button>
                <button type="button" id="apply-duration" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                    Apply
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Location Picker Modal -->
<div id="location-picker-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-gray-800 rounded-xl p-6 max-w-2xl w-full max-h-[80vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-white">Select Location</h3>
                <button type="button" id="close-location-picker" class="text-gray-400 hover:text-white">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Search Box -->
            <div class="mb-4">
                <input type="text" id="location-search" placeholder="Search for a location..." 
                       class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400">
            </div>

            <!-- Map Container -->
            <div id="map-container" class="w-full h-64 bg-gray-700 rounded-lg mb-4 overflow-hidden">
                <div id="openstreet-map" class="w-full h-full"></div>
            </div>

            <!-- Popular Locations -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-300 mb-2">Popular Locations</label>
                <div class="grid grid-cols-2 gap-2">
                    <button type="button" class="location-preset px-3 py-2 bg-gray-700 text-white rounded hover:bg-gray-600 transition-colors" data-location="Jakarta, Indonesia">Jakarta, Indonesia</button>
                    <button type="button" class="location-preset px-3 py-2 bg-gray-700 text-white rounded hover:bg-gray-600 transition-colors" data-location="Bandung, Indonesia">Bandung, Indonesia</button>
                    <button type="button" class="location-preset px-3 py-2 bg-gray-700 text-white rounded hover:bg-gray-600 transition-colors" data-location="Surabaya, Indonesia">Surabaya, Indonesia</button>
                    <button type="button" class="location-preset px-3 py-2 bg-gray-700 text-white rounded hover:bg-gray-600 transition-colors" data-location="Yogyakarta, Indonesia">Yogyakarta, Indonesia</button>
                    <button type="button" class="location-preset px-3 py-2 bg-gray-700 text-white rounded hover:bg-gray-600 transition-colors" data-location="Remote">Remote</button>
                    <button type="button" class="location-preset px-3 py-2 bg-gray-700 text-white rounded hover:bg-gray-600 transition-colors" data-location="International">International</button>
                </div>
            </div>

            <!-- Selected Location -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-300 mb-2">Selected Location</label>
                <div class="relative">
                    <div id="selected-location" class="px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white min-h-[44px] flex items-center">
                        No location selected
                    </div>
                    <div class="absolute right-3 top-1/2 transform -translate-y-1/2">
                        <i class="fas fa-map-marker-alt text-blue-400"></i>
                    </div>
                </div>
            </div>

            <div class="flex justify-end space-x-3">
                <button type="button" id="cancel-location" class="px-4 py-2 text-gray-400 hover:text-white transition-colors">
                    Cancel
                </button>
                <button type="button" id="apply-location" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                    Apply
                </button>
            </div>
        </div>
    </div>
</div>

<!-- OpenLayers CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@8.2.0/ol.css" type="text/css">

<!-- OpenLayers JS -->
<script src="https://cdn.jsdelivr.net/npm/ol@8.2.0/dist/ol.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Icon collection - popular Font Awesome icons
    const icons = [
        'fas fa-graduation-cap', 'fas fa-code', 'fas fa-laptop', 'fas fa-mobile-alt', 'fas fa-desktop',
        'fas fa-server', 'fas fa-database', 'fas fa-cloud', 'fas fa-network-wired', 'fas fa-wifi',
        'fas fa-globe', 'fas fa-globe-asia', 'fas fa-globe-americas', 'fas fa-globe-europe', 'fas fa-map',
        'fas fa-chart-line', 'fas fa-chart-bar', 'fas fa-chart-pie', 'fas fa-tachometer-alt',
        'fas fa-users', 'fas fa-user', 'fas fa-user-tie', 'fas fa-user-graduate', 'fas fa-user-cog',
        'fas fa-briefcase', 'fas fa-building', 'fas fa-industry', 'fas fa-home', 'fas fa-store',
        'fas fa-book', 'fas fa-book-open', 'fas fa-newspaper', 'fas fa-file-alt', 'fas fa-clipboard',
        'fas fa-lightbulb', 'fas fa-brain', 'fas fa-cog', 'fas fa-tools', 'fas fa-wrench',
        'fas fa-rocket', 'fas fa-star', 'fas fa-trophy', 'fas fa-medal', 'fas fa-award',
        'fas fa-heart', 'fas fa-thumbs-up', 'fas fa-fire', 'fas fa-bolt', 'fas fa-magic',
        'fas fa-camera', 'fas fa-video', 'fas fa-music', 'fas fa-headphones', 'fas fa-microphone',
        'fas fa-gamepad', 'fas fa-puzzle-piece', 'fas fa-chess', 'fas fa-dice', 'fas fa-football-ball',
        'fas fa-palette', 'fas fa-paint-brush', 'fas fa-pen', 'fas fa-pencil-alt', 'fas fa-marker',
        'fas fa-envelope', 'fas fa-phone', 'fas fa-comments', 'fas fa-comment', 'fas fa-bullhorn',
        'fas fa-shield-alt', 'fas fa-lock', 'fas fa-key', 'fas fa-fingerprint', 'fas fa-eye',
        'fas fa-shopping-cart', 'fas fa-credit-card', 'fas fa-dollar-sign', 'fas fa-coins', 'fas fa-piggy-bank',
        'fas fa-car', 'fas fa-plane', 'fas fa-train', 'fas fa-ship', 'fas fa-bicycle',
        'fas fa-tree', 'fas fa-leaf', 'fas fa-seedling', 'fas fa-sun',
        'fab fa-github', 'fab fa-gitlab', 'fab fa-bitbucket', 'fab fa-docker', 'fab fa-aws',
        'fab fa-google', 'fab fa-microsoft', 'fab fa-apple', 'fab fa-windows', 'fab fa-linux',
        'fab fa-android', 'fab fa-react', 'fab fa-angular', 'fab fa-node-js',
        'fab fa-python', 'fab fa-java', 'fab fa-php', 'fab fa-laravel', 'fab fa-wordpress',
        'fab fa-bootstrap', 'fab fa-sass', 'fab fa-html5', 'fab fa-css3-alt', 'fab fa-js-square'
    ];

    const iconPickerBtn = document.getElementById('icon-picker-btn');
    const iconPickerModal = document.getElementById('icon-picker-modal');
    const closeIconPicker = document.getElementById('close-icon-picker');
    const iconGrid = document.getElementById('icon-grid');
    const iconSearch = document.getElementById('icon-search');
    const selectedIcon = document.getElementById('selected-icon');
    const selectedIconText = document.getElementById('selected-icon-text');
    const iconInput = document.getElementById('icon');

    // Populate icon grid
    function populateIconGrid(filteredIcons = icons) {
        iconGrid.innerHTML = '';
        filteredIcons.forEach(iconClass => {
            const iconElement = document.createElement('div');
            iconElement.className = 'icon-option flex items-center justify-center w-12 h-12 bg-gray-700 rounded-lg cursor-pointer hover:bg-blue-500 transition-all duration-200';
            iconElement.innerHTML = `<i class="${iconClass} text-white text-lg"></i>`;
            iconElement.title = iconClass;

            iconElement.addEventListener('click', function() {
                // Update selected icon
                selectedIcon.className = iconClass + ' text-white';
                selectedIconText.textContent = iconClass;
                iconInput.value = iconClass;

                // Close modal
                iconPickerModal.classList.add('hidden');
            });

            iconGrid.appendChild(iconElement);
        });
    }

    // Search functionality
    iconSearch.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const filteredIcons = icons.filter(icon =>
            icon.toLowerCase().includes(searchTerm)
        );
        populateIconGrid(filteredIcons);
    });

    // Open modal
    iconPickerBtn.addEventListener('click', function() {
        iconPickerModal.classList.remove('hidden');
        populateIconGrid();
        iconSearch.value = '';
    });

    // Close modal
    closeIconPicker.addEventListener('click', function() {
        iconPickerModal.classList.add('hidden');
    });

    // Close modal when clicking outside
    iconPickerModal.addEventListener('click', function(e) {
        if (e.target === iconPickerModal) {
            iconPickerModal.classList.add('hidden');
        }
    });

    // Initialize icon grid
    populateIconGrid();

    // Color Picker functionality (same as edit form)
    let currentColorTarget = null;
    const colorPickerModal = document.getElementById('color-picker-modal');
    const colorPreview = document.getElementById('color-preview');
    const gradientPreview = document.getElementById('gradient-preview');
    const hueSlider = document.getElementById('hue-slider');
    const saturationSlider = document.getElementById('saturation-slider');
    const lightnessSlider = document.getElementById('lightness-slider');
    const hexInput = document.getElementById('hex-input');
    const gradientFromBtn = document.getElementById('gradient-from-btn');
    const gradientToBtn = document.getElementById('gradient-to-btn');
    const closeColorPicker = document.getElementById('close-color-picker');
    const cancelColor = document.getElementById('cancel-color');
    const applyColor = document.getElementById('apply-color');

    // Helper functions
    function hslToHex(h, s, l) {
        l /= 100;
        const a = s * Math.min(l, 1 - l) / 100;
        const f = n => {
            const k = (n + h / 30) % 12;
            const color = l - a * Math.max(Math.min(k - 3, 9 - k, 1), -1);
            return Math.round(255 * color).toString(16).padStart(2, '0');
        };
        return `#${f(0)}${f(8)}${f(4)}`;
    }

    function hexToHsl(hex) {
        const r = parseInt(hex.slice(1, 3), 16) / 255;
        const g = parseInt(hex.slice(3, 5), 16) / 255;
        const b = parseInt(hex.slice(5, 7), 16) / 255;

        const max = Math.max(r, g, b);
        const min = Math.min(r, g, b);
        let h, s, l = (max + min) / 2;

        if (max === min) {
            h = s = 0;
        } else {
            const d = max - min;
            s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
            switch (max) {
                case r: h = (g - b) / d + (g < b ? 6 : 0); break;
                case g: h = (b - r) / d + 2; break;
                case b: h = (r - g) / d + 4; break;
            }
            h /= 6;
        }

        return [Math.round(h * 360), Math.round(s * 100), Math.round(l * 100)];
    }

    function updateColorPreview() {
        const h = hueSlider.value;
        const s = saturationSlider.value;
        const l = lightnessSlider.value;
        const hexColor = hslToHex(h, s, l);
        
        colorPreview.style.background = hexColor;
        hexInput.value = hexColor;
        
        // Update gradient preview
        const fromColor = document.getElementById('gradient_from').value || '#3B82F6';
        const toColor = document.getElementById('gradient_to').value || '#7C3AED';
        gradientPreview.style.background = `linear-gradient(90deg, ${fromColor}, ${toColor})`;
    }

    function updateSlidersFromHex(hex) {
        const [h, s, l] = hexToHsl(hex);
        hueSlider.value = h;
        saturationSlider.value = s;
        lightnessSlider.value = l;
        updateColorPreview();
    }

    function openColorPicker(target) {
        currentColorTarget = target;
        colorPickerModal.classList.remove('hidden');
        
        // Set initial color
        const currentColor = target === 'from' ? 
            document.getElementById('gradient_from').value || '#3B82F6' :
            document.getElementById('gradient_to').value || '#7C3AED';
        
        updateSlidersFromHex(currentColor);
    }

    // Event listeners
    hueSlider.addEventListener('input', updateColorPreview);
    saturationSlider.addEventListener('input', updateColorPreview);
    lightnessSlider.addEventListener('input', updateColorPreview);
    
    hexInput.addEventListener('input', function() {
        const hex = this.value;
        if (/^#[0-9A-F]{6}$/i.test(hex)) {
            updateSlidersFromHex(hex);
        }
    });

    gradientFromBtn.addEventListener('click', () => openColorPicker('from'));
    gradientToBtn.addEventListener('click', () => openColorPicker('to'));

    closeColorPicker.addEventListener('click', () => {
        colorPickerModal.classList.add('hidden');
    });

    cancelColor.addEventListener('click', () => {
        colorPickerModal.classList.add('hidden');
    });

    applyColor.addEventListener('click', function() {
        const selectedColor = hexInput.value;
        
        if (currentColorTarget === 'from') {
            document.getElementById('gradient_from').value = selectedColor;
            document.getElementById('gradient-from-preview').style.background = selectedColor;
            document.getElementById('gradient-from-text').textContent = selectedColor;
        } else {
            document.getElementById('gradient_to').value = selectedColor;
            document.getElementById('gradient-to-preview').style.background = selectedColor;
            document.getElementById('gradient-to-text').textContent = selectedColor;
        }
        
        colorPickerModal.classList.add('hidden');
        updateColorPreview();
    });

    // Preset colors
    document.querySelectorAll('.preset-color').forEach(colorDiv => {
        colorDiv.addEventListener('click', function() {
            const color = this.dataset.color;
            updateSlidersFromHex(color);
        });
    });

    // Close modal when clicking outside
    colorPickerModal.addEventListener('click', function(e) {
        if (e.target === colorPickerModal) {
            colorPickerModal.classList.add('hidden');
        }
    });

    // Initialize color previews
    updateColorPreview();

    // Duration Picker functionality
    const durationPickerBtn = document.getElementById('duration-picker-btn');
    const durationPickerModal = document.getElementById('duration-picker-modal');
    const closeDurationPicker = document.getElementById('close-duration-picker');
    const cancelDuration = document.getElementById('cancel-duration');
    const applyDuration = document.getElementById('apply-duration');
    const startDateInput = document.getElementById('start-date');
    const endDateInput = document.getElementById('end-date');
    const isPresentCheckbox = document.getElementById('is-present');
    const durationPreview = document.getElementById('duration-preview');
    const durationInput = document.getElementById('duration');

    function updateDurationPreview() {
        const startDate = startDateInput.value;
        const endDate = endDateInput.value;
        const isPresent = isPresentCheckbox.checked;

        if (startDate) {
            const startYear = new Date(startDate).getFullYear();
            let preview = startYear.toString();

            if (isPresent) {
                preview += ' - Present';
            } else if (endDate) {
                const endYear = new Date(endDate).getFullYear();
                if (startYear === endYear) {
                    preview = startYear.toString();
                } else {
                    preview += ' - ' + endYear;
                }
            } else {
                preview += ' - Present';
            }

            durationPreview.textContent = preview;
        } else {
            durationPreview.textContent = 'Select dates to see preview';
        }
    }

    // Parse existing duration to set initial values
    function parseDuration(duration) {
        if (!duration) return;

        // Handle formats like "2023 - Present", "2023 - 2024", "2023"
        const presentMatch = duration.match(/(\d{4})\s*-\s*Present/i);
        const rangeMatch = duration.match(/(\d{4})\s*-\s*(\d{4})/);
        const singleMatch = duration.match(/^(\d{4})$/);

        if (presentMatch) {
            startDateInput.value = presentMatch[1] + '-01-01';
            isPresentCheckbox.checked = true;
            endDateInput.disabled = true;
        } else if (rangeMatch) {
            startDateInput.value = rangeMatch[1] + '-01-01';
            endDateInput.value = rangeMatch[2] + '-12-31';
            isPresentCheckbox.checked = false;
            endDateInput.disabled = false;
        } else if (singleMatch) {
            startDateInput.value = singleMatch[1] + '-01-01';
            endDateInput.value = singleMatch[1] + '-12-31';
            isPresentCheckbox.checked = false;
        }
        updateDurationPreview();
    }

    // Event listeners for duration picker
    startDateInput.addEventListener('change', updateDurationPreview);
    endDateInput.addEventListener('change', updateDurationPreview);
    isPresentCheckbox.addEventListener('change', function() {
        endDateInput.disabled = this.checked;
        if (this.checked) {
            endDateInput.value = '';
        }
        updateDurationPreview();
    });

    // Duration preset buttons
    document.querySelectorAll('.duration-preset').forEach(button => {
        button.addEventListener('click', function() {
            const duration = this.dataset.duration;
            durationInput.value = duration;
            parseDuration(duration);
        });
    });

    durationPickerBtn.addEventListener('click', function() {
        durationPickerModal.classList.remove('hidden');
        parseDuration(durationInput.value);
    });

    closeDurationPicker.addEventListener('click', function() {
        durationPickerModal.classList.add('hidden');
    });

    cancelDuration.addEventListener('click', function() {
        durationPickerModal.classList.add('hidden');
    });

    applyDuration.addEventListener('click', function() {
        const preview = durationPreview.textContent;
        if (preview !== 'Select dates to see preview') {
            durationInput.value = preview;
        }
        durationPickerModal.classList.add('hidden');
    });

    // Location Picker functionality
    const locationPickerBtn = document.getElementById('location-picker-btn');
    const locationPickerModal = document.getElementById('location-picker-modal');
    const closeLocationPicker = document.getElementById('close-location-picker');
    const cancelLocation = document.getElementById('cancel-location');
    const applyLocation = document.getElementById('apply-location');
    const locationSearch = document.getElementById('location-search');
    const selectedLocationDiv = document.getElementById('selected-location');
    const locationInput = document.getElementById('location');
    let selectedLocationValue = '';

    // Location preset buttons
    document.querySelectorAll('.location-preset').forEach(button => {
        button.addEventListener('click', function() {
            const location = this.dataset.location;
            selectedLocationValue = location;
            selectedLocationDiv.textContent = location;
            
            // Move map to location (except for Remote/International)
            if (location !== 'Remote' && location !== 'International') {
                // Pan to Indonesia center for Indonesian cities
                map.getView().setCenter(ol.proj.fromLonLat([106.8456, -6.2088]));
                map.getView().setZoom(6);
            } else {
                geocodeAddress(location);
            }
            
            // Highlight selected button
            document.querySelectorAll('.location-preset').forEach(btn => {
                btn.classList.remove('bg-blue-600');
                btn.classList.add('bg-gray-700');
            });
            this.classList.remove('bg-gray-700');
            this.classList.add('bg-blue-600');
        });
    });





    closeLocationPicker.addEventListener('click', function() {
        locationPickerModal.classList.add('hidden');
    });

    cancelLocation.addEventListener('click', function() {
        locationPickerModal.classList.add('hidden');
    });

    applyLocation.addEventListener('click', function() {
        if (selectedLocationValue) {
            locationInput.value = selectedLocationValue;
            showToast('Location updated successfully!', 'success');
        } else {
            showToast('Please select a location first', 'warning');
        }
        locationPickerModal.classList.add('hidden');
    });

    // Close modals when clicking outside
    durationPickerModal.addEventListener('click', function(e) {
        if (e.target === durationPickerModal) {
            durationPickerModal.classList.add('hidden');
        }
    });

    locationPickerModal.addEventListener('click', function(e) {
        if (e.target === locationPickerModal) {
            locationPickerModal.classList.add('hidden');
        }
    });

    // OpenLayers Map Integration
    let map;
    let marker;
    let markerLayer;
    let searchTimeout;

    function initializeMap() {
        // Default location (Jakarta, Indonesia)
        const defaultLocation = [106.8456, -6.2088]; // [longitude, latitude] for OpenLayers
        
        // Create marker feature
        const markerFeature = new ol.Feature({
            geometry: new ol.geom.Point(ol.proj.fromLonLat(defaultLocation))
        });

        // Create marker style
        const markerStyle = new ol.style.Style({
            image: new ol.style.Icon({
                anchor: [0.5, 1],
                src: 'data:image/svg+xml;base64,' + btoa(`
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="#3B82F6">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                    </svg>
                `)
            })
        });

        markerFeature.setStyle(markerStyle);

        // Create vector source and layer for marker
        const vectorSource = new ol.source.Vector({
            features: [markerFeature]
        });

        markerLayer = new ol.layer.Vector({
            source: vectorSource
        });

        // Initialize map
        map = new ol.Map({
            target: 'openstreet-map',
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM({
                        url: 'https://{a-c}.tile.openstreetmap.org/{z}/{x}/{y}.png'
                    })
                }),
                markerLayer
            ],
            view: new ol.View({
                center: ol.proj.fromLonLat(defaultLocation),
                zoom: 13
            })
        });

        marker = markerFeature;

        // Map click event to move marker
        map.on('click', function(event) {
            const coordinate = event.coordinate;
            const lonLat = ol.proj.toLonLat(coordinate);
            
            // Move marker
            marker.getGeometry().setCoordinates(coordinate);
            
            // Reverse geocode
            reverseGeocode(lonLat[1], lonLat[0]); // lat, lon
        });

        // Set initial location if exists
        const currentLocation = locationInput.value;
        if (currentLocation && currentLocation !== '') {
            geocodeAddress(currentLocation);
        }
    }

    // Reverse geocoding using Nominatim (OpenStreetMap)
    async function reverseGeocode(lat, lon) {
        try {
            const response = await fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}&zoom=18&addressdetails=1`);
            const data = await response.json();
            
            if (data && data.display_name) {
                selectedLocationValue = data.display_name;
                selectedLocationDiv.textContent = data.display_name;
            }
        } catch (error) {
            console.error('Reverse geocoding error:', error);
        }
    }

    // Forward geocoding using Nominatim (OpenStreetMap)
    async function geocodeAddress(address) {
        try {
            const response = await fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}&limit=1&addressdetails=1`);
            const data = await response.json();
            
            if (data && data.length > 0) {
                const location = data[0];
                const lat = parseFloat(location.lat);
                const lon = parseFloat(location.lon);
                
                // Update map view and marker
                const coordinate = ol.proj.fromLonLat([lon, lat]);
                map.getView().setCenter(coordinate);
                marker.getGeometry().setCoordinates(coordinate);
                
                // Update selected location
                selectedLocationValue = location.display_name;
                selectedLocationDiv.textContent = location.display_name;
            }
        } catch (error) {
            console.error('Geocoding error:', error);
        }
    }

    // Enhanced search with debouncing
    locationSearch.addEventListener('input', function() {
        const searchValue = this.value.trim();
        
        // Clear previous timeout
        if (searchTimeout) {
            clearTimeout(searchTimeout);
        }
        
        if (searchValue.length > 2) {
            // Debounce the search request
            searchTimeout = setTimeout(async () => {
                try {
                    const response = await fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(searchValue)}&limit=5&addressdetails=1`);
                    const data = await response.json();
                    
                    if (data && data.length > 0) {
                        const location = data[0]; // Use first result
                        const lat = parseFloat(location.lat);
                        const lon = parseFloat(location.lon);
                        
                        // Update map view and marker
                        const coordinate = ol.proj.fromLonLat([lon, lat]);
                        map.getView().setCenter(coordinate);
                        marker.getGeometry().setCoordinates(coordinate);
                        
                        // Update selected location
                        selectedLocationValue = location.display_name;
                        selectedLocationDiv.textContent = location.display_name;
                    }
                } catch (error) {
                    console.error('Search error:', error);
                }
            }, 500); // 500ms delay
        }
    });

    // Initialize map when modal opens
    let mapInitialized = false;
    locationPickerBtn.addEventListener('click', function() {
        console.log('Location picker clicked in edit page!');
        locationPickerModal.classList.remove('hidden');
        if (!mapInitialized) {
            // Small delay to ensure modal is visible
            setTimeout(function() {
                initializeMap();
                // Force map to refresh size
                if (map) {
                    map.updateSize();
                }
                mapInitialized = true;
            }, 100);
        } else {
            // Force map to refresh size when modal reopens
            setTimeout(function() {
                if (map) {
                    map.updateSize();
                }
            }, 100);
        }
    });
});
</script>
@endsection
