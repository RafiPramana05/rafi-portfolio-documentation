<!-- Google Maps Fallback Component -->
<script>
// Fallback for when Google Maps API is not available
window.initMapFallback = function() {
    const mapContainer = document.getElementById('google-map');
    if (mapContainer) {
        mapContainer.innerHTML = `
            <div class="w-full h-full flex items-center justify-center bg-gray-700 rounded-lg">
                <div class="text-center text-gray-400 p-6">
                    <i class="fas fa-map text-4xl mb-4"></i>
                    <h3 class="text-lg font-semibold mb-2">Google Maps Integration</h3>
                    <p class="text-sm mb-4">To enable interactive maps, add your Google Maps API key:</p>
                    <div class="bg-gray-800 p-3 rounded text-xs text-left">
                        <code class="text-blue-400">GOOGLE_MAPS_API_KEY=your_api_key</code>
                    </div>
                    <p class="text-xs mt-3 text-gray-500">
                        Get API key from: 
                        <a href="https://console.cloud.google.com/" target="_blank" class="text-blue-400 hover:text-blue-300">
                            Google Cloud Console
                        </a>
                    </p>
                </div>
            </div>
        `;
    }
    
    // Enable basic location selection via search and presets
    const locationSearch = document.getElementById('location-search');
    const selectedLocationDiv = document.getElementById('selected-location');
    let selectedLocationValue = '';
    
    if (locationSearch) {
        locationSearch.addEventListener('input', function() {
            const searchValue = this.value.trim();
            if (searchValue.length > 2) {
                selectedLocationValue = searchValue;
                selectedLocationDiv.textContent = searchValue;
            }
        });
    }
    
    // Preset location buttons still work
    document.querySelectorAll('.location-preset').forEach(button => {
        button.addEventListener('click', function() {
            const location = this.dataset.location;
            selectedLocationValue = location;
            selectedLocationDiv.textContent = location;
            if (locationSearch) locationSearch.value = location;
            
            // Highlight selected button
            document.querySelectorAll('.location-preset').forEach(btn => {
                btn.classList.remove('bg-blue-600');
                btn.classList.add('bg-gray-700');
            });
            this.classList.remove('bg-gray-700');
            this.classList.add('bg-blue-600');
        });
    });
    
    // Update apply location to use fallback value
    const applyLocationBtn = document.getElementById('apply-location');
    const locationInput = document.getElementById('location');
    
    if (applyLocationBtn) {
        applyLocationBtn.addEventListener('click', function() {
            if (selectedLocationValue) {
                locationInput.value = selectedLocationValue;
            }
            document.getElementById('location-picker-modal').classList.add('hidden');
        });
    }
};

// Check if Google Maps loaded, if not use fallback
setTimeout(function() {
    if (typeof google === 'undefined' || !google.maps) {
        console.warn('Google Maps API not loaded, using fallback mode');
        window.initMapFallback();
    }
}, 3000);
</script>
