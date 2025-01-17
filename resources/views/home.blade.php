@extends('layouts.app')
@section('heading','Dashboard Coming Soon')
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
<section class="row">

</section>



<script>
    window.addEventListener('DOMContentLoaded', function() {
        var total_tanaman = document.getElementById('total_tanaman')
        fetch('{{ route('total.tanaman',[], true) }}')
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
        fetch('/api/famili')
            .then(response => response.json())
            .then(data => {
                // Extract labels and data
                const labels = data.map(item => item.famili);
                const counts = data.map(item => item.count_per_famili);

                // Create the chart
                new Chart(barCtx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Famili',
                            data: counts,
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
            })
            .catch(error => console.error('Error fetching chart data:', error));

        // Pie Chart
        fetch('/api/getCountPenerimaanDanKoleksi')
    .then(response => response.json())
    .then(data => {
        console.log(data    )
        const pieChart = new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: ['Layak', 'Tidak Layak', 'belum di cek'], // Labels based on the response
                datasets: [{
                    label: 'Status Penerimaan',
                    data: [data[0].layak, data[0].tidak_layak, data[0].belum_cek], // Use dynamic data from API response
                    backgroundColor: ['rgba(255, 99, 132, 0.6)', 'rgba(54, 162, 235, 0.6)','rgba(165, 163, 164, 0.23)'], // Colors for the pie slices
                    borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)','rgba(165, 163, 164, 0.47)'], // Border colors for the slices
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
    })
    .catch(error => {
        console.error('Error fetching data:', error);
    });

    });
</script>
@endsection
