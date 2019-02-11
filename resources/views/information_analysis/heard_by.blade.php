@extends('layouts.master')
@section('content')
<main class="container-fluid mt-5">
    <div class="card my-3">
        <div class="card-header">Bilgi ve Analiz</div>
        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-6">
                    <canvas id="heard_by_chart" width="100" height="50"></canvas>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
<script>
    platforms=[];
    @foreach($students as $student)
        if("{{ $student->heard_by_status }}"!=""){
            platforms.push("{{ $student->heard_by_status }}");
        }
    @endforeach
    platforms.sort();
    formatted_platforms=[];
    platform_numbers=[];

    var current = null;
    var cnt = 0;
    for (var i = 0; i <= platforms.length; i++) {
        if (platforms[i] != current) {
            if (cnt > 0) {
                formatted_platforms.push(current);
                platform_numbers.push(cnt);
            }
            current = platforms[i];
            cnt = 1;
        } else {
            cnt++;
        }
    }
    var ctx = $("#heard_by_chart");
    var myBarChart  = new Chart(ctx, {
        type: 'bar',
        data: {
            labels:["Diğer","Facebook","Google","Instagram"],
            datasets: [{
                        label: "Duyulan Platform-Öğrenci Sayısı Grafiği",
                        borderColor: 'rgb(255, 99, 132)',
                        data: platform_numbers,
            }]
        },
    });
</script>

@endsection


@section('css')

@endsection