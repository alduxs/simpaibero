let mapdiv = document.getElementById("map");
let mapdiv2 = document.getElementById("map2");
let map;
let map2;
//---------------------------------------------
let btnHamburger = document.getElementById("bt-hamburger");
let btnFind = document.getElementById("bt-find");
let findContainer = document.getElementById("findcontainer");
let menu = document.getElementById("menu");
let velo = document.getElementById("velo");
let bloqueServicio = document.querySelectorAll(".bloque-servicio");
let btMasInfo = document.getElementById("masinfo");
let image = "assets/images/mk.png";
let anchoPantalla =
    window.innerWidth ||
    document.documentElement.clientWidth ||
    document.body.clientWidth;


//let coordeanadasF = JSON.parse(coordeanadas);

function initMap() {
    if (mapdiv && mapdiv2) {
        var styledMapType = new google.maps.StyledMapType([
            {
                featureType: "water",
                elementType: "geometry.fill",
                stylers: [
                    {
                        color: "#d3d3d3",
                    },
                ],
            },
            {
                featureType: "transit",
                stylers: [
                    {
                        color: "#808080",
                    },
                    {
                        visibility: "off",
                    },
                ],
            },
            {
                featureType: "road.highway",
                elementType: "geometry.stroke",
                stylers: [
                    {
                        visibility: "on",
                    },
                    {
                        color: "#b3b3b3",
                    },
                ],
            },
            {
                featureType: "road.highway",
                elementType: "geometry.fill",
                stylers: [
                    {
                        color: "#ffffff",
                    },
                ],
            },
            {
                featureType: "road.local",
                elementType: "geometry.fill",
                stylers: [
                    {
                        visibility: "on",
                    },
                    {
                        color: "#ffffff",
                    },
                    {
                        weight: 1.8,
                    },
                ],
            },
            {
                featureType: "road.local",
                elementType: "geometry.stroke",
                stylers: [
                    {
                        color: "#d7d7d7",
                    },
                ],
            },
            {
                featureType: "poi",
                elementType: "geometry.fill",
                stylers: [
                    {
                        visibility: "on",
                    },
                    {
                        color: "#ebebeb",
                    },
                ],
            },
            {
                featureType: "administrative",
                elementType: "geometry",
                stylers: [
                    {
                        color: "#a7a7a7",
                    },
                ],
            },
            {
                featureType: "road.arterial",
                elementType: "geometry.fill",
                stylers: [
                    {
                        color: "#ffffff",
                    },
                ],
            },
            {
                featureType: "road.arterial",
                elementType: "geometry.fill",
                stylers: [
                    {
                        color: "#ffffff",
                    },
                ],
            },
            {
                featureType: "landscape",
                elementType: "geometry.fill",
                stylers: [
                    {
                        visibility: "on",
                    },
                    {
                        color: "#efefef",
                    },
                ],
            },
            {
                featureType: "road",
                elementType: "labels.text.fill",
                stylers: [
                    {
                        color: "#696969",
                    },
                ],
            },
            {
                featureType: "administrative",
                elementType: "labels.text.fill",
                stylers: [
                    {
                        visibility: "on",
                    },
                    {
                        color: "#737373",
                    },
                ],
            },
            {
                featureType: "poi",
                elementType: "labels.icon",
                stylers: [
                    {
                        visibility: "off",
                    },
                ],
            },
            {
                featureType: "poi",
                elementType: "labels",
                stylers: [
                    {
                        visibility: "off",
                    },
                ],
            },
            {
                featureType: "road.arterial",
                elementType: "geometry.stroke",
                stylers: [
                    {
                        color: "#d6d6d6",
                    },
                ],
            },
            {
                featureType: "road",
                elementType: "labels.icon",
                stylers: [
                    {
                        visibility: "off",
                    },
                ],
            },
            {},
            {
                featureType: "poi",
                elementType: "geometry.fill",
                stylers: [
                    {
                        color: "#dadada",
                    },
                ],
            },
        ]);

        infowindow = new google.maps.InfoWindow();

        var myLatLng = {
            lat: -3.93676,
            lng: -69.844134,
        };

        var map = new google.maps.Map(mapdiv, {
            center: myLatLng,
            zoom: 3,
            disableDefaultUI: true,
        });

        mapData[1].maps_points.forEach(function (coordenada) {
            var Lat = parseFloat(coordenada.pointLat);
            var Long = parseFloat(coordenada.pointLng);
            var myLatlng = {
                lat: Lat,
                lng: Long,
            };
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: coordenada.pointName,
                icon: image,
            });
            marker.setMap(map);

            var content =
                '<div style="font-family:Arial,sans-serif;font-size:13px;color:#575757;text-align:left;">' +
                coordenada.pointName +
                "</div>";

            google.maps.event.addListener(
                marker,
                "click",
                (function (marker, content, infowindow) {
                    return function () {
                        infowindow.setContent(content);
                        infowindow.open(map, marker);
                    };
                })(marker, content, infowindow),
            );
        });

        //Associate the styled map with the MapTypeId and set it to display.
        map.mapTypes.set("styled_map", styledMapType);
        map.setMapTypeId("styled_map");

        //console.log(mapData[0].maps_points[0].pointLat);

        //MAPA 2
        var myLatLngEmpr = {
            lat: parseFloat(mapData[0].maps_points[0].pointLat),
            lng: parseFloat(mapData[0].maps_points[0].pointLng),
        };

        var map2 = new google.maps.Map(mapdiv2, {
            center: myLatLngEmpr,
            zoom: 15,
            disableDefaultUI: true,
        });

        var marker = new google.maps.Marker({
            position: myLatLngEmpr,
            map: map2,
            icon: image,
        });

        //Associate the styled map with the MapTypeId and set it to display.
        map2.mapTypes.set("styled_map", styledMapType);
        map2.setMapTypeId("styled_map");
    }
}

btnHamburger.addEventListener("click", function () {
    if (menu.classList.contains("open-menu")) {
        velo.style.display = "none";
    } else {
        velo.style.display = "block";
    }

    menu.classList.toggle("open-menu");
    this.classList.toggle("open");
});



bloqueServicio.forEach((bloque) => {
    bloque.addEventListener("click", function () {
        let parrafo = this.querySelector("p");
        parrafo.classList.toggle("p-active");
        this.classList.toggle("backcolor");
    });
});

window.onload = (event) => {
    const cardContent = document.getElementById("cardcontent");
    const mascontent = document.querySelector(".mascontent");
    const divshadow = document.getElementById("divshadow");
    const highTopNavigation = document.querySelector(".top-navigation");
    const altoNavegation = (highTopNavigation.clientHeight-2) + 'px';


    if (anchoPantalla < 768) {
        if (cardContent) {
            const divtext = document.getElementById("divtext");
            divtext.style.display = "block";
            divshadow.style.display = "none";
            cardContent.style.height = "fit-content";
        }
    } else {
        if (cardContent) {
            const imgposventa = document.getElementById("imgposventa");
            const altoimgposventa = imgposventa.clientHeight;
            cardContent.style.height = altoimgposventa - 60 + "px";
        }

        if (mascontent) {
            const divtext = document.getElementById("divtext");
            mascontent.addEventListener("click", function () {
                if (mascontent.textContent.trim() === "+") {
                    divtext.style.display = "block";
                    mascontent.textContent = "-";
                    cardContent.style.height = "fit-content";
                } else {
                    divtext.style.display = "none";
                    mascontent.textContent = "+";
                    const imgposventa = document.getElementById("imgposventa");
                    const altoimgposventa = imgposventa.clientHeight;
                    cardContent.style.height = altoimgposventa - 60 + "px";
                }
            });
        }
    }

    btnFind.addEventListener("click", function () {

        let positioFind = window.getComputedStyle(findContainer);

        if(positioFind.top=='0px'){
            findContainer.style.top = altoNavegation;
        } else {
            findContainer.style.top = '0px';
        }

    });
};
