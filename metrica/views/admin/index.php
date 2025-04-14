<?php 
use yii\helpers\Json;

$this->title = 'Demografía RICIT'; // ✅ Título de la pestaña

$this->registerJsFile('https://cdn.jsdelivr.net/npm/chart.js');
$this->registerJsFile('https://unpkg.com/leaflet@1.7.1/dist/leaflet.js');

$rangogaLabelsJson = Json::encode(array_map(function($item) {
    return $item['rangoga'] ?: 'No especificado';
}, $rangogaData));

$rangogaCountsJson = Json::encode(array_map(function($item) {
    return (int)$item['total'];
}, $rangogaData));

$sniResumenJson = Json::encode(array_values($sniResumen));
$nivelesSNIJson = Json::encode(array_values($nivelesSNI));

$entidadDataJson = $entidadData;
$municipioDataJson = $municipioData;

$chartScript = <<<JS
const colores1 = ['#4e79a7', '#f28e2b', '#e15759', '#bab0ab'];
const colores2 = ['#59a14f', '#e15759'];
const colores3 = ['#76b7b2', '#59a14f', '#af7aa1'];

new Chart(document.getElementById('graficoRangoga'), {
    type: 'pie',
    data: {
        labels: $rangogaLabelsJson,
        datasets: [{
            data: $rangogaCountsJson,
            backgroundColor: colores1
        }]
    },
    options: {
        responsive: false,
        maintainAspectRatio: false,
        plugins: {
            legend: { position: 'bottom' }
        }
    }
});

new Chart(document.getElementById('graficoSniResumen'), {
    type: 'pie',
    data: {
        labels: ['CANDIDATO', 'Con SNI'],
        datasets: [{
            data: $sniResumenJson,
            backgroundColor: colores2
        }]
    },
    options: {
        responsive: false,
        maintainAspectRatio: false,
        plugins: {
            legend: { position: 'bottom' }
        }
    }
});

new Chart(document.getElementById('graficoNiveles'), {
    type: 'pie',
    data: {
        labels: ['SNI_I', 'SNI_II', 'SNI_III'],
        datasets: [{
            data: $nivelesSNIJson,
            backgroundColor: colores3
        }]
    },
    options: {
        responsive: false,
        maintainAspectRatio: false,
        plugins: {
            legend: { position: 'bottom' }
        }
    }
});

const entidadData = $entidadDataJson;
const municipioData = $municipioDataJson;

const coordenadasEntidades = {
    aguascalientes: [21.8853, -102.2916],
    baja_california: [30.8406, -115.2838],
    baja_california_sur: [26.0444, -111.6661],
    campeche: [19.8301, -90.5349],
    coahuila: [27.0587, -101.7068],
    colima: [19.1223, -104.0072],
    chiapas: [16.7569, -93.1292],
    chihuahua: [28.6329, -106.0691],
    ciudad_de_mexico: [19.4326, -99.1332],
    durango: [24.0277, -104.6532],
    guanajuato: [21.0190, -101.2574],
    guerrero: [17.4392, -99.5451],
    hidalgo: [20.1011, -98.7591],
    jalisco: [20.6597, -103.3496],
    mexico: [19.2920, -99.6557],
    michoacan: [19.5665, -101.7068],
    morelos: [18.6813, -99.1013],
    nayarit: [21.7514, -104.8455],
    nuevo_leon: [25.5922, -99.9962],
    oaxaca: [17.0732, -96.7266],
    puebla: [19.0413, -98.2062],
    queretaro: [20.5888, -100.3899],
    quintana_roo: [19.1817, -88.4791],
    san_luis_potosi: [22.1565, -100.9855],
    sinaloa: [25.1721, -107.4795],
    sonora: [29.2972, -110.3309],
    tabasco: [17.8409, -92.6189],
    tamaulipas: [24.2669, -98.8363],
    tlaxcala: [19.3182, -98.2375],
    veracruz: [19.1738, -96.1342],
    yucatan: [20.7099, -89.0943],
    zacatecas: [22.7709, -102.5832],
};

const map = L.map('map').setView([23.6345, -102.5528], 5);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

entidadData.forEach(function (entidad) {
    const coords = coordenadasEntidades[entidad.entidad];
    if (!coords) return;

    const marker = L.marker(coords).addTo(map);
    marker.bindPopup('<b>' + entidad.entidad + '</b><br>' + entidad.cantidad + ' investigadores');

    marker.on('click', function () {
        const municipios = municipioData.filter(function (municipio) {
            return municipio.entidad === entidad.entidad;
        });

        let contenido = '<b>' + entidad.entidad + '</b><br><ul>';
        municipios.forEach(function (m) {
            contenido += '<li>' + m.municipio + ': ' + m.cantidad + '</li>';
        });
        contenido += '</ul>';

        marker.bindPopup(contenido).openPopup();
    });
});
JS;

$this->registerJs($chartScript);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $this->title ?></title> <!-- ✅ Usando el título de Yii -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://framework-gb.cdn.gob.mx/fonts/patria.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>
    <style>
        body {
            font-family: 'Noto sans'; 
            font-size: 18px;
            line-height: 1.428571429;
            color: #404041;
            margin-top: 10px;
            text-align: left;
            font-weight: 300;
        }
        h1 {
            font-family: 'Patria', serif;
            font-weight: bold;
        }
        .red {
            margin: 10px 0 70px;
            border-top-color: #DCE0E0;
        }
        hr.red::before {
            width: 35px;
            height: 5px;
            background-color: #B38E5D;
            position: absolute;
            display: block;
            content: " ";
        }
        #map {
            height: 400px;
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div style="max-width: 1000px; margin: 0 auto; padding: 0 20px;">
        <h1><strong>Demografía RICIT</strong></h1>
        <hr class="red">
        <p>Explora la distribución de la comunidad RICIT a lo largo de México. Aquí podrás ver cómo se distribuyen los investigadores por entidad y municipio, además de los rangos de edad y el Sistema Nacional de Investigadores (SNI).</p>

        <h1>Distribución por entidad y municipio</h1>
        <hr class="red">
        <p>Explora cómo se distribuyen los investigadores en cada estado y municipio.</p>
        <div id="map"></div>

        <h1>Rangos de edad</h1>
        <hr class="red">
        <p>Conoce cómo se distribuyen los investigadores por rangos de edad.</p>
        <div style="display: flex; justify-content: center;">
            <canvas id="graficoRangoga" style="width: 350px !important; height: 350px !important;"></canvas> <!-- ✅ Más pequeño -->
        </div>

        <h1>Comunidad SNI</h1>
        <hr class="red">
        <p>Descubre cuántos integrantes forman parte del Sistema Nacional de Investigadores (SNI).</p>
        <div style="display: flex; justify-content: center;">
            <canvas id="graficoSniResumen" style="width: 350px !important; height: 350px !important;"></canvas> <!-- ✅ Más pequeño -->
        </div>

        <h1>Nivel de SNI</h1>
        <hr class="red">
        <p>Explora cómo se distribuyen los integrantes de la comunidad en los distintos niveles del SNI.</p>
        <div style="display: flex; justify-content: center;">
            <canvas id="graficoNiveles" style="width: 350px !important; height: 350px !important;"></canvas> 
        </div>
    </div>
</body>
</html>
