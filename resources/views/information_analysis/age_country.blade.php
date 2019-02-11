@extends('layouts.master')
@section('content')
<main class="container-fluid mt-5">
    <div class="card my-3">
        <div class="card-header">Bilgi ve Analiz</div>
        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-6">
                    <canvas id="age_chart" width="100" height="50"></canvas>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-6">
                    <canvas id="country_chart" width="100" height="50"></canvas>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
<script>
    ages=[];
    @foreach($people as $person)
        ages.push({{ $person->age }});
    @endforeach
    ages.sort();
    formatted_ages=[];
    age_numbers=[];

    var current = null;
    var cnt = 0;
    for (var i = 0; i <= ages.length; i++) {
        if (ages[i] != current) {
            if (cnt > 0) {
                formatted_ages.push(current);
                age_numbers.push(cnt);
            }
            current = ages[i];
            cnt = 1;
        } else {
            cnt++;
        }
    }
   
    var ctx = $("#age_chart");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels:formatted_ages,
            datasets: [{
                        label: "Yaş-Öğrenci Sayısı Grafiği",
                        borderColor: 'rgb(255, 99, 132)',
                        data: age_numbers,
            }]
        },
    });
</script>
<script>
        countries=[];
        @foreach($people as $person)
            countries.push("{{ $person->country }}");
        @endforeach
        countries.sort();
        formatted_countries=[];
        country_numbers=[];
    
        var current = null;
        var cnt = 0;
        for (var i = 0; i <= countries.length; i++) {
            if (countries[i] != current) {
                if (cnt > 0) {
                    formatted_countries.push(current);
                    country_numbers.push(cnt);
                }
                current = countries[i];
                cnt = 1;
            } else {
                cnt++;
            }
        }
    
        var ctx = $("#country_chart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels:formatted_countries,
                datasets: [{
                            label: "Ülke-Öğrenci Sayısı Grafiği",
                            borderColor: 'rgb(255, 99, 132)',
                            data: country_numbers,
                }]
            },
        });
</script>
@endsection


@section('css')

@endsection