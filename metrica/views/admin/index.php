    <?php
    $this->title = 'Demografía RICIT';

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

    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Demografía RICIT | RICIT | Secretaría de Turismo | Gobierno | gob.mx</title>
        <style>
            .red {
                margin: 10px 0 70px; /*Establece los márgenes del contenido*/
                border-top-color: #DCE0E0; /*Establece el color del borde superior a un tono gris*/
            }
            hr.red::before {
                width: 35px; /*Ancho del elemento*/
                height: 5px; /*Altura del elemento*/
                background-color: #B38E5D; /*Color de fondo a un tono marrón*/
                position: absolute; /*Coloca el elemento de manera absoluta con respecto a su contenedor más cercano*/
                display: block; /*Hace que el elemento se muestre como un bloque*/
                content: " "; /*Inserta un contenido vacío dentro del elemento, esto es NECESARIO para que el elemento sea renderizado correctamente*/
            }
            body {
                font-family: 'Noto sans'; /*Fuente de la página*/
                font-size: 18px; /*Tamaño de la fuente*/
                line-height: 1.428571429; /*Determina la distancia entre las líneas de texto*/
                color: #404041; /*Color del texto a un gris oscuro*/
                margin-top: 10px; /*Margen superior*/
                text-align: left; /*Alinea el texto del cuerpo a justificado*/
                font-weight: 300; /*Grosor de la fuente a delgado*/
            }

            /* Estilos para los gráficos */
            .grafico-container {
                margin-left: 10%; /* Sangría izquierda */
                margin-right: 10%; /* Sangría derecha */
                padding-bottom: 50px; /* Espacio inferior */
            }

            canvas {
                width: 100% !important; /* Asegura que los gráficos se ajusten al contenedor */
                max-width: 500px; /* Tamaño máximo del gráfico */
                height: auto; /* Mantiene la proporción del gráfico */
            }
        </style>
    </head>
    <body>
        <h1><strong>Demografía RICIT</strong></h1>
        <hr class="red">
        <div class="col-md-12 col-sm-12">
            <p>En "Demografía RICIT" exploramos la distribución de nuestra comunidad a lo largo de México. Descubre en qué estados y municipios se concentran más investigadoras e investigadores en turismo, cuántos pertenecen al Sistema Nacional de Investigadoras e Investigadores (SNI), en qué nivel se encuentran y cómo se distribuyen por rangos de edad. ¡Un vistazo completo al mapa del talento en turismo!</p>
            <br><br><br>
        </div>

        <h1>Distribución por entidad y municipio de la Comunidad RICIT</h1>
        <hr class="red">
        <div class="contenedor-tarjetas">
            <p>¿En qué estados hay más investigadoras e investigadores en turismo? En esta sección te mostramos cómo se distribuye la comunidad RICIT a lo largo de México. Descubre qué entidades y municipios concentran la mayor actividad académica y científica en turismo y cómo se compara cada una en el mapa nacional.</p>
        </div>

        <h1>Rangos de edad</h1>
        <hr class="red">
        <div class="grafico-container">
            <p>Descubre la diversidad generacional de la comunidad RICIT. A través de gráficas dinámicas, conoce cómo se distribuyen sus integrantes por edades y visualiza la presencia de distintas generaciones en la investigación turística en México.</p>
            <canvas id="graficoRangoga"></canvas>
        </div>

        <h1>Comunidad SNI</h1>
        <hr class="red">
        <div class="grafico-container">
            <p>¿Cuántos integrantes de la RICIT han sido reconocidos en el Sistema Nacional de Investigadoras e Investigadores (SNI) y cuántos están en camino? En esta sección, a través de gráficas, podrás ver cuántos forman parte del SNI y cuántos han logrado la distinción de candidatos.</p>
            <canvas id="graficoSniResumen"></canvas>
        </div>

        <h1>Nivel de SNI</h1>
        <hr class="red">
        <div class="grafico-container">
            <p>En esta sección, descubrirás cómo se distribuyen los integrantes de la RICIT en los diferentes niveles del Sistema Nacional de Investigadoras e Investigadores (SNI). A través de gráficas, podrás ver la cantidad de miembros en cada nivel, desde Candidatos hasta los más altos, y cómo se organiza el talento en investigación turística.</p>
            <canvas id="graficoNiveles"></canvas>
        </div>
    </body>
    </html>
