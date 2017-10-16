$(function() {
    $.ajax({

        url: 'http://localhost/chart_data.php',
        type: 'GET',
        charset: 'utf-8',
        success: function(data) {
            chartData = data;
            var chartProperties = {
                "caption": "Son rüzgar değerleriniz",
                "xAxisName": "Tarih/Saat",
                "yAxisName": "Değer",
                "rotatevalues": "1",
                "theme": "zune"
            };

            apiChart = new FusionCharts({
                style: 'align:bottom',
                type: 'column2d',
                renderAt: 'chart-container',
                width: '550',
                height: '350',
                dataFormat: 'json',
                dataSource: {
                    "chart": chartProperties,
                    "data": chartData
                }
            });
            apiChart.render();
        }
    });
});