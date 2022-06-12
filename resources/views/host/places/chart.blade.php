@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class=" text-center pt-3">Statistics per Place: <span class="font-weight-bold">{{$place->title}}</span></h2>

    <form action="{{ route('host.chart.index', $place) }}">
        <div class="select d-flex justify-content-between align-self-center">
            <div class="align-self-center"><h3 class="pl-4 m-0">Total Visualisation:</h3></div>
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

    <div class="row">

        {{-- Grafic Visualisations --}}
        <div class="grafico col-12 mt-5" style="width:80%; height:80%">
            <canvas id="myChartViews"></canvas>
        </div>

        {{-- Grafic Messagges --}}
        <div class="grafico col-12 mt-5 mb-5" style="width:80%; height:80%">
            <canvas id="myChartMessages"></canvas>
        </div>
        <a href="{{ route('host.places.index', $place->slug) }}">Back to places</a>
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
                data: [{{count($monthlyMessages[1])}}, {{count($monthlyMessages[2])}}, {{count($monthlyMessages[3])}}, {{count($monthlyMessages[4])}}, {{count($monthlyMessages[5])}}, {{count($monthlyMessages[6])}}, {{count($monthlyMessages[7])}}, {{count($monthlyMessages[8])}}, {{count($monthlyMessages[9])}}, {{count($monthlyMessages[10])}}, {{count($monthlyMessages[11])}}, {{count($monthlyMessages[12])}}],
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

<style lang="scss" scoped>
    
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