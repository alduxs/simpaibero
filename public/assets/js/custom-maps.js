const mapModalElement = document.getElementById("map-modal");

if (mapModalElement) {
    const mapModal = new bootstrap.Modal(mapModalElement);
    const seeMapButtons = document.querySelectorAll(".see-map-btn");

    seeMapButtons.forEach((button) => {
        button.addEventListener("click", function (event) {
            event.preventDefault();

            const mapId = this.dataset.mapId;
            const mapName = this.dataset.mapName;

            document.getElementById("map-modalLabel").textContent = mapName;

            fetch(`/map/${mapId}/points`)
                .then((response) => response.json())
                .then((points) => {
                    const mapContainer =
                        document.getElementById("map-container");
                    const map = new google.maps.Map(mapContainer, {
                        zoom: 5,
                        center: { lat: -34.397, lng: 150.644 }, // Default center
                    });

                    if (points.length > 0) {
                        if (points.length > 1) {
                            const bounds = new google.maps.LatLngBounds();
                            points.forEach((point) => {
                                const marker = new google.maps.Marker({
                                    position: {
                                        lat: parseFloat(point.pointLat),
                                        lng: parseFloat(point.pointLng),
                                    },
                                    map: map,
                                    title: point.pointName,
                                });
                                bounds.extend(marker.getPosition());
                            });
                            map.fitBounds(bounds);
                        } else {
                            points.forEach((point) => {
                                const marker = new google.maps.Marker({
                                    position: {
                                        lat: parseFloat(point.pointLat),
                                        lng: parseFloat(point.pointLng),
                                    },
                                    map: map,
                                    title: point.pointName,
                                });
                                map.setCenter(marker.getPosition());
                            });
                            map.setZoom(14);
                        }
                    }

                    mapModal.show();
                })
                .catch((error) =>
                    console.error("Error fetching points:", error),
                );
        });
    });
}
