@extends('layouts.app')

@section('content')
    <div class="container">
        Visualizzazioni conta: {{count($visualisations)}}
        {{$visualisations}}
        <br>
        @foreach($visualisations as $visualisation)
            @if($visualisation->created_at->format('m') == '06')
                {{$visualisation->created_at}}
            @endif
        @endforeach

        <br>
        {{-- Messaggi: {{count($messages)}} --}}

        <div>
            <canvas id="myChart"></canvas>
        </div>

        <script>
            const labels = [
              'January',
              'February',
              'March',
              'April',
              'May',
              'June',
            ];
          
            const data = {
              labels: labels,
              datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 2, 20, 30, 45],
              }]
            };
          
            const config = {
              type: 'line',
              data: data,
              options: {}
            };
          </script>

        <script>
            const myChart = new Chart(
                document.getElementById('myChart'),
                config
            );
        </script>
    </div>
@endsection