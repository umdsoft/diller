function getChartColorsArray(r) {
    r = $(r).attr("data-colors");
    return (r = JSON.parse(r)).map(function (r) {
        r = r.replace(" ", "");
        if (-1 == r.indexOf("--")) return r;
        r = getComputedStyle(document.documentElement).getPropertyValue(r);
        return r || void 0
    })
}

var barchartColors = getChartColorsArray("#mini-chart1"), options = {
    series: [60, 40],
    chart: {type: "donut", height: 110},
    colors: barchartColors,
    legend: {show: !1},
    dataLabels: {enabled: !1}
}, chart = new ApexCharts(document.querySelector("#mini-chart1"), options);
chart.render();
options = {
    series: [30, 55],
    chart: {type: "donut", height: 110},
    colors: barchartColors = getChartColorsArray("#mini-chart2"),
    legend: {show: !1},
    dataLabels: {enabled: !1}
};
(chart = new ApexCharts(document.querySelector("#mini-chart2"), options)).render();
options = {
    series: [65, 45],
    chart: {type: "donut", height: 110},
    colors: barchartColors = getChartColorsArray("#mini-chart3"),
    legend: {show: !1},
    dataLabels: {enabled: !1}
};
(chart = new ApexCharts(document.querySelector("#mini-chart3"), options)).render();
options = {
    series: [30, 70],
    chart: {type: "donut", height: 110},
    colors: barchartColors = getChartColorsArray("#mini-chart4"),
    legend: {show: !1},
    dataLabels: {enabled: !1}
};
(chart = new ApexCharts(document.querySelector("#mini-chart4"), options)).render();
options = {
    series: [{
        name: "Profit",
        data: [12.45, 16.2, 8.9, 11.42, 12.6, 18.1, 18.2, 14.16, 11.1, 8.09, 16.34, 12.88]
    }, {name: "Loss", data: [-11.45, -15.42, -7.9, -12.42, -12.6, -18.1, -18.2, -14.16, -11.1, -7.09, -15.34, -11.88]}],
    chart: {type: "bar", height: 400, stacked: !0, toolbar: {show: !1}},
    plotOptions: {bar: {columnWidth: "20%"}},
    colors: barchartColors = getChartColorsArray("#market-overview"),
    fill: {opacity: 1},
    dataLabels: {enabled: !1},
    legend: {show: !1},
    yaxis: {
        labels: {
            formatter: function (r) {
                return r.toFixed(0) + "%"
            }
        }
    },
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        labels: {rotate: -90}
    }
};
(chart = new ApexCharts(document.querySelector("#market-overview"), options)).render();
