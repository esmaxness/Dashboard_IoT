$(document).ready(function() {
    $.ajax({
        url: "dpeso.php",
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        method: "GET",
        success: function(data) {
            var fecha = [];
            var peso = [];
            var musculo = [];
            var grasa = [];
            
            console.log(data);

            for (var i in data) {
                fecha.push(data[i].Week);
                peso.push(data[i].Peso);
                musculo.push(data[i].Musculo);
                grasa.push(data[i].grasa);
            }
            console.log(musculo);
            var chartdata = {
                labels: fecha,
                datasets: [{
                    label: "Peso",
                    borderColor: "#3e95cd",
                    fill: false,
                    data: peso
                },{
                    label: "Musculo",
                    borderColor: "#8e5ea2",
                    fill: false,
                    data: musculo
                },{
                    label: "Grasa",
                    borderColor: "#c45850",
                    fill: false,
                    data: grasa
                }]
            };

            var ctx = document.getElementById('Chart');


            
            var myChart = new Chart(ctx, {
                type: 'line',
                data: chartdata,
                options: {
                        scales: {
                          xAxes: [{
                            time: {
                              unit: 'date'
                            },
                            gridLines: {
                              display: false
                            },
                            ticks: {
                              maxTicksLimit: 7
                            }
                          }],
                          yAxes: [{
                            ticks: {
                              min: 0,
                              max: 70,
                              maxTicksLimit: 5
                            },
                            gridLines: {
                              color: "rgba(0, 0, 0, .125)",
                            }
                          }],
                        },
                        legend: {
                          display: true
                        }
  }
            });

        },
        error: function(data) {
            console.log(data);
        }
    });
});