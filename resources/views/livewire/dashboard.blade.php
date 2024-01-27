<div class="row mt-3">
    @push('scriptDashboard')
        {{-- Status Ticket --}}
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var ctx = document.getElementById('ticket-chart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: [
                            'Open Ticket',
                            'In Progress Ticket',
                            'Closed Ticket',
                            'Reject Ticket'
                        ],
                        datasets: [{
                            data: [
                                {{ $openTicketCount }},
                                {{ $inProgressTicketCount }},
                                {{ $closedTicketCount }},
                                {{ $rejectORcanceledTicketCount }},
                            ],
                            backgroundColor: [
                                '#FF6384', 
                                '#36A2EB', 
                                '#FFCE56', 
                                '#4CAF50'], // Sesuaikan warna
                        }],
                        hoverOffset: 4
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
                            },
                            legend: {
                                position: 'left', // Atur posisi legend di sebelah kiri
                                align: 'center', // Posisi teks legend
                                
                            }
                        },
                    }
                });
            });
        </script>

        {{-- Priority Ticket --}}
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var ctx = document.getElementById('priority-chart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: [
                            'Low',
                            'Normal',
                            'High',
                            'Critical'
                        ],
                        datasets: [{
                            data: [
                                {{ $lowCount }},
                                {{ $normalCount }},
                                {{ $highCount }},
                                {{ $criticalCount }},
                            ],
                            backgroundColor: [
                                '#00ff00', 
                                '#d3d3d3', 
                                '#cd5c5c', 
                                '#dc143c'
                            ], // Sesuaikan warna
                        }],
                        hoverOffset: 4
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
                            },
                            legend: {
                                position: 'left', // Atur posisi legend di sebelah kiri
                                align: 'center', // Posisi teks legend
                                
                            }
                        }
                    }
                });
            });
        </script>

        {{-- Dataset --}}
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var ctx = document.getElementById('chart-line').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: "line",
                    data: {
                        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                        datasets: [{
                            label: "Datasets",
                            tension: 0,
                            borderWidth: 0,
                            pointRadius: 5,
                            pointBackgroundColor: "rgba(255, 255, 255, .8)",
                            pointBorderColor: "transparent",
                            borderColor: "rgba(255, 255, 255, .8)",
                            borderWidth: 4,
                            backgroundColor: "transparent",
                            fill: true,
                            data: {{ $datasets }},
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
            });
        </script>

        {{-- chartJS --}}
        <script src="../assets/js/plugins/chartjs.min.js"></script>
        
    @endpush
    <div class="col-xl-6 col-sm-6 mb-xl-0">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <div class="row">
                <h6 class="text-white text-uppercase ps-4 float-start">
                    Tickets Statuses
                </h6>
            </div>
        </div>
        <div class=" mt-3">
            <a href="/tickets">
                <div class="card" >
                    <div class="row g-0 p-2">
                        <div class="chart">
                            <canvas id="ticket-chart" class="chart-canvas" height="250px"></canvas>
                        </div> 
                        {{-- <hr class="dark horizontal mt-3">
                        <div class="d-flex ms-3 my-2">
                            <i class="material-icons text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm"> updated 4 min ago </p>
                        </div> --}}
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xl-6 col-sm-6 mb-xl-0">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <div class="row">
                <h6 class="text-white text-uppercase ps-4 float-start">
                    Tickets Priorities
                </h6>
            </div>
        </div>
        <div class=" mt-3">
            <a href="/tickets">
                <div class="card">
                    <div class="row g-0 p-2">
                        <div class="chart">
                            <canvas id="priority-chart" class="chart-canvas" height="250px"></canvas>
                        </div>
                        {{-- <hr class="dark horizontal mt-3">
                        <div class="d-flex ms-3 my-2">
                            <i class="material-icons text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm"> updated 4 min ago </p>
                        </div> --}}
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-12 mt-5">
        <div class="card z-index-2 mb-3">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                    <div class="chart">
                        <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="mb-0 "> Dataset Ticket</h6>
                <p class="text-sm ">Total Dataset saat ini (<span class="font-weight-bolder">{{ $totalDataset }}</span>) </p>
                <hr class="dark horizontal">
                <div class="d-flex ">
                    <i class="material-icons text-sm my-auto me-1">schedule</i>
                    <p class="mb-0 text-sm"> {{ optional($latestDataset)->updated_at->diffForHumans() ?? 'Never updated' }} </p>
                </div>
            </div>
        </div>
    </div>
</div>