function initMap(coordinates) {
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: {lat: coordinates[0][1], lng: coordinates[0][2]}
    });

    setMarkers(map, coordinates);
}

function setMarkers(map, coordinates) {
    var image = {
        url: '/assets/default/img/marker-xl.png',
        size: new google.maps.Size(64, 64)
    };
    for (var i = 0; i < coordinates.length; i++) {
        var coordinate = coordinates[i];
        var marker = new google.maps.Marker({
            position: {lat: coordinate[1], lng: coordinate[2]},
            map: map,
            icon: image,
            title: coordinate[0],
            content: coordinate[3]
        });

        google.maps.event.addListener(marker, 'click', function() {
            var infowindow = new google.maps.InfoWindow();
            infowindow.setContent(this.content);
            infowindow.open(map, this);
        });
    }
}