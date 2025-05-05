var map = L.map('map', {
    center: [41.2014639, 1.5680321],
    zoom: 13
});

L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
	attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
	subdomains: 'abcd',
	maxZoom: 20
}).addTo(map);
    
window.search = (street) => {
    axios.get('https://nominatim.openstreetmap.org/search?q=' + street + '&format=json')
        .then(function (response) {
            console.log(response.data[0].lat, response.data[0].lon);
            map.setView([response.data[0].lat, response.data[0].lon], 18);
        })
        .catch(function (error) {
            console.log(error);
        });
}