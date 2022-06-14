import './styles/map.css';
var map = L.map('map').setView([51.505, -0.09], 13);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap'
}).addTo(map);
L.marker([51.3, -0.15]).addTo(map);
L.marker([51.5, -0.07]).addTo(map);
L.marker([51.65, -0.20]).addTo(map);
L.marker([51.3, -0.09]).addTo(map);
L.marker([51.4, -0.09]).addTo(map);
L.marker([51.4, -0.09]).addTo(map);
