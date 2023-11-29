<div class="row m-0 row-cols-1 row-cols-md-3">
    <div class="col border-end">
        <div id="chart16"></div>
    </div>
    <div class="col border-end">
        <div id="chart17"></div>
    </div>
    <div class="col">
        <div id="chart18"></div>
    </div>
</div>
<div id="chart19"></div>
<script>
    document.addEventListener('livewire:load', function () {
        e = {
            chart: {
                height: 180,
                type: "radialBar",
                toolbar: {
                    show: !1
                }
            },
            plotOptions: {
                radialBar: {
                    hollow: {
                        margin: 0,
                        size: "78%",
                        background: "transparent",
                        image: void 0,
                        imageOffsetX: 0,
                        imageOffsetY: 0,
                        position: "front",
                        dropShadow: {
                            enabled: !1,
                            top: 3,
                            left: 0,
                            blur: 4,
                            color: "rgba(0, 169, 255, 0.85)",
                            opacity: .65
                        }
                    },
                    track: {
                        background: "rgba(255, 255, 255, 0.12)",
                        margin: 0,
                        dropShadow: {
                            enabled: !1,
                            top: -3,
                            left: 0,
                            blur: 4,
                            color: "rgba(0, 169, 255, 0.85)",
                            opacity: .65
                        }
                    },
                    dataLabels: {
                        showOn: "always",
                        name: {
                            offsetY: -8,
                            show: !0,
                            color: "#fff",
                            fontSize: "15px"
                        },
                        value: {
                            formatter: function (e) {
                                return e + "%"
                            },
                            color: "#fff",
                            fontSize: "25px",
                            show: !0,
                            offsetY: 10
                        }
                    }
                }
            },
            fill: {
                type: "gradient",
                gradient: {
                    shade: "light",
                    type: "horizontal",
                    shadeIntensity: .5,
                    gradientToColors: ["#fff"],
                    inverseColors: !1,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100]
                }
            },
            colors: ["#fff"],
            series: [$percentOrderCancel],
            stroke: {
                lineCap: "round"
            },
            labels: ["Cancelled"]
        };
        new ApexCharts(document.querySelector("#chart16"), e).render();
        e = {
        chart: {
            height: 180,
            type: "radialBar",
            toolbar: {
                show: !1
            }
        },
        plotOptions: {
            radialBar: {
                hollow: {
                    margin: 0,
                    size: "78%",
                    background: "transparent",
                    image: void 0,
                    imageOffsetX: 0,
                    imageOffsetY: 0,
                    position: "front",
                    dropShadow: {
                        enabled: !1,
                        top: 3,
                        left: 0,
                        blur: 4,
                        color: "rgba(0, 169, 255, 0.85)",
                        opacity: .65
                    }
                },
                track: {
                    background: "rgba(255, 255, 255, 0.12)",
                    margin: 0,
                    dropShadow: {
                        enabled: !1,
                        top: -3,
                        left: 0,
                        blur: 4,
                        color: "rgba(0, 169, 255, 0.85)",
                        opacity: .65
                    }
                },
                dataLabels: {
                    showOn: "always",
                    name: {
                        offsetY: -8,
                        show: !0,
                        color: "#fff",
                        fontSize: "15px"
                    },
                    value: {
                        formatter: function(e) {
                            return e + "%"
                        },
                        color: "#fff",
                        fontSize: "25px",
                        show: !0,
                        offsetY: 10
                    }
                }
            }
        },
        fill: {
            type: "gradient",
            gradient: {
                shade: "light",
                type: "horizontal",
                shadeIntensity: .5,
                gradientToColors: ["#fff"],
                inverseColors: !1,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100]
            }
        },
        colors: ["#fff"],
        series: [60],
        stroke: {
            lineCap: "round"
        },
        labels: ["Đã giao"]
    };
    new ApexCharts(document.querySelector("#chart17"), e).render();
    });
     
     

</script>
