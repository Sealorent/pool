// Bar Chart LAPORAN KAS TIAP UNIT
var ctx = document.getElementById("Chart_kasUnit").getContext("2d");
var myChart = new Chart(ctx, {
    type: "bar",
    data: {
        labels: ["KB/TK", "SD/MI", "SMP/MTs", "SMA/MA"],
        datasets: [
            {
                label: "kurang 3 bulan",
                data: [647000, 5059000, 2400000, 919000],
                backgroundColor: "rgb(58,180,112)",
                borderWidth: 1,
            },
            {
                label: "lebih 3 bulan",
                data: [675000, 5059000, 2400000, 1343000],
                backgroundColor: "rgb(118,97,240)",
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

var ctx = document.getElementById("Chart_jumlahSiswa").getContext("2d");
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

var xValues = [
    "Total Guru dan Pegawai",
    "Total Guru Tetap",
    "Total Guru tidak tetap",
];
var yValues = [55, 49, 44];
var barColors = ["#ffb703", "#00aba9", "#2b5797"];

var myChart = new Chart(
    document.getElementById("Chart_statusGuru").getContext("2d"),
    {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [
                {
                    backgroundColor: barColors,
                    data: yValues,
                },
            ],
        },
        options: {
            title: {
                display: true,
                text: "World Wide Wine Production 2018",
            },
        },
    }
);
