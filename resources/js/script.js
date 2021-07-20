
// Traer las provincias
var labelsProv = ['Azuay','Bolivar','Cañar','Carchi','Chimborazo','Cotopaxi'];
var dataProv = [712127, 183641, 225184, 164524, 458581, 409205];

$.ajax({
    type: "GET",
    contentType: "application/json; charset=utf-8",
    url: "http://localhost:8000/WebService?consulta=provincias",
    dataType: "json",
    data: "<PARÁMETROS>",
    success: function (data){
        // alert(data);
    },
    error: function (data){
        // alert(data);
    }
});


// Traer los cantones
var selecProvincias = document.getElementById('todas-provincias');

var labelsCant = ['Azuay','Bolivar','Cañar','Carchi','Chimborazo','Cotopaxi'];
var dataCant = [712127, 183641, 225184, 164524, 458581, 409205];

selecProvincias.addEventListener('change', (event) => {
    $.ajax({
        type: "GET",
        contentType: "application/json; charset=utf-8",
        url: "<URL WEBSERVICE>",
        dataType: "json",
        data: event.target.value,
        success: function (data){
            // alert(data);
        },
        error: function (data){
            // alert(data);
        }
    });
});




// ******* CHART **********

var contextoProv = document.getElementById('chart-provincias').getContext('2d');
var chartProvincias = new Chart(contextoProv, {
    type: 'bar',
    data: {
        labels: labelsProv,
        datasets: [{
            label: 'Censo 2010',
            data: dataProv,
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
            borderWidth: 1
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

var contextoCant = document.getElementById('chart-cantones').getContext('2d');
var chartCantones = new Chart(contextoCant, {
    type: 'line',
    data: {
        labels: labelsCant,
        datasets: [{
            label: 'Censo 2010',
            data: dataCant,
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
            borderWidth: 1
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