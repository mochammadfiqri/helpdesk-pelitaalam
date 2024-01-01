<div class="row mt-3">
    @push('scriptDashboard')
        {{-- openTicket --}}
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                // Contoh data jumlah
                var dataJumlah = [30, 50, 20];

                // Menghitung total
                var total = dataJumlah.reduce(function (acc, val) {
                    return acc + val;
                }, 0);

                // Menghitung persentase masing-masing nilai
                var dataPersentase = dataJumlah.map(function (value) {
                    return ((value / total) * 100).toFixed(2);
                });

                var ctx = document.getElementById('doughnut-chart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        datasets: [{
                            data: dataPersentase, // Menggunakan data persentase
                            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            datalabels: {
                                formatter: function (value, context) {
                                    return value + '%';
                                },
                                color: 'white',
                                labels: {
                                    title: {
                                        font: {
                                            weight: 'bold'
                                        }
                                    }
                                }
                            }
                        }
                    }
                });
            });
        </script>
        {{-- openTicket --}}
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                // Contoh data jumlah
                var dataJumlah = [30, 50, 20];

                // Menghitung total
                var total = dataJumlah.reduce(function (acc, val) {
                    return acc + val;
                }, 0);

                // Menghitung persentase masing-masing nilai
                var dataPersentase = dataJumlah.map(function (value) {
                    return ((value / total) * 100).toFixed(2);
                });

                var ctx = document.getElementById('chart-openTicket').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        datasets: [{
                            data: dataPersentase, // Menggunakan data persentase
                            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            datalabels: {
                                formatter: function (value, context) {
                                    return value + '%';
                                },
                                color: 'white',
                                labels: {
                                    title: {
                                        font: {
                                            weight: 'bold'
                                        }
                                    }
                                }
                            }
                        }
                    }
                });
            });
        </script>
        {{-- closedTicket --}}
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                // Contoh data jumlah
                var dataJumlah = [30, 50, 20];

                // Menghitung total
                var total = dataJumlah.reduce(function (acc, val) {
                    return acc + val;
                }, 0);

                // Menghitung persentase masing-masing nilai
                var dataPersentase = dataJumlah.map(function (value) {
                    return ((value / total) * 100).toFixed(2);
                });

                var ctx = document.getElementById('chart-closedTicket').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        datasets: [{
                            data: dataPersentase, // Menggunakan data persentase
                            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            datalabels: {
                                formatter: function (value, context) {
                                    return value + '%';
                                },
                                color: 'white',
                                labels: {
                                    title: {
                                        font: {
                                            weight: 'bold'
                                        }
                                    }
                                }
                            }
                        }
                    }
                });
            });
        </script>
        {{-- unassignedTicket --}}
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                // Contoh data jumlah
                var dataJumlah = [30, 50, 20];

                // Menghitung total
                var total = dataJumlah.reduce(function (acc, val) {
                    return acc + val;
                }, 0);

                // Menghitung persentase masing-masing nilai
                var dataPersentase = dataJumlah.map(function (value) {
                    return ((value / total) * 100).toFixed(2);
                });

                var ctx = document.getElementById('chart-unassignedTicket').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        datasets: [{
                            data: dataPersentase, // Menggunakan data persentase
                            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            datalabels: {
                                formatter: function (value, context) {
                                    return value + '%';
                                },
                                color: 'white',
                                labels: {
                                    title: {
                                        font: {
                                            weight: 'bold'
                                        }
                                    }
                                }
                            }
                        }
                    }
                });
            });
        </script>
        {{-- chartJS --}}
        <script src="../assets/js/plugins/chartjs.min.js"></script>
        <script>
            var ctx = document.getElementById("chart-bars").getContext("2d");  
                new Chart(ctx, {
                type: "bar",
                data: {
                    labels: ["M", "T", "W", "T", "F", "S", "S"],
                    datasets: [{
                    label: "Sales",
                    tension: 0.4,
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                    backgroundColor: "rgba(255, 255, 255, .8)",
                    data: [50, 20, 10, 22, 50, 10, 40],
                    maxBarThickness: 6
                    }, ],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                    legend: {
                        display: false,
                    }
                    },
                    interaction: {
                    intersect: false,
                    mode: 'index',
                    },
                    scales: {
                    y: {
                        grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                        suggestedMin: 0,
                        suggestedMax: 500,
                        beginAtZero: true,
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                        color: "#fff"
                        },
                    },
                    x: {
                        grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                        }
                    },
                    },
                },
                });
            
            
                var ctx2 = document.getElementById("chart-line").getContext("2d");
            
                new Chart(ctx2, {
                type: "line",
                data: {
                    labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                    label: "Mobile apps",
                    tension: 0,
                    borderWidth: 0,
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                    pointBorderColor: "transparent",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderWidth: 4,
                    backgroundColor: "transparent",
                    fill: true,
                    data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
                    maxBarThickness: 6
            
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                    legend: {
                        display: false,
                    }
                    },
                    interaction: {
                    intersect: false,
                    mode: 'index',
                    },
                    scales: {
                    y: {
                        grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                        }
                    },
                    x: {
                        grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                        },
                        ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                        }
                    },
                    },
                },
                });
            
                var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");
            
                new Chart(ctx3, {
                type: "line",
                data: {
                    labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                    label: "Mobile apps",
                    tension: 0,
                    borderWidth: 0,
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                    pointBorderColor: "transparent",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderWidth: 4,
                    backgroundColor: "transparent",
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6
            
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                    legend: {
                        display: false,
                    }
                    },
                    interaction: {
                    intersect: false,
                    mode: 'index',
                    },
                    scales: {
                    y: {
                        grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                        display: true,
                        padding: 10,
                        color: '#f8f9fa',
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                        }
                    },
                    x: {
                        grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                        },
                        ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                        }
                    },
                    },
                },
                });
        </script>
    @endpush
    <div class="col-xl-3 col-sm-6 mb-xl-0">
        <a href="/tickets">
            <div class="card" >
                <div class="row g-0">
                    <div class="col-md-6 p-3">
                        <div class="text-start pt-1">
                            {{-- <p class="text-sm mb-0 text-capitalize">New Ticket</p> --}}
                            <h5 class="text-sm mb-0 text-capitalize">New Ticket</h5>
                            <h3 class="mb-0 mt-4">{{ $newTicketCount }}</h3>
                        </div>
                    </div>
                    <div class="col-md-6 p-1">
                        <div class="chart">
                            <canvas id="doughnut-chart" class="chart-canvas" height="120px"></canvas>
                        </div> 
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0">
        <a href="/tickets">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-6 p-3">
                        <div class="text-start pt-1">
                            {{-- <p class="text-sm mb-0 text-capitalize">New Ticket</p> --}}
                            <h5 class="text-sm mb-0 text-capitalize">Open Ticket</h5>
                            <h3 class="mb-0 mt-4">{{ $openTicketCount }}</h3>
                        </div>
                    </div>
                    <div class="col-md-6 p-1">
                        <div class="chart">
                            <canvas id="chart-openTicket" class="chart-canvas" height="120px"></canvas>
                        </div> 
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0">
        <a href="/tickets">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-6 p-3 ">
                        <div class="text-start pt-1">
                            {{-- <p class="text-sm mb-0 text-capitalize">New Ticket</p> --}}
                            <h5 class="text-sm mb-0 text-capitalize">Closed Ticket</h5>
                            <h3 class="mb-0 mt-1 ">{{ $closedTicketCount }}</h3>
                        </div>
                    </div>
                    <div class="col-md-6 p-1">
                        <div class="chart">
                            <canvas id="chart-closedTicket" class="chart-canvas" height="120px"></canvas>
                        </div> 
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0">
        <a href="/tickets">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-6 p-3">
                        <div class="text-start pt-1">
                            <h5 class="text-sm mb-0 text-capitalize">Unaassigned Ticket</h5>
                            <h3 class="mb-0 mt-1">{{ $unassignedTicketCount }}</h3>
                        </div>
                    </div>
                    <div class="col-md-6 p-1">
                        <div class="chart">
                            <canvas id="chart-unassignedTicket" class="chart-canvas" height="120px"></canvas>
                        </div> 
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
{{-- <div class="row mt-4">
    <div class="col-lg-4 col-md-6 mt-4 mb-4">
        <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                    <div class="chart">
                        <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="mb-0 ">Website Views</h6>
                <p class="text-sm ">Last Campaign Performance</p>
                <hr class="dark horizontal">
                <div class="d-flex ">
                    <i class="material-icons text-sm my-auto me-1">schedule</i>
                    <p class="mb-0 text-sm"> campaign sent 2 days ago </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 mt-4 mb-4">
        <div class="card z-index-2  ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                    <div class="chart">
                        <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="mb-0 "> Daily Sales </h6>
                <p class="text-sm "> (<span class="font-weight-bolder">+15%</span>) increase in today sales.
                </p>
                <hr class="dark horizontal">
                <div class="d-flex ">
                    <i class="material-icons text-sm my-auto me-1">schedule</i>
                    <p class="mb-0 text-sm"> updated 4 min ago </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mt-4 mb-3">
        <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                    <div class="chart">
                        <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="mb-0 ">Completed Tasks</h6>
                <p class="text-sm ">Last Campaign Performance</p>
                <hr class="dark horizontal">
                <div class="d-flex ">
                    <i class="material-icons text-sm my-auto me-1">schedule</i>
                    <p class="mb-0 text-sm">just updated</p>
                </div>
            </div>
        </div>
    </div> 
</div> --}}
