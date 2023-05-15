//Mapa padrao

let map = L.map('map',{
    layers: MQ.mapLayer(),
    center: [35.791188, -78.636755],
    zoom: 12
});

function runDirection(start, end){

    //Recria novo mapa apos ser removido
    map = L.map('map',{
        layers: MQ.mapLayer(),
        center: [23.7328302, -46.699522715],
        zoom: 0
    });

    var dir = MQ.routing.directions();

    dir.route({
        locations: [
            start, 
            end
        ]
    });

    CustomRouteLayer = MQ.Routing.RouteLayer.extend({
        createStartMarker: (location) => {
            var custom_icon;
            var marker;

            custom_icon = L.icon({
                iconUrl: '../img/red.png',
                iconSize: [20,29],
                iconAnchr: [10,29],
                popupAnchor: [0, -29]
            });

 
            marker = L.marker(location.latLng, {icon: custom_icon}).addTo(map);

            return marker;
        },

        createStartMarker: (location) => {
            var custom_icon;
            var marker;

            custom_icon = L.icon({
                iconUrl: '../img/blue.png',
                iconSize: [20,29],
                iconAnchr: [10,29],
                popupAnchor: [0, -29]
            })


            marker = L.marker(location.latLng, {icon: custom_icon}).addTo(map);

            return marker;
        }
    });

    map.addLayer(new CustomRouteLayer({
        directions: dir,
        fitBounds: true
    }));
}


//Função que retorna quando o forms for enviad

function submitForm(event){
    event.preventDefault();


    //Deleta o mapa atual
    map.remove();

    //Pegando as info

    start= document.getElementById('start').value;
    end = document.getElementById('destination').value;

    //Roda a função
    runDirection(start,end);

    //Reseta o forms
    document.getElementById('form').reset();
}


const form = document.getElementById('form');

form.addEventListener('submit', submitForm)