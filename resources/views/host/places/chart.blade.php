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

    <div class="container">

        {{-- Grafic Visualisations --}}
        @if (!empty($monthly_visualisations))
        <div class="grafico mt-5" style="width:80%; height:80%">
            <canvas id="myChartViews"></canvas>
        </div>
        @else
        <div class="mt-5">
            <h4>This place hasn't been visualised yet.</h4>
        </div>
        @endif

        {{-- Grafic Messagges --}}
        @if (!empty($monthly_messages))
        <div class="grafico mt-5 mb-5" style="width:80%; height:80%">
            <canvas id="myChartMessages"></canvas>
        </div>
        @else
        <div class="mt-5">
            <h4>You haven't received any messages for this place yet.</h4>
        </div>
        @endif
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
                    {{ $monthly_visualisations[1] }}, 
                    {{ $monthly_visualisations[2] }}, 
                    {{ $monthly_visualisations[3] }}, 
                    {{ $monthly_visualisations[4] }}, 
                    {{ $monthly_visualisations[5] }}, 
                    {{ $monthly_visualisations[6] }}, 
                    {{ $monthly_visualisations[7] }}, 
                    {{ $monthly_visualisations[8] }}, 
                    {{ $monthly_visualisations[9] }}, 
                    {{ $monthly_visualisations[10] }}, 
                    {{ $monthly_visualisations[11] }}, 
                    {{ $monthly_visualisations[12] }}
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
                data: [{{ $monthly_messages[1] }}, {{ $monthly_messages[2] }}, {{ $monthly_messages[3] }}, {{ $monthly_messages[4] }}, {{ $monthly_messages[5] }}, {{ $monthly_messages[6] }}, {{ $monthly_messages[7] }}, {{ $monthly_messages[8] }}, {{ $monthly_messages[9] }}, {{ $monthly_messages[10] }}, {{ $monthly_messages[11] }}, {{ $monthly_messages[12] }}],
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