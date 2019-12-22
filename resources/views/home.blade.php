@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}

                    <div class="soal-1">
                        <h1>Soal 1</h1>

                        @php
                            $jarak = 1000;
                            $amrozi = date_create('08:00:00');
                            $beril = date_create('08:00:10');
                            $a = 2;
                            $amrozi_percepatan = 0.1;
                            $b = 5;
                            $detik = 0;


                            while ($a < 50) {

                                $a = $a + 0.1;
                                $waktu = 2 + $a;

                                $detik_a = date_add($amrozi, date_interval_create_from_date_string('1 seconds'));

                                echo 'amrozi : ' . date_format($detik_a, 'H:i:s');
                                echo '<br>';

                                $detik_b = $beril;
                                //dd(date_format($detik_b, 'H:i:s'));

                                $cek_waktu = $detik_a == $detik_b;

                                if($cek_waktu){


                                    $detik_b = date_add($detik_b, date_interval_create_from_date_string( '1 seconds'));

                                    //dd(date_format($waktu_bener, 'H:i:s'));

                                    echo 'beril : ' . date_format($detik_b, 'H:i:s');
                                    echo '<br>';

                                }



                                echo '<br><br>';

                                $cek = is_float($a);

                                if($cek == false){
                                    //dd($cek);
                                    $x = strlen($a);
                                    $y = substr($a, $x);

                                    if($y == 5 || $y == 0){
                                        $total[] = $a;
                                    }
                                }

                            }

                            //dd($total);

                        @endphp
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

    <script>

        $('document').ready(function(){
            console.log('sdfsd');
        })

    </script>


@endsection
