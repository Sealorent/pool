// Tagihan Tiap Unit
var ctx = document.getElementById("tagihanTiapUnit").getContext("2d");
var myChart = new Chart(ctx, {
    type: "bar",
    data: {
        labels: ["KB/TK", "SD/MI", "SMP/MTs", "SMA/MA"],
        datasets: [
            {
                label: "kurang 3 bulan",
                data: [647000, 5059000, 2400000, 919000],
                backgroundColor: "rgba(123, 103, 238)",
                borderWidth: 1,
            },
            {
                label: "lebih 3 bulan",
                data: [675000, 5059000, 2400000, 1343000],
                backgroundColor: "rgba(60, 179, 113)",
                borderWidth: 1,
            },
        ],
    },
    options: {
        responsive: true,
        plugins: {
            labels: {
                render: "value",
            },
        },
        tooltips: {
            callbacks: {
                label: function (tooltipItem, data) {
                    return tooltipItem.yLabel
                        .toFixed(2)
                        .replace(/\d(?=(\d{3})+\.)/g, "$&,");
                },
            },
        },
        scales: {
            yAxes: [
                {
                    ticks: {
                        beginAtZero: true,
                        callback: function (value, index, values) {
                            return number_format(value);
                        },
                    },
                },
            ],
        },
    },
});

// Laporan Akunting
var ctx = document.getElementById("laporanAkunting").getContext("2d");
var data = {
    labels: [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
    ],
    datasets: [
        {
            label: "Neraca",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "#29B0D0",
            borderColor: "#29B0D0",
            pointHoverBackgroundColor: "#29B0D0",
            pointHoverBorderColor: "#29B0D0",
            data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
        },
        {
            label: "Rugi Laba",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "#F07124",
            borderColor: "#F07124",
            pointHoverBackgroundColor: "#F07124",
            pointHoverBorderColor: "#F07124",
            data: [5, 4, 8, 7, 7, 5, 4, 8, 9, 10, 10, 9],
        },
        {
            label: "Modal",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "#979193",
            borderColor: "#979193",
            pointHoverBackgroundColor: "#979193",
            pointHoverBorderColor: "#979193",
            data: [3, 6, 5, 4, 4, 5, 7, 6, 8, 8, 9, 9],
        },
    ],
};

var myBarChart = new Chart(ctx, {
    type: "line",
    data: data,
    options: {
        legend: {
            display: true,
        },
        barValueSpacing: 20,
        scales: {
            yAxes: [
                {
                    ticks: {
                        min: 0,
                    },
                },
            ],
            xAxes: [
                {
                    gridLines: {
                        color: "rgba(0, 0, 0, 0)",
                    },
                },
            ],
        },
        plugins: {
            labels: {
                render: "value",
            },
        },
    },
});

var ctx = document.getElementById("jumlahGuruPegawai").getContext("2d");
var piechart = new Chart(ctx, {
    type: "pie",
    data: {
        labels: [
            "Total Guru dan Pegawai",
            "Total Guru Tetap",
            "Total Guru Tidak Tetap",
        ],
        datasets: [
            {
                label: "",
                data: [479, 58, 421],
                backgroundColor: [
                    "rgb(255, 99, 132)",
                    "rgb(54, 162, 235)",
                    "rgb(255, 205, 86)",
                ],
                hoverOffset: 1,
            },
        ],
    },
    options: {
        plugins: {
            labels: {
                fontSize: 20,
                fontColor: "black",
                render: "value",
            },
        },
    },
});

// jurnal Keuangan
var ctx = document.getElementById("jurnalKeuangan").getContext("2d");
var myChart = new Chart(ctx, {
    type: "bar",
    data: {
        labels: ["Penerimaan", "Pengeluaran", "Saldo"],
        datasets: [
            {
                label: "bulan ini",
                data: [48419000, 20074646, 48219000],
                backgroundColor: "rgba(123, 103, 238)",
                borderWidth: 1,
            },
            {
                label: "thn ajaran ini",
                data: [94568000, 30000000, 94368000],
                backgroundColor: "rgba(60, 179, 113)",
                borderWidth: 1,
            },
        ],
    },
    options: {
        responsive: true,
        plugins: {
            labels: {
                render: "value",
            },
        },
        tooltips: {
            callbacks: {
                label: function (tooltipItem, data) {
                    return tooltipItem.yLabel
                        .toFixed(2)
                        .replace(/\d(?=(\d{3})+\.)/g, "$&,");
                },
            },
        },
        scales: {
            yAxes: [
                {
                    ticks: {
                        beginAtZero: true,
                        callback: function (value, index, values) {
                            return number_format(value);
                        },
                    },
                },
            ],
        },
    },
});

// Bar Chart LAPORAN KAS TIAP UNIT
var ctx = document.getElementById("kasTiapUnit").getContext("2d");
var myChart = new Chart(ctx, {
    type: "bar",
    data: {
        labels: ["KB/TK", "SD/MI", "SMP/MTs", "SMA/MA"],
        datasets: [
            {
                label: "kurang 3 bulan",
                data: [647000, 5059000, 2400000, 919000],
                backgroundColor: "rgba(123, 103, 238)",
                borderWidth: 1,
            },
            {
                label: "lebih 3 bulan",
                data: [675000, 5059000, 2400000, 1343000],
                backgroundColor: "rgba(60, 179, 113)",
                borderWidth: 1,
            },
        ],
    },
    options: {
        responsive: true,
        plugins: {
            labels: {
                render: "value",
            },
        },
        tooltips: {
            callbacks: {
                label: function (tooltipItem, data) {
                    return tooltipItem.yLabel
                        .toFixed(2)
                        .replace(/\d(?=(\d{3})+\.)/g, "$&,");
                },
            },
        },
        scales: {
            yAxes: [
                {
                    ticks: {
                        beginAtZero: true,
                        callback: function (value, index, values) {
                            return number_format(value);
                        },
                    },
                },
            ],
        },
    },
});

// Bar Chart JUMLAH SISWA TIAP JENJANG
var ctx = document.getElementById("siswaTiapJenjang").getContext("2d");
var myChart = new Chart(ctx, {
    type: "bar",
    data: {
        labels: ["KB/TK", "SD/MI", "SMP/MTs", "SMA/MA"],
        datasets: [
            {
                label: "siswa thn ajaran ini",
                data: [323, 5059, 2400, 919],
                backgroundColor: "rgba(123, 103, 238)",
                borderWidth: 1,
            },
            {
                label: "siswa seluruhnya",
                data: [534, 5059, 2400, 1343],
                backgroundColor: "rgba(60, 179, 113)",
                borderWidth: 1,
            },
        ],
    },
    options: {
        responsive: true,
        plugins: {
            labels: {
                render: "value",
            },
        },
    },
});
