@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-center pt-3">Statistics per Place: {{$place->title}}</h3>

    <form action="{{ route('host.chart.index', $place) }}">
        <div class="d-flex justify-content-end">
            <select name="year" id="choose-year">
                @foreach ($years as $year)
                <option {{ $year == $selected_year ? 'selected' : ''}} value="{{ $year }}">{{ $year }}</option>
                @endforeach
            </select>
        </div>
    </form>

    <div class="row">

        {{-- Grafic Visualisations --}}
        <div class="grafico col-12 mt-5" style="width:80%; height:80%">
            <canvas id="myChartViews"></canvas>
        </div>

        {{-- Grafic Messagges --}}
        <div class="grafico col-12 mt-5 mb-5" style="width:80%; height:80%">
            <canvas id="myChartMessages"></canvas>
        </div>
    </div>
</div>

{{-- Script Grafic Visualisations --}}
<script>
    var ctx = document.getElementById('myChartViews');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan.', 'Feb.', 'Mar.', 'Apr.', 'May', 'June', 'July', 'Aug.', 'Sept.', 'Oct.', 'Nov.', 'Dec.'],
            datasets: [{
                label: 'Visualisations',
                data: [
                    {{ $monthlyViews[1] }}, 
                    {{ $monthlyViews[2] }}, 
                    {{ $monthlyViews[3] }}, 
                    {{ $monthlyViews[4] }}, 
                    {{ $monthlyViews[5] }}, 
                    {{ $monthlyViews[6] }}, 
                    {{ $monthlyViews[7] }}, 
                    {{ $monthlyViews[8] }}, 
                    {{ $monthlyViews[9] }}, 
                    {{ $monthlyViews[10] }}, 
                    {{ $monthlyViews[11] }}, 
                    {{ $monthlyViews[12] }}
                ],
                backgroundColor: [
                    'rgba(0,0,0,0)'
                ],
                pointborderColor: [
                    'rgba(255, 99, 132, 1)',
                ],
                borderColor:'#ff385c',
                borderWidth: 2,
                lineTension:0,
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        fontColor: 'black',
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    ticks: {
                        fontColor: 'black',
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

{{-- Script Grafic Messagges --}}
<script>
    var ctx = document.getElementById('myChartMessages');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan.', 'Feb.', 'Mar.', 'Apr.', 'May', 'June', 'July', 'Aug.', 'Sept.', 'Oct.', 'Nov.', 'Dec.'],
            datasets: [{
                label: 'Messagges',
                data: [{{ $monthlyMessages[1] }}, {{ $monthlyMessages[2] }}, {{ $monthlyMessages[3] }}, {{ $monthlyMessages[4] }}, {{ $monthlyMessages[5] }}, {{ $monthlyMessages[6] }}, {{ $monthlyMessages[7] }}, {{ $monthlyMessages[8] }}, {{ $monthlyMessages[9] }}, {{ $monthlyMessages[10] }}, {{ $monthlyMessages[11] }}, {{ $monthlyMessages[12] }}],
                backgroundColor: [
                    '#ff385c',
                ],
                pointborderColor: [
                    'rgba(255, 99, 132, 1)',
                ],
                borderColor:'rgba(255, 99, 132, 1)',
                borderWidth: 2,
                lineTension:0,
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        fontColor: 'black',
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    ticks: {
                        fontColor: 'black',
                        beginAtZero: true
                    }
                }]
            }
        }
    });



    // submit form on select change
    const select = document.getElementById('choose-year');
    select.addEventListener('change', e => {
        const form = e.target.closest('form');
        form.submit();
    });
</script>
@endsection