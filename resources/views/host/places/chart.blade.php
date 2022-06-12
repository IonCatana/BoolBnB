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
                    {{count($monthlyViews[1])}}, 
                    {{count($monthlyViews[2])}}, 
                    {{count($monthlyViews[3])}}, 
                    {{count($monthlyViews[4])}}, 
                    {{count($monthlyViews[5])}}, 
                    {{count($monthlyViews[6])}}, 
                    {{count($monthlyViews[7])}}, 
                    {{count($monthlyViews[8])}}, 
                    {{count($monthlyViews[9])}}, 
                    {{count($monthlyViews[10])}}, 
                    {{count($monthlyViews[11])}}, 
                    {{count($monthlyViews[12])}}
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
                data: [{{count($monthlyMessages[1])}}, {{count($monthlyMessages[2])}}, {{count($monthlyMessages[3])}}, {{count($monthlyMessages[4])}}, {{count($monthlyMessages[5])}}, {{count($monthlyMessages[6])}}, {{count($monthlyMessages[7])}}, {{count($monthlyMessages[8])}}, {{count($monthlyMessages[9])}}, {{count($monthlyMessages[10])}}, {{count($monthlyMessages[11])}}, {{count($monthlyMessages[12])}}],
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