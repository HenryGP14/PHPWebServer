
// Traer las provincias
//var labelsProv = ['Azuay','Bolivar','Cañar','Carchi','Chimborazo','Cotopaxi'];
var labelsProv = [];
//var dataProv = [712127, 183641, 225184, 164524, 458581, 409205];
var dataProv = []

$.ajax({
    type: "GET",
    contentType: "application/json; charset=utf-8",
    url: "http://localhost:8000/WebService",
    dataType: "json",
    success: function (data){
        //console.log(data);
        data.forEach(element => {
            labelsProv.push(element.nombre);
            dataProv.push(element.problacion_total);
        });
        dibujarChartProvincias();
    },
    error: function (data){
        alert("Ocurrió un error al intentar traer las provincias");
    }
});


// Traer los cantones
var selecProvincias = document.getElementById('todas-provincias');

//var labelsCant = ['Azuay','Bolivar','Cañar','Carchi','Chimborazo','Cotopaxi'];
var labelsCant = [];
//var dataCant = [712127, 183641, 225184, 164524, 458581, 409205];
var dataCant = [];

selecProvincias.addEventListener('change', (event) => {
    $.ajax({
        type: "GET",
        contentType: "application/json; charset=utf-8",
        url: "http://localhost:8000/WebService?nom-provincia=" + event.target.value,
        dataType: "json",
        success: function (data){
            var listaCatones = document.getElementById('lista-cantones');
            listaCatones.innerHTML = '';
            //console.log(data);
            data.forEach(element => {
                labelsCant.push(element.nombre);
                dataCant.push(element.poblacion_total);

                listaCatones.innerHTML += '<p class="canton margin-0">'+ element.nombre+'</p>'
            });
            dibujarchartCantones();
        },
        error: function (data){
            alert("Ocurrió un error al intentar traer los cantones");
        }
    });
});




// ******* CHART **********

function dibujarChartProvincias(){
    var contextoProv = document.getElementById('chart-provincias').getContext('2d');
    var chartProvincias = new Chart(contextoProv, {
        type: 'bar',
        data: {
            labels: labelsProv,
            datasets: [{
                label: 'Censo 2010',
                data: dataProv/*,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1*/
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}


function dibujarchartCantones(){
    var contextoCant = document.getElementById('chart-cantones').getContext('2d');
    contextoCant.clearRect(0, 0, contextoCant.canvas.offsetWidth, contextoCant.canvas.offsetHeight);
    chartCantones = new Chart(contextoCant, {
        type: 'line',
        data: {
            labels: labelsCant,
            datasets: [{
                label: 'Censo 2010',
                data: dataCant/*,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1*/
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}