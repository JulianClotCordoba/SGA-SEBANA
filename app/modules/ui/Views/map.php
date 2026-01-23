<?php
ob_start();
?>
    <!-- Leaflet CSS-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>


                        <div class="row">
                            <div class="col-md-12">
                                <!-- MAP DATA-->
                                <div class="map-data m-b-40">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi zmdi-map"></i>map data</h3>
                                    <div class="filters">
                                        <div class="select-wrapper">
                                            <select class="form-select form-select-lg" name="property">
                                                <option selected>All Properties</option>
                                                <option value="">Products</option>
                                                <option value="">Services</option>
                                            </select>
                                            
                                        </div>
                                        <div class="select-wrapper">
                                            <select class="form-select form-select-lg" name="time">
                                                <option selected value="all">All Time</option>
                                                <option value="month">By Month</option>
                                                <option value="day">By Day</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="map-wrap m-t-45 m-b-20">
                                        <div id="vmap" style="height: 284px;"></div>
                                    </div>
                                </div>
                                <!-- END MAP DATA-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- MAP DATA-->
                                <div class="map-data m-b-40">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi zmdi-map"></i>Europe</h3>
                                    <div class="map-wrap">
                                        <div class="vmap" id="vmap1"></div>
                                    </div>
                                </div>
                                <!-- END MAP DATA-->
                            </div>
                            <div class="col-md-6">
                                <!-- MAP DATA-->
                                <div class="map-data m-b-40">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi zmdi-map"></i>USA</h3>
                                    <div class="map-wrap">
                                        <div class="vmap" id="vmap2"></div>
                                    </div>
                                </div>
                                <!-- END MAP DATA-->
                            </div>
                            <div class="col-md-6">
                                <!-- MAP DATA-->
                                <div class="map-data m-b-40">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi zmdi-map"></i>Germany</h3>
                                    <div class="map-wrap">
                                        <div class="vmap" id="vmap3"></div>
                                    </div>
                                </div>
                                <!-- END MAP DATA-->
                            </div>
                            <div class="col-md-6">
                                <!-- MAP DATA-->
                                <div class="map-data m-b-40">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi zmdi-map"></i>France</h3>
                                    <div class="map-wrap">
                                        <div class="vmap" id="vmap4"></div>
                                    </div>
                                </div>
                                <!-- END MAP DATA-->
                            </div>
                            <div class="col-md-6">
                                <!-- MAP DATA-->
                                <div class="map-data m-b-40">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi zmdi-map"></i>Russia</h3>
                                    <div class="map-wrap">
                                        <div class="vmap" id="vmap5"></div>
                                    </div>
                                </div>
                                <!-- END MAP DATA-->
                            </div>
                            <div class="col-md-6">
                                <!-- MAP DATA-->
                                <div class="map-data m-b-40">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi zmdi-map"></i>Brazil</h3>
                                    <div class="map-wrap">
                                        <div class="vmap" id="vmap6"></div>
                                    </div>
                                </div>
                                <!-- END MAP DATA-->
                                <!-- END PAGE CONTAINER-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2025 Colorlib. All rights reserved. Template by <a href="https://colorlib.com" rel="nofollow" target="_blank">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <!-- Initialize Leaflet Maps for map.html only -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Only initialize if this is map.html (or since this IS map.php, always run)
        // const isMapPage = window.location.pathname.includes('map.html') || document.title.includes('Maps');
        
        if (typeof L === 'undefined') {
            return;
        }
        
        // Map configurations for different regions
        const mapConfigs = [
            {
                id: 'vmap',
                center: [20, 0],
                zoom: 2,
                title: 'World Map',
                data: [
                    { name: 'United States', lat: 39.8283, lng: -98.5795, value: 45000, color: '#00b5e9' },
                    { name: 'United Kingdom', lat: 55.3781, lng: -3.4360, value: 32000, color: '#4caf50' },
                    { name: 'Germany', lat: 51.1657, lng: 10.4515, value: 28000, color: '#ff9800' },
                    { name: 'Japan', lat: 36.2048, lng: 138.2529, value: 35000, color: '#e91e63' },
                    { name: 'Australia', lat: -25.2744, lng: 133.7751, value: 22000, color: '#9c27b0' },
                    { name: 'Brazil', lat: -14.2350, lng: -51.9253, value: 18000, color: '#f44336' },
                    { name: 'India', lat: 20.5937, lng: 78.9629, value: 25000, color: '#3f51b5' },
                    { name: 'China', lat: 35.8617, lng: 104.1954, value: 40000, color: '#00bcd4' }
                ]
            },
            {
                id: 'vmap1',
                center: [39.8283, -95.5795],
                zoom: 4,
                title: 'USA Map',
                data: [
                    { name: 'New York', lat: 40.7128, lng: -74.0060, value: 15000, color: '#00b5e9' },
                    { name: 'Los Angeles', lat: 34.0522, lng: -118.2437, value: 12000, color: '#4caf50' },
                    { name: 'Chicago', lat: 41.8781, lng: -87.6298, value: 8000, color: '#ff9800' },
                    { name: 'Houston', lat: 29.7604, lng: -95.3698, value: 6000, color: '#e91e63' },
                    { name: 'Miami', lat: 25.7617, lng: -80.1918, value: 4000, color: '#9c27b0' }
                ]
            },
            {
                id: 'vmap2',
                center: [-14.2350, -51.9253],
                zoom: 4,
                title: 'Brazil Map',
                data: [
                    { name: 'São Paulo', lat: -23.5505, lng: -46.6333, value: 8000, color: '#00b5e9' },
                    { name: 'Rio de Janeiro', lat: -22.9068, lng: -43.1729, value: 6000, color: '#4caf50' },
                    { name: 'Brasília', lat: -15.8267, lng: -47.9218, value: 4000, color: '#ff9800' }
                ]
            },
            {
                id: 'vmap3',
                center: [54.5260, 15.2551],
                zoom: 4,
                title: 'Europe Map',
                data: [
                    { name: 'London', lat: 51.5074, lng: -0.1278, value: 12000, color: '#00b5e9' },
                    { name: 'Paris', lat: 48.8566, lng: 2.3522, value: 10000, color: '#4caf50' },
                    { name: 'Berlin', lat: 52.5200, lng: 13.4050, value: 8000, color: '#ff9800' },
                    { name: 'Madrid', lat: 40.4168, lng: -3.7038, value: 6000, color: '#e91e63' },
                    { name: 'Rome', lat: 41.9028, lng: 12.4964, value: 5000, color: '#9c27b0' }
                ]
            },
            {
                id: 'vmap4',
                center: [46.6034, 1.8883],
                zoom: 6,
                title: 'France Map',
                data: [
                    { name: 'Paris', lat: 48.8566, lng: 2.3522, value: 10000, color: '#00b5e9' },
                    { name: 'Lyon', lat: 45.7640, lng: 4.8357, value: 4000, color: '#4caf50' },
                    { name: 'Marseille', lat: 43.2965, lng: 5.3698, value: 3000, color: '#ff9800' }
                ]
            },
            {
                id: 'vmap5',
                center: [51.1657, 10.4515],
                zoom: 6,
                title: 'Germany Map',
                data: [
                    { name: 'Berlin', lat: 52.5200, lng: 13.4050, value: 8000, color: '#00b5e9' },
                    { name: 'Munich', lat: 48.1351, lng: 11.5820, value: 5000, color: '#4caf50' },
                    { name: 'Hamburg', lat: 53.5511, lng: 9.9937, value: 4000, color: '#ff9800' }
                ]
            },
            {
                id: 'vmap6',
                center: [61.5240, 105.3188],
                zoom: 3,
                title: 'Russia Map',
                data: [
                    { name: 'Moscow', lat: 55.7558, lng: 37.6176, value: 12000, color: '#00b5e9' },
                    { name: 'St. Petersburg', lat: 59.9311, lng: 30.3609, value: 6000, color: '#4caf50' },
                    { name: 'Novosibirsk', lat: 55.0084, lng: 82.9357, value: 3000, color: '#ff9800' }
                ]
            }
        ];

        // Initialize each map
        mapConfigs.forEach(config => {
            const mapContainer = document.getElementById(config.id);
            if (mapContainer && typeof L !== 'undefined' && !mapContainer._leaflet_id) {
                try {
                    // Initialize the map
                    const map = L.map(config.id, {
                        center: config.center,
                        zoom: config.zoom,
                        zoomControl: true,
                        scrollWheelZoom: true,
                        dragging: true,
                        doubleClickZoom: true,
                        attributionControl: false
                    });

                    // Add tile layer
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '',
                        maxZoom: 18,
                        minZoom: 1
                    }).addTo(map);

                    // Add markers for each data point
                    config.data.forEach(point => {
                        const marker = L.circleMarker([point.lat, point.lng], {
                            radius: Math.sqrt(point.value / 200) + 3,
                            fillColor: point.color,
                            color: '#fff',
                            weight: 2,
                            opacity: 1,
                            fillOpacity: 0.7
                        }).addTo(map);

                        // Add popup with location info
                        marker.bindPopup(`
                            <div style="text-align: center; padding: 5px;">
                                <strong>${point.name}</strong><br>
                                <span style="color: ${point.color}; font-weight: bold;">$${point.value.toLocaleString()}</span>
                            </div>
                        `);

                        // Hover effects
                        marker.on('mouseover', function() {
                            this.setStyle({
                                fillOpacity: 0.9,
                                weight: 3
                            });
                        });

                        marker.on('mouseout', function() {
                            this.setStyle({
                                fillOpacity: 0.7,
                                weight: 2
                            });
                        });
                    });

                    // Add title control
                    const info = L.control({position: 'topright'});
                    info.onAdd = function() {
                        const div = L.DomUtil.create('div', 'info');
                        div.innerHTML = `<div style="background: rgba(255,255,255,0.9); padding: 6px 10px; border-radius: 4px; font-size: 12px; font-weight: 500; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">${config.title}</div>`;
                        return div;
                    };
                    info.addTo(map);

                } catch (error) {
                    console.error(`Error initializing ${config.title}:`, error);
                    // Fallback content
                    mapContainer.innerHTML = `
                        <div style="height: 100%; display: flex; align-items: center; justify-content: center; background: #f8f9fa; color: #666; border-radius: 8px;">
                            <div style="text-align: center;">
                                <i class="fas fa-map-marker-alt" style="font-size: 24px; margin-bottom: 8px;"></i>
                                <div style="font-size: 14px;">${config.title}</div>
                                <div style="font-size: 12px; opacity: 0.7;">Loading failed</div>
                            </div>
                        </div>
                    `;
                }
            }
        });

        console.log('All Leaflet maps initialized successfully');
    });
    </script>
<?php
$content = ob_get_clean();
require BASE_PATH . '/public/templates/base.html.php';
?>