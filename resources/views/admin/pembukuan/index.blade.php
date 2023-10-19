@extends('layouts.admin.app')

@section('title', 'Chart')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="vh-100 d-flex justify-content-center align-items-center pb-5" style="width: 90%; height: 80%; margin: auto;">
        <canvas id="pemasukan-pengeluaran"></canvas>
    </div>
        <script>
            var data = {!! json_encode($data) !!};
            var labels = Object.keys(data);
            var pemasukanData = [];
            var pengeluaranData = [];

            for (var i = 0; i < labels.length; i++) {
                var label = labels[i];
                var pemasukan = data[label]['pemasukan'] || 0;
                var pengeluaran = data[label]['pengeluaran'] || 0;
                pemasukanData.push(pemasukan);
                pengeluaranData.push(pengeluaran);
            }
            var ctx = document.getElementById('pemasukan-pengeluaran').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Pemasukan',
                        data: pemasukanData,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Pengeluaran',
                        data: pengeluaranData,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        </script>
@include('admin.menu')
@endsection
