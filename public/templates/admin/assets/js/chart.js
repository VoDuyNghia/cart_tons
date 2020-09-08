window.onload = function () {
    var totalHepcoinMined = [];
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title: {
            text: "BIỂU ĐỒ DOANH THU THEO NGÀY",
            fontFamily: 'Times New Roman'
        },
        axisY: {
            titleFontColor: "#000000",
            lineColor: "#000000",
            labelFontColor: "#000000",
            tickColor: "#000000",
            fontFamily: 'Times New Roman'
        },
        toolTip: {
            shared: true
        },
        data: [{
            type: "column",
            name: "Doanh thu kiếm được",
            legendText: "Doanh thu kiếm được",
            showInLegend: false,
            dataPoints: totalHepcoinMined,
        }]
    });

    $.getJSON("/admin/orders/day", function (data) {
        $.each(data['adding'], function (key, value) {
            console.log(value);
            totalHepcoinMined.push({ label: formatDate(value['label']), y: parseInt(value['point']) });
        });

        chart.render();
    });
    

    function chartMonthCustom(year) {
        var totalHepcoinMinedMonth = [];
        $.getJSON("/admin/orders/month?year=" + year + "", function (data) {

            $.each(data['adding'], function (key, value) {
                totalHepcoinMinedMonth.push({ label: 'T' + value['month'], y: parseInt(value['point']) });
            });

            chartMonth.render();
        });

        var chartMonth = new CanvasJS.Chart("chartContainerMonth", {
            animationEnabled: true,
            title: {
                text: `BIỂU ĐỒ DOANH THU THEO THÁNG (NĂM  ${year})`,
                fontFamily: 'Times New Roman'
            },
            axisY: {
                titleFontColor: "#000000",
                lineColor: "#000000",
                labelFontColor: "#000000",
                tickColor: "#000000",
                fontFamily: 'Times New Roman'
            },
            toolTip: {
                shared: true
            },
            data: [{
                type: "column",
                name: "Doanh thu kiếm được",
                legendText: "Doanh thu kiếm được",
                showInLegend: false,
                dataPoints: totalHepcoinMinedMonth,
            }]
        });
    }

    $('#year').change(function () {
        chartMonthCustom($(this).find(":selected").val());
    });

    chartMonthCustom(new Date().getFullYear());
}

function formatDate(date) {
    date = new Date(date);
    year = date.getFullYear();
    month = date.getMonth() + 1;
    dt = date.getDate();

    if (dt < 10) {
        dt = '0' + dt;
    }
    if (month < 10) {
        month = '0' + month;
    }

    return dt + '/' + month;
}

var start = 2020;
var end = new Date().getFullYear();
var options = "";
for (var year = end; year >= start; year--) {
    options += "<option value=" + year + ">" + year + "</option>";
}

document.getElementById("year").innerHTML = options;