@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">Aday Öğrenci Bilgileri</div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('candidate_student_register_show') }}"><span class="float-right">Yeni Kayıt</span><i class="fas fa-plus-circle float-right pr-2"></i></a>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 table-responsive">
                    <table id="candidate-student-table" class="candidate-student-table table table-striped">
                        <thead>
                            <tr>
                                <th class="align-middle">Adı</th>
                                <th class="align-middle">Soyadı</th>
                                <th class="align-middle">Ülke</th>
                                <th class="align-middle">Telefon</th>
                                <th class="align-middle">İstediği Kurs</th>
                                <th class="align-middle">Not</th>
                                <th class="align-middle">Kaydı Yapan</th>
                                <th class="align-middle">Katılım Durumu</th>
                                <td class="align-middle">Katılım İşlem</th>
                                <th class="align-middle">İşlem</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($candidate_students as $candidate_student)
                            <tr>
                                <td class="align-middle">{{ $candidate_student->name }}</td>
                                <td class="align-middle">{{ $candidate_student->surname }}</td>
                                <td class="align-middle">{{ $candidate_student->country }}</td>
                                <td class="align-middle">{{ $candidate_student->telephone }}</td>
                                <td class="align-middle">{{ $candidate_student->demanded_education_status }}</td>
                                <td class="align-middle">{{ $candidate_student->note }}</td>
                                <td class="align-middle">{{ $candidate_student->registration_by }}</td>
                                <td class="align-middle">{{ $candidate_student->register_status }}</td>
                                <form action="{{ route('candidate_student_edit_show', ['candidate_student_id' => $candidate_student->id]) }}" method="GET">
                                    <td class="align-middle">
                                        <button type="button" onclick="candidate_student_registered({{ $candidate_student->id }})" class="btn btn-success btn-sm btn-block">Kaydı Yapıldı</button>
                                        <button type="button" onclick="candidate_student_not_come({{ $candidate_student->id }})" class="btn btn-secondary btn-sm btn-block">Gelmeyecek</button>
                                    </td>
                                    <td class="align-middle">
                                        <button type="submit" class="btn btn-primary btn-sm btn-block">Düzenle</button>
                                        <button type="button" onclick="candidate_student_delete({{ $candidate_student->id }})" class="btn btn-danger btn-sm btn-block">Sil</button>
                                    </td>
                                </form>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('js')

<script src="{{ asset('js/extensions/tablesort.js') }}"></script>
<script>
    var filtersConfig = {
        base_path: 'tablefilter/',
        state: {
            types: ['hash'],
            filters: true,
            page_number: true,
            page_length: true,
            sort: true
        },
        paging: {
            results_per_page: ['Records: ', [50, 100, 200]]
        },
        alternate_rows: true,
        btn_reset: true,
        rows_counter: true,
        loader: true,
        status_bar: false,
        col_4:'select',
        col_widths: [
            '120px', '120px', '150px',
            '150px', '150px', '350px',
            '100px', '100px', '150px',
            '150px'
        ],
        col_types: [
            'string', 'string', 'string',
            'number', 'string', 'string',
            'string'
        ],
        extensions: [{
            name: 'sort'
        }]
    };
    var tf = new TableFilter(document.querySelector('.candidate-student-table'), filtersConfig);
    tf.init();
    document.querySelector('.tot span:nth-child(1)').innerHTML = "Satır ";
    document.querySelector('.mdiv span:nth-child(3)').innerHTML = "Sayfa ";
    document.querySelector('.mdiv span:nth-child(5)').innerHTML = " /";
    document.querySelector('.rdiv span:nth-child(1)').innerHTML = "Göster";
    document.querySelector('.firstPage').style.cursor = "pointer";
    document.querySelector('.previousPage').style.cursor = "pointer";
    document.querySelector('.nextPage').style.cursor = "pointer";
    document.querySelector('.lastPage').style.cursor = "pointer";
    document.querySelector('.reset').style.cursor = "pointer";
    document.querySelector('.loader').innerHTML = "Yükleniyor...";
    document.querySelector('.fltrow td:last-child').style.display = "none";
    document.querySelector('.helpCont').innerHTML =
        "Daha detaylı bir filitreleme için aşağıdaki operatörleri kullanarak arama yapabilirsiniz.<br><b><</b>, <b><=</b>, <b>></b>, <b>>=</b>, <b>*</b>, <b>!</b>, <b>{</b>, <b>}</b>, <b>||</b>, <b>&&</b>, <b>[empty]</b>, <b>[nonempty]</b>, <b>rgx</b> <br> <a target='_blank' href='https://github.com/koalyptus/TableFilter/wiki/4.-Filter-operators/'>Detaylı Bilgi</a>";
    $(".flt option:nth-child(1)").text("Temizle");
</script>
<script>
    function candidate_student_delete(candidate_student_id) {
        swal({
                title: "Emin misiniz?",
                text: "Öğrenci silindiğinde tekrar geri getiremezsiniz!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                buttons: ["Hayır", "Evet"],
            })
            .then((willDelete) => {
                if (willDelete) {
                    //send project id to be deleted from databese
                    axios.get('/api/candidate-student-delete', {
                            params: {
                                id: candidate_student_id
                            }
                        })
                        .then(function (response) {
                            console.log(response);
                            swal({
                                title: "Başarılı!",
                                text: "Öğrenci silindi!",
                                icon: "success",
                                timer: 2000,
                                buttons: false,
                            });
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                        })
                        .catch(function (error) {
                            console.log(error);
                            swal({
                                text: "Öğrenci bir hatadan dolayı silinemedi!",
                                button: "Tamam",
                            });
                        });
                } else {
                    swal({
                        text: "Öğrenci silinmedi!",
                        button: "Tamam",
                    });

                }
            });
    }

    function candidate_student_registered(candidate_student_id) {
        swal({
                title: "Emin misiniz?",
                text: "Öğrenciyi kayıt oldu olarak işaretliyorsunuz!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                buttons: ["Hayır", "Evet"],
            })
            .then((willDelete) => {
                if (willDelete) {
                    //send project id to be deleted from databese
                    axios.get('/api/candidate-student-registered', {
                            params: {
                                id: candidate_student_id
                            }
                        })
                        .then(function (response) {
                            console.log(response);
                            swal({
                                title: "Başarılı!",
                                text: "Öğrenci kayıt oldu olarak işaretlendi!",
                                icon: "success",
                                timer: 2000,
                                buttons: false,
                            });
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                        })
                        .catch(function (error) {
                            console.log(error);
                            swal({
                                text: "Öğrenci bir hatadan dolayı işaretlenemedi!",
                                button: "Tamam",
                            });
                        });
                } else {
                    swal({
                        text: "Öğrenci işaretlenemedi!",
                        button: "Tamam",
                    });

                }
            });
    }

    function candidate_student_not_come(candidate_student_id) {
        swal({
                title: "Emin misiniz?",
                text: "Öğrenciyi kayıt olmayacak olarak işaretliyorsunuz!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                buttons: ["Hayır", "Evet"],
            })
            .then((willDelete) => {
                if (willDelete) {
                    //send project id to be deleted from databese
                    axios.get('/api/candidate-student-not-come', {
                            params: {
                                id: candidate_student_id
                            }
                        })
                        .then(function (response) {
                            console.log(response);
                            swal({
                                title: "Başarılı!",
                                text: "Öğrenci kayıt olmayacak olarak işaretlendi!",
                                icon: "success",
                                timer: 2000,
                                buttons: false,
                            });
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                        })
                        .catch(function (error) {
                            console.log(error);
                            swal({
                                text: "Öğrenci bir hatadan dolayı işaretlenemedi!",
                                button: "Tamam",
                            });
                        });
                } else {
                    swal({
                        text: "Öğrenci işaretlenemedi!",
                        button: "Tamam",
                    });

                }
            });
    }
</script>
<script>
    $( ".rdiv input" ).trigger( "click" );
</script>
@endsection
@section('css')
<link href="{{ asset('css/extensions/tablefilter.css') }}" rel="stylesheet">
<style>
        .helpFooter {
            display: none;
            visibility: hidden;
        }

        select {
            cursor: pointer;
        }
</style>
@endsection
@section('title', "Aday Öğrenci Bilgi")
