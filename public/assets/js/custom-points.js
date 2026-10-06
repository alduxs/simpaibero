const pointsAppBaseUrl = new URL(`${document.currentScript.dataset.baseUrl.replace(/\/+$/, "")}/`);
const seeModal = document.getElementById('see-modal');
const miModalMap = seeModal ? new bootstrap.Modal(seeModal) : null;

const deletePointModal = document.getElementById('delete-point-modal');
const miModalMap2 = deletePointModal ? new bootstrap.Modal(deletePointModal) : null;

const btDeletePoint = document.getElementById('btDeletePoint');


function initMap() {
    const mapElement = document.getElementById("map");
    if (!mapElement) {
        return;
    }

    new google.maps.Map(mapElement, {
        zoom: 3,
        disableDefaultUI: true,
    });
}

function seeMap(point) {
    const pointData = JSON.parse(point);
    const pointName = pointData.pointName;
    const pointAddress = pointData.pointAddress;
    const pointLat = parseFloat(pointData.pointLat);
    const pointLng = parseFloat(pointData.pointLng);

    document.getElementById('point-name').textContent = pointName;
    document.getElementById('point-address').textContent = pointAddress;

    var map = new google.maps.Map(document.getElementById("map"), {
        zoom: 8,
        center: { lat: pointLat, lng: pointLng },
        disableDefaultUI: true,
        zoomControl: true
    });

    var marker = new google.maps.Marker({
        position: { lat: pointLat, lng: pointLng },
        map: map,
        title: pointName
    });

    miModalMap.show();
}

function confirmDeleteMap(point) {
    const pointData = JSON.parse(point);
    const pointId = pointData.pointId;
    const pointName = pointData.pointName;
    const pointAddress = pointData.pointAddress;
    const pointLat = parseFloat(pointData.pointLat);
    const pointLng = parseFloat(pointData.pointLng);

    document.getElementById('point-name2').textContent = pointName;
    document.getElementById('point-address2').textContent = pointAddress;

    var map = new google.maps.Map(document.getElementById("map2"), {
        zoom: 8,
        center: { lat: pointLat, lng: pointLng },
        disableDefaultUI: true,
        zoomControl: true
    });

    var marker = new google.maps.Marker({
        position: { lat: pointLat, lng: pointLng },
        map: map,
        title: pointName
    });

    btDeletePoint.setAttribute('onclick', `setDeletePointAction('${pointId}')`);

    miModalMap2.show();
}


function setDeletePointAction(pointId) {

    console.log(pointId);

    const deleteForm = document.getElementById('deletePointForm');
    deleteForm.action = new URL(`point/${pointId}/destroy`, pointsAppBaseUrl).href;
    deleteForm.submit();
}
