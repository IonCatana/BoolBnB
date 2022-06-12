@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class=" text-center pt-3">Statistics per Place: <span class="font-weight-bold">{{$place->title}}</span></h2>

    <form action="{{ route('host.chart.index', $place) }}">
        <div class="select d-flex justify-content-between align-self-center">
            <div class="align-self-center">
                <h3 class="pl-4 m-0">Total Visualisation:</h3>
            </div>
            <div class=" d-flex">
                <h3 class="pr-4 m-0">Select Year:</h3>
                <select name="year" id="choose-year">
                    @foreach ($years as $year)
                    <option {{ $year == $selected_year ? 'selected' : ''}} value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

    @if (!empty($monthly_visualisations))
        {{-- Grafic Visualisations --}}
        <div class="grafico mt-5" style="width:80%; height:80%">
            <canvas id="myChartViews"></canvas>
        </div>

        {{-- Grafic Messagges --}}
        <div class="grafico mt-5 mb-5" style="width:80%; height:80%">
            <canvas id="myChartMessages"></canvas>
        </div>
    @else
    <div class="mt-5">
        <h4>This place has no visualisations nor messages yet.</h4>
    </div>
    @endif

    <a href="{{ route('host.places.index', $place->slug) }}">Back to places</a>
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
                    '#03DF6B' //blueBoolean
                ],
                pointborderColor: [
                    'rgba(255, 99, 132, 1)',
                ],
                borderColor:'#0F0E50', //blueBollean                
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
                    '#03DF6B', //greenBoolean
                ],
                pointborderColor: [
                    '#03DF6B', //greenBoolean
                ],                               
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

<style>
    
    select{
        border-radius: 5px;
        width: 250px
    }
    #choose-year{
        position: relative;
        right: 18px;         
        padding: 5px;
        transition: 200ms;
        
    }
    #choose-year:hover{
        background-color: #03DF6B;
    }
    
</style>
@endsection