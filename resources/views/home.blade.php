@extends('layouts.app')

@section('content')
<style>
  
    .card {
        height: 100%; 
    }

    canvas {
        max-height: 300px; 
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
{{-- Todo : Future Work --}}
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title" id="total_tanaman">< &nbsp;Angka&nbsp;> <i class="fa-brands fa-pagelines"></i></h5>
                    <p class="card-text">Total Data Tanaman Saat Ini: </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">< &nbsp;Angka&nbsp;> <i class="fa-brands fa-pagelines"></i></h5>
                    <p class="card-text">Total Data Pengeringan: <strong>75</strong></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">< &nbsp;Angka&nbsp;> <i class="fa-brands fa-pagelines"></i></h5>
                    <p class="card-text">Total Data Penyimpanan: <strong>50</strong></p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mt-2">
        <!-- First Row of Charts -->
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Chart 1: Data Tanaman</h5>
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Chart 2: Data Penyimpanan</h5>
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('DOMContentLoaded', function() {
        var total_tanaman = document.getElementById('total_tanaman')
        fetch('http://xylarium.test/api/total-tanaman')
  .then(response => {
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    return response.json();
  })
  .then(data => {
   
    console.log('Total Tanaman Count:', data.count);
    total_tanaman.innerHTML = '<strong>'+ data.count+'</strong>' + '  <i class="fa-brands fa-pagelines"></i>'
  })
  .catch(error => {
    console.error('There was a problem with the fetch operation:', error);
  });


        // Dummy data for the charts
        const barCtx = document.getElementById('barChart').getContext('2d');
        const pieCtx = document.getElementById('pieChart').getContext('2d');

        // Bar Chart
        const barChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: ['Tanaman A', 'Tanaman B', 'Tanaman C', 'Tanaman D', 'Tanaman E'],
                datasets: [{
                    label: 'Jumlah Tanaman',
                    data: [20, 30, 15, 25, 10], // Dummy data
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Pie Chart
        const pieChart = new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: ['Simpan', 'Habis', 'Rusak'],
                datasets: [{
                    label: 'Status Penyimpanan',
                    data: [15, 25, 10], // Dummy data
                    backgroundColor: ['rgba(255, 99, 132, 0.6)', 'rgba(54, 162, 235, 0.6)', 'rgba(255, 206, 86, 0.6)'],
                    borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                }
            }
        });
    });
</script>
@endsection
