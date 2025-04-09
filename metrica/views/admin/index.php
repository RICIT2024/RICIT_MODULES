<?php
use yii\helpers\Json;

$this->registerJsFile('https://cdn.jsdelivr.net/npm/chart.js');

// Convierte los datos de PHP a JSON para usarlos en JavaScript
$rangogaLabelsJson = Json::encode(array_map(function($item) {
    return $item['rangoga'] ?: 'No especificado';
}, $rangogaData));

$rangogaCountsJson = Json::encode(array_map(function($item) {
    return (int)$item['total'];
}, $rangogaData));

$sniResumenJson = Json::encode(array_values($sniResumen));

$nivelesSNIJson = Json::encode(array_values($nivelesSNI));

// Script para renderizar las gráficas
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
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom'
            }
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
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom'
            }
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
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});
JS;

$this->registerJs($chartScript);
?>

<div class="container">
    <h2 class="mt-4 mb-3">Gráficas Demográficas</h2>

    <div class="row">
        <div class="col-md-6 mb-5">
            <h4 class="text-center">Por Rango de Edad</h4>
            <canvas id="graficoRangoga"></canvas>
        </div>
        <div class="col-md-6 mb-5">
            <h4 class="text-center">Candidatos vs Con SNI</h4>
            <canvas id="graficoSniResumen"></canvas>
        </div>
        <div class="col-md-6 mb-5">
            <h4 class="text-center">Nivel de SNI</h4>
            <canvas id="graficoNiveles"></canvas>
        </div>
    </div>
</div>
