$(function() {
    "use strict";
    var e = {
        series: [{
            name: "Revenue",
            data: [240, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555, 257]
        }],
        chart: {
            type: "line",
            height: 65,
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !1
            },
            dropShadow: {
                enabled: 0,
                top: 3,
                left: 14,
                blur: 4,
                opacity: .12,
                color: "#fff"
            },
            sparkline: {
                enabled: !0
            }
        },
        markers: {
            size: 0,
            colors: ["#fff"],
            strokeColors: "#fff",
            strokeWidth: 2,
            hover: {
                size: 7
            }
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            show: !0,
            width: 3,
            curve: "smooth"
        },
        colors: ["#fff"],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            theme: "dark",
            fixed: {
                enabled: !1
            },
            x: {
                show: !1
            },
            y: {
                title: {
                    formatter: function(e) {
                        return ""
                    }
                }
            },
            marker: {
                show: !1
            }
        }
    };
    new ApexCharts(document.querySelector("#chart1"), e).render();
    e = {
        series: [{
            name: "Customers",
            data: [240, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555, 257]
        }],
        chart: {
            type: "line",
            height: 65,
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !1
            },
            dropShadow: {
                enabled: 0,
                top: 3,
                left: 14,
                blur: 4,
                opacity: .12,
                color: "#fff"
            },
            sparkline: {
                enabled: !0
            }
        },
        markers: {
            size: 0,
            colors: ["#fff"],
            strokeColors: "#fff",
            strokeWidth: 2,
            hover: {
                size: 7
            }
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            show: !0,
            width: 3,
            curve: "smooth"
        },
        colors: ["#fff"],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            theme: "dark",
            fixed: {
                enabled: !1
            },
            x: {
                show: !1
            },
            y: {
                title: {
                    formatter: function(e) {
                        return ""
                    }
                }
            },
            marker: {
                show: !1
            }
        }
    };
    new ApexCharts(document.querySelector("#chart2"), e).render();
    e = {
        series: [{
            name: "Store Visitores",
            data: [240, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555, 257]
        }],
        chart: {
            type: "line",
            height: 65,
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !1
            },
            dropShadow: {
                enabled: 0,
                top: 3,
                left: 14,
                blur: 4,
                opacity: .12,
                color: "#fff"
            },
            sparkline: {
                enabled: !0
            }
        },
        markers: {
            size: 0,
            colors: ["#fff"],
            strokeColors: "#fff",
            strokeWidth: 2,
            hover: {
                size: 7
            }
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            show: !0,
            width: 3,
            curve: "smooth"
        },
        colors: ["#fff"],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            theme: "dark",
            fixed: {
                enabled: !1
            },
            x: {
                show: !1
            },
            y: {
                title: {
                    formatter: function(e) {
                        return ""
                    }
                }
            },
            marker: {
                show: !1
            }
        }
    };
    new ApexCharts(document.querySelector("#chart3"), e).render();

    e = {
        series: [{
            name: "Revenue",
            data: [240, 160, 671, 414, 555, 257, 901, 613]
        }],
        chart: {
            type: "area",
            height: 45,
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !1
            },
            dropShadow: {
                enabled: !1,
                top: 3,
                left: 14,
                blur: 4,
                opacity: .12,
                color: "#fff"
            },
            sparkline: {
                enabled: !0
            }
        },
        markers: {
            size: 0,
            colors: ["#fff"],
            strokeColors: "#fff",
            strokeWidth: 2,
            hover: {
                size: 7
            }
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            show: !0,
            width: 2,
            curve: "smooth"
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: "vertical",
                shadeIntensity: 0.5,
                gradientToColors: ["#fff"],
                inverseColors: true,
                opacityFrom: 0.2,
                opacityTo: 0.5,
                stops: [0, 50, 100],
                colorStops: []
            }
        },
        colors: ["#fff"],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
        },
        tooltip: {
            theme: "dark",
            fixed: {
                enabled: !1
            },
            x: {
                show: !1
            },
            y: {
                title: {
                    formatter: function(e) {
                        return ""
                    }
                }
            },
            marker: {
                show: !1
            }
        }
    };
    new ApexCharts(document.querySelector("#chart5"), e).render();
    e = {
        series: [{
            name: "Revenue",
            data: [240, 160, 671, 414, 555, 257, 901, 613]
        }],
        chart: {
            type: "area",
            height: 45,
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !1
            },
            dropShadow: {
                enabled: !1,
                top: 3,
                left: 14,
                blur: 4,
                opacity: .12,
                color: "#fff"
            },
            sparkline: {
                enabled: !0
            }
        },
        markers: {
            size: 0,
            colors: ["#fff"],
            strokeColors: "#fff",
            strokeWidth: 2,
            hover: {
                size: 7
            }
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            show: !0,
            width: 2,
            curve: "smooth"
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: "vertical",
                shadeIntensity: 0.5,
                gradientToColors: ["#fff"],
                inverseColors: true,
                opacityFrom: 0.2,
                opacityTo: 0.5,
                stops: [0, 50, 100],
                colorStops: []
            }
        },
        colors: ["#fff"],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
        },
        tooltip: {
            theme: "dark",
            fixed: {
                enabled: !1
            },
            x: {
                show: !1
            },
            y: {
                title: {
                    formatter: function(e) {
                        return ""
                    }
                }
            },
            marker: {
                show: !1
            }
        }
    };
    new ApexCharts(document.querySelector("#chart6"), e).render();
    e = {
        series: [{
            name: "Revenue",
            data: [240, 160, 671, 414, 555, 257, 901, 613]
        }],
        chart: {
            type: "area",
            height: 45,
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !1
            },
            dropShadow: {
                enabled: !1,
                top: 3,
                left: 14,
                blur: 4,
                opacity: .12,
                color: "#fff"
            },
            sparkline: {
                enabled: !0
            }
        },
        markers: {
            size: 0,
            colors: ["#fff"],
            strokeColors: "#fff",
            strokeWidth: 2,
            hover: {
                size: 7
            }
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            show: !0,
            width: 2,
            curve: "smooth"
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: "vertical",
                shadeIntensity: 0.5,
                gradientToColors: ["#fff"],
                inverseColors: true,
                opacityFrom: 0.2,
                opacityTo: 0.5,
                stops: [0, 50, 100],
                colorStops: []
            }
        },
        colors: ["#fff"],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
        },
        tooltip: {
            theme: "dark",
            fixed: {
                enabled: !1
            },
            x: {
                show: !1
            },
            y: {
                title: {
                    formatter: function(e) {
                        return ""
                    }
                }
            },
            marker: {
                show: !1
            }
        }
    };
    new ApexCharts(document.querySelector("#chart7"), e).render();
    e = {
        series: [{
            name: "Revenue",
            data: [240, 160, 671, 414, 555, 257, 901, 613]
        }],
        chart: {
            type: "area",
            height: 45,
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !1
            },
            dropShadow: {
                enabled: !1,
                top: 3,
                left: 14,
                blur: 4,
                opacity: .12,
                color: "#fff"
            },
            sparkline: {
                enabled: !0
            }
        },
        markers: {
            size: 0,
            colors: ["#fff"],
            strokeColors: "#fff",
            strokeWidth: 2,
            hover: {
                size: 7
            }
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            show: !0,
            width: 2,
            curve: "smooth"
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: "vertical",
                shadeIntensity: 0.5,
                gradientToColors: ["#fff"],
                inverseColors: true,
                opacityFrom: 0.2,
                opacityTo: 0.5,
                stops: [0, 50, 100],
                colorStops: []
            }
        },
        colors: ["#fff"],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
        },
        tooltip: {
            theme: "dark",
            fixed: {
                enabled: !1
            },
            x: {
                show: !1
            },
            y: {
                title: {
                    formatter: function(e) {
                        return ""
                    }
                }
            },
            marker: {
                show: !1
            }
        }
    };
    new ApexCharts(document.querySelector("#chart8"), e).render();
    e = {
        series: [{
            name: "Revenue",
            data: [240, 160, 671, 414, 555, 257, 901, 613]
        }],
        chart: {
            type: "area",
            height: 45,
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !1
            },
            dropShadow: {
                enabled: !1,
                top: 3,
                left: 14,
                blur: 4,
                opacity: .12,
                color: "#fff"
            },
            sparkline: {
                enabled: !0
            }
        },
        markers: {
            size: 0,
            colors: ["#fff"],
            strokeColors: "#fff",
            strokeWidth: 2,
            hover: {
                size: 7
            }
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            show: !0,
            width: 2,
            curve: "smooth"
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: "vertical",
                shadeIntensity: 0.5,
                gradientToColors: ["#fff"],
                inverseColors: true,
                opacityFrom: 0.2,
                opacityTo: 0.5,
                stops: [0, 50, 100],
                colorStops: []
            }
        },
        colors: ["#fff"],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
        },
        tooltip: {
            theme: "dark",
            fixed: {
                enabled: !1
            },
            x: {
                show: !1
            },
            y: {
                title: {
                    formatter: function(e) {
                        return ""
                    }
                }
            },
            marker: {
                show: !1
            }
        }
    };
    new ApexCharts(document.querySelector("#chart9"), e).render();
    e = {
        series: [{
            name: "Revenue",
            data: [240, 160, 671, 414, 555, 257, 901, 613]
        }],
        chart: {
            type: "area",
            height: 45,
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !1
            },
            dropShadow: {
                enabled: !1,
                top: 3,
                left: 14,
                blur: 4,
                opacity: .12,
                color: "#fff"
            },
            sparkline: {
                enabled: !0
            }
        },
        markers: {
            size: 0,
            colors: ["#fff"],
            strokeColors: "#fff",
            strokeWidth: 2,
            hover: {
                size: 7
            }
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            show: !0,
            width: 2,
            curve: "smooth"
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: "vertical",
                shadeIntensity: 0.5,
                gradientToColors: ["#fff"],
                inverseColors: true,
                opacityFrom: 0.2,
                opacityTo: 0.5,
                stops: [0, 50, 100],
                colorStops: []
            }
        },
        colors: ["#fff"],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
        },
        tooltip: {
            theme: "dark",
            fixed: {
                enabled: !1
            },
            x: {
                show: !1
            },
            y: {
                title: {
                    formatter: function(e) {
                        return ""
                    }
                }
            },
            marker: {
                show: !1
            }
        }
    };
    new ApexCharts(document.querySelector("#chart10"), e).render();
    e = {
        series: [{
            name: "Revenue",
            data: [240, 160, 671, 414, 555, 257, 901, 613]
        }],
        chart: {
            type: "area",
            height: 45,
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !1
            },
            dropShadow: {
                enabled: !1,
                top: 3,
                left: 14,
                blur: 4,
                opacity: .12,
                color: "#fff"
            },
            sparkline: {
                enabled: !0
            }
        },
        markers: {
            size: 0,
            colors: ["#fff"],
            strokeColors: "#fff",
            strokeWidth: 2,
            hover: {
                size: 7
            }
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            show: !0,
            width: 2,
            curve: "smooth"
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: "vertical",
                shadeIntensity: 0.5,
                gradientToColors: ["#fff"],
                inverseColors: true,
                opacityFrom: 0.2,
                opacityTo: 0.5,
                stops: [0, 50, 100],
                colorStops: []
            }
        },
        colors: ["#fff"],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
        },
        tooltip: {
            theme: "dark",
            fixed: {
                enabled: !1
            },
            x: {
                show: !1
            },
            y: {
                title: {
                    formatter: function(e) {
                        return ""
                    }
                }
            },
            marker: {
                show: !1
            }
        }
    };
    new ApexCharts(document.querySelector("#chart11"), e).render();
    e = {
        series: [{
            name: "Revenue",
            data: [332, 540, 160, 240, 160, 671, 355, 671, 414, 555, 257, 901, 613]
        }],
        chart: {
            type: "area",
            height: 100,
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !1
            },
            dropShadow: {
                enabled: !1,
                top: 3,
                left: 14,
                blur: 4,
                opacity: .12,
                color: "#fff"
            },
            sparkline: {
                enabled: !0
            }
        },
        markers: {
            size: 0,
            colors: ["#fff"],
            strokeColors: "#fff",
            strokeWidth: 2,
            hover: {
                size: 7
            }
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            show: !0,
            width: 2,
            curve: "smooth"
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: "vertical",
                shadeIntensity: 0.5,
                gradientToColors: ["#fff"],
                inverseColors: true,
                opacityFrom: 0.2,
                opacityTo: 0.5,
                stops: [0, 50, 100],
                colorStops: []
            }
        },
        colors: ["#fff"],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
        },
        tooltip: {
            theme: "dark",
            fixed: {
                enabled: !1
            },
            x: {
                show: !1
            },
            y: {
                title: {
                    formatter: function(e) {
                        return ""
                    }
                }
            },
            marker: {
                show: !1
            }
        }
    };
    new ApexCharts(document.querySelector("#chart12"), e).render();
    e = {
        series: [{
            name: "Pageviews",
            data: [332, 540, 160, 240, 160, 671, 355, 671, 414, 555, 257, 901, 613]
        }],
        chart: {
            type: "area",
            height: 100,
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !1
            },
            dropShadow: {
                enabled: !1,
                top: 3,
                left: 14,
                blur: 4,
                opacity: .12,
                color: "#fff"
            },
            sparkline: {
                enabled: !0
            }
        },
        markers: {
            size: 0,
            colors: ["#fff"],
            strokeColors: "#fff",
            strokeWidth: 2,
            hover: {
                size: 7
            }
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            show: !0,
            width: 2,
            curve: "smooth"
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: "vertical",
                shadeIntensity: 0.5,
                gradientToColors: ["#fff"],
                inverseColors: true,
                opacityFrom: 0.2,
                opacityTo: 0.5,
                stops: [0, 50, 100],
                colorStops: []
            }
        },
        colors: ["#fff"],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
        },
        tooltip: {
            theme: "dark",
            fixed: {
                enabled: !1
            },
            x: {
                show: !1
            },
            y: {
                title: {
                    formatter: function(e) {
                        return ""
                    }
                }
            },
            marker: {
                show: !1
            }
        }
    };
    new ApexCharts(document.querySelector("#chart13"), e).render();
    e = {
        series: [{
            name: "New Sessions",
            data: [332, 540, 160, 240, 160, 671, 355, 671, 414, 555, 257, 901, 613]
        }],
        chart: {
            type: "area",
            height: 100,
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !1
            },
            dropShadow: {
                enabled: !1,
                top: 3,
                left: 14,
                blur: 4,
                opacity: .12,
                color: "#fff"
            },
            sparkline: {
                enabled: !0
            }
        },
        markers: {
            size: 0,
            colors: ["#fff"],
            strokeColors: "#fff",
            strokeWidth: 2,
            hover: {
                size: 7
            }
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            show: !0,
            width: 2,
            curve: "smooth"
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: "vertical",
                shadeIntensity: 0.5,
                gradientToColors: ["#fff"],
                inverseColors: true,
                opacityFrom: 0.2,
                opacityTo: 0.5,
                stops: [0, 50, 100],
                colorStops: []
            }
        },
        colors: ["#fff"],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
        },
        tooltip: {
            theme: "dark",
            fixed: {
                enabled: !1
            },
            x: {
                show: !1
            },
            y: {
                title: {
                    formatter: function(e) {
                        return ""
                    }
                }
            },
            marker: {
                show: !1
            }
        }
    };
    new ApexCharts(document.querySelector("#chart14"), e).render();





    e = {
        series: [87],
        chart: {
            height: 310,
            type: "radialBar",
            offsetY: -10
        },
        plotOptions: {
            radialBar: {
                startAngle: -135,
                endAngle: 135,
                hollow: {
                    margin: 0,
                    size: "70%",
                    background: "transparent"
                },
                track: {
                    background: "rgba(255, 255, 255, 0.25)",
                    strokeWidth: "100%",
                    dropShadow: {
                        enabled: !1,
                        top: -3,
                        left: 0,
                        blur: 4,
                        opacity: .12
                    }
                },
                dataLabels: {
                    name: {
                        fontSize: "16px",
                        color: "#fff",
                        offsetY: 5
                    },
                    value: {
                        offsetY: 20,
                        fontSize: "30px",
                        color: "#fff",
                        formatter: function(e) {
                            return e + "%"
                        }
                    }
                }
            }
        },
        fill: {
            type: "gradient",
            gradient: {
                shade: "dark",
                shadeIntensity: .15,
                inverseColors: !1,
                gradientToColors: ["#fff"],
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 50, 65, 91]
            }
        },
        colors: ["#fff"],
        stroke: {
            dashArray: 4
        },
        labels: ["Total Sales"],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    height: 300
                }
            }
        }]
    };
    new ApexCharts(document.querySelector("#chart20"), e).render();
    e = {
        series: [{
            name: "Visitors",
            data: [427, 613, 801, 457, 605, 414, 671, 360, 540]
        }],
        chart: {
            foreColor: "rgba(255, 255, 255, 0.50)",
            type: "bar",
            height: 390,
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !1
            },
            dropShadow: {
                enabled: !1,
                top: 3,
                left: 10,
                blur: 3,
                opacity: .1,
                color: "#0d6efd"
            },
            sparkline: {
                enabled: !1
            }
        },
        plotOptions: {
            radialBar: {
                hollow: {
                    size: "70%"
                }
            },
            bar: {
                horizontal: !1,
                columnWidth: "35%",
                endingShape: "rounded"
            }
        },
        markers: {
            size: 0,
            colors: ["#fff"],
            strokeColors: "#fff",
            strokeWidth: 2,
            hover: {
                size: 7
            }
        },
        dataLabels: {
            enabled: !1
        },
        grid: {
            borderColor: 'rgba(255, 255, 255, 0.12)',
            show: true,
        },
        stroke: {
            show: !0,
            width: 3,
            curve: "smooth"
        },
        colors: ["#fff"],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep"]
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            theme: "dark",
            y: {
                formatter: function(e) {
                    return "$ " + e + " thousands"
                }
            }
        }
    };
    new ApexCharts(document.querySelector("#chart21"), e).render()
});
var app = angular.module("app", ["ngRoute"]);
app.config(function($routeProvider) {
    $routeProvider.when("/", {
        templateUrl: "index.html"
    }).when("/vertical/ecommerce-products-category", {
        templateUrl: "ecommerce-products-category.html",
        controller: "ProductController"
    }).otherwise({
        redirectTo: "/"
    })
    app.controller("ProductController", function($scope, $http) {
        var URL = "http://127.0.0.1:8000/api/product"
        $http.get(URL).then(function(res) {
            console.log(res.data);
            $scope.data = res.data;
        }, function(res) {
            console.log(res)
        })
    })
});