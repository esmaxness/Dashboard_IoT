$(document).ready(function() {
    $.ajax({
        url: "mensual_diff.php",
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        method: "GET",
        success: function(data_men) {
            var Month = [];
            var GananciaPeso = [];
            var GananciaMusculo = [];
            var GananciaGrasa = [];
            
            console.log(data_men);


            for (var i in data_men) {
                
                Month.push(data_men[i].Month);
                GananciaPeso.pushdata_men[i].GananciaPeso);
                GananciaMusculo.push(data_men[i].GananciaMusculo);
                GananciaGrasa.push(data_men[i].GananciaGrasa);
            }
            console.log(Month);
            var chartdata = {
                labels: Month,
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

            var ctx = document.getElementById('Chart_bar_men');
            
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
