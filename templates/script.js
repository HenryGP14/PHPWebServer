$.ajax({
    type: "POST",
    contentType: "application/json; charset=utf-8",
    url: "<URL WEBSERVICE>",
    dataType: "json",
    data: "<PARÁMETROS>",
    success: function (data){
        alert(data);
        },
    error: function (data){
        alert(data);
        }
});