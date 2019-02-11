@extends('layouts.master')
@section('content')
<main class="container-fluid mt-5">
    <div class="card my-3">
        <div class="card-header">Bilgi ve Analiz</div>
        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-6">
                    <canvas id="why_abandon_us_status_chart" width="100" height="50"></canvas>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
<script>
    abandons=[];
    @foreach($people as $person)
        if("{{ $person->why_abandon_us_status }}"!=""){
            abandons.push("{{ $person->why_abandon_us_status }}");
        }
    @endforeach
    abandons.sort();
    formatted_abandons=[];
    abandon_numbers=[];

    var current = null;
    var cnt = 0;
    for (var i = 0; i <= abandons.length; i++) {
        if (abandons[i] != current) {
            if (cnt > 0) {
                formatted_abandons.push(current);
                abandon_numbers.push(cnt);
            }
            current = abandons[i];
            cnt = 1;
        } else {
            cnt++;
        }
    }

    var ctx = $("#why_abandon_us_status_chart");
    var myBarChart  = new Chart(ctx, {
        type: 'bar',
        data: {
            labels:["Hoca Sorunu","Kişisel Nedenler","Ücret Sorunu"],
            datasets: [{
                        label: "Ayrılma Nedeni-Öğrenci Sayısı Grafiği",
                        borderColor: 'rgb(255, 99, 132)',
                        data: abandon_numbers,
            }]
        },
    });
</script>

@endsection


@section('css')

@endsection