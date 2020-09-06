window.onload = function () {
    var totalHepcoinMined = [];
    var totalHepcoinOrderd = [];

    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title: {
            text: "BIỂU ĐỒ HEPCOIN THEO NGÀY",
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
        legend: {
            cursor: "pointer",
            itemclick: toggleDataSeries
        },
        data: [{
            type: "column",
            name: "Tổng Hepcoin kiếm được",
            legendText: "Tổng Hepcoin kiếm được",
            showInLegend: true,
            dataPoints: totalHepcoinMined,
        },
        {
            type: "column",
            name: "Tổng Hepcoin đã sử dụng",
            legendText: "Tổng Hepcoin đã sử dụng",
            showInLegend: true,
            dataPoints: totalHepcoinOrderd
        }]
    });

    function toggleDataSeries(e) {
        if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        }
        else {
            e.dataSeries.visible = true;
        }

        chart.render();
    }

    $.getJSON("/admin/chart/hepcoin/day", function (data) {
        $.each(data['adding'], function (key, value) {
            totalHepcoinMined.push({ label: formatDate(value['label']), y: parseInt(value['point']) });
        });

        $.each(data['spending'], function (key, value) {
            totalHepcoinOrderd.push({ label: formatDate(value['label']), y: parseInt(value['point']) });
        });

        chart.render();
    });
    

    function chartMonthCustom(year) {

        var totalHepcoinMinedMonth = [];
        var totalHepcoinOrderdMonth = [];

        $.getJSON("/admin/chart/hepcoin/month?year=" + year + "", function (data) {

            $.each(data['adding'], function (key, value) {
                totalHepcoinMinedMonth.push({ label: 'T' + value['month'], y: parseInt(value['point']) });
            });

            $.each(data['spending'], function (key, value) {
                totalHepcoinOrderdMonth.push({ label: 'T' + value['month'], y: parseInt(value['point']) });
            });

            chartMonth.render();
        });

        var chartMonth = new CanvasJS.Chart("chartContainerMonth", {
            animationEnabled: true,
            title: {
                text: "BIỂU ĐỒ HEPCOIN THEO THÁNG NĂM " + year,
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
            legend: {
                cursor: "pointer",
                itemclick: toggleDataSeriesMonth
            },
            data: [{
                type: "column",
                name: "Tổng Hepcoin kiếm được",
                legendText: "Tổng Hepcoin kiếm được",
                showInLegend: true,
                dataPoints: totalHepcoinMinedMonth,
            },
            {
                type: "column",
                name: "Tổng Hepcoin đã sử dụng",
                legendText: "Tổng Hepcoin đã sử dụng",
                showInLegend: true,
                dataPoints: totalHepcoinOrderdMonth,
            }]
        });

        function toggleDataSeriesMonth(e) {
            console.log(e);
            if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            }
            else {
                e.dataSeries.visible = true;
            }

            chartMonth.render();
        }
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

var start = 2018;
var end = new Date().getFullYear();
var options = "";
for (var year = end; year >= start; year--) {
    options += "<option value=" + year + ">" + year + "</option>";
}

document.getElementById("year").innerHTML = options;