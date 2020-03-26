$(document).ready(function() {
    $.ajax({
        url: "dganacias.php",
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        method: "GET",
        success: function(data) {
            var Week = [];
            var GananciaPeso = [];
            var GananciaMusculo = [];
            var GananciaGrasa = [];
            
            console.log(data);


            for (var i in data) {
                Week.push(data[i].Week);
                GananciaPeso.push(data[i].GananciaPeso);
                GananciaMusculo.push(data[i].GananciaMusculo);
                GananciaGrasa.push(data[i].GananciaGrasa);
            }
            console.log(Week);
            var chartdata = {
                labels: Week,
                datasets: [{
                    label: "Musculo",
                    borderColor: "#8e5ea2",
                    backgroundColor: "#8e5ea2",
                    fill: false,
                    data: GananciaMusculo
                },{
                    label: "Grasa",
                    borderColor: "#c45850",
                    backgroundColor: "#c45850",
                    fill: false,
                    data: GananciaGrasa
                }]
            };

            var ctx = document.getElementById('Chart');
            
            var myChart = new Chart(ctx, {
                type: 'bar',
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
                              min: -2,
                              max: 2,
                              maxTicksLimit: 2
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
