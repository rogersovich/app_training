@extends('admin.element.main')

@section('title', 'Activity')

@section('custom-css')

    <style>

    </style>

@endsection

@section('content')
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container">
            <div class="custom-nav">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link font-bold" href="#">All Task</a>
                    </li>
                    <li class="nav-item">
                        @foreach ($tasks as $t)
                        <a class="nav-link" href="#">
                            {{ $t->role->name }}
                        </a>
                        @endforeach
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        @foreach ($tasks as $t)
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body cards br-card pointer-dot" id="card-{{ $t->id }}">
                                    <div class="card-text">
                                        @php
                                            $arr[] = $t->id;
                                        @endphp
                                        <div class="icon">
                                            @if($t->category->name == 'easy')
                                                <i class="fa fa-circle green mb-3"></i>
                                            @elseif($t->category->name == 'medium')
                                                <i class="fa fa-circle orange mb-3"></i>
                                            @else
                                                <i class="fa fa-circle red mb-3"></i>
                                            @endif
                                        </div>
                                        @php
                                            $dateNow = date_format($t->updated_at, 'Y-m-d');
                                        @endphp
                                        <p class="mb-2">
                                            {{ $t->name}}
                                            <br>
                                            <span class="font-light">{{ $dateNow }}</span>
                                        </p>
                                        <div class="ldBar" id="bar-success-{{$t->id}}" style="margin-bottom:10px; right: 15px; height: auto; width: 100%;" data-type="stroke" data-stroke="#26de81" data-value="0"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="row">
                        @foreach ($tasks as $t)
                        <div class="col-md-12 card-custom" id="card-active-{{ $t->id }}">
                            <div class="card">
                                <div class="card-body-custom br-card border-active">
                                    <div class="card-title bb-card pt-2 pb-2">
                                        <div class="icon ml-4 mr-4">
                                            @if($t->category->name == 'easy')
                                                <i class="fa fa-circle green mb-3"></i>
                                            @elseif($t->category->name == 'medium')
                                                <i class="fa fa-circle orange mb-3"></i>
                                            @else
                                                <i class="fa fa-circle red mb-3"></i>
                                            @endif
                                            In Process
                                        </div>
                                    </div>
                                    <div class="card-text ml-4 mr-4 pt-2 pb-2">
                                        <h5>
                                            {{ $t->name }}
                                        </h5>
                                        <div class="mt-3 mb-3">
                                            <span class="badge badge-pill badge-orange">
                                                {{ $t->role->name }}
                                            </span>
                                            <span class="badge badge-pill badge-red">
                                                {{ $t->role->type->name }}
                                            </span>
                                            <span class="badge badge-pill badge-green">
                                                {{ $t->category->name }}
                                            </span>
                                        </div>
                                        <p class="mb-3">
                                            {{ $t->description }}
                                        </p>
                                        <div class="confirm">
                                            {{-- <button class="button btn-green">
                                                <i class="fa fa-check"></i>
                                                Complete
                                            </button> --}}
                                            <button class="button btn-red">Uncomplete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
@endsection

@section('scripts')
    <script>
        $('document').ready(function(){

            // var bar1 = new ldBar("#bar-success-1");
            // bar1.set(100);

            // var bar2 = new ldBar("#bar-success-2");
            // bar2.set(100);

            // var bar3 = new ldBar("#bar-success-3");
            // bar3.set(100);

            // var bar4 = new ldBar("#bar-success-4");
            // bar4.set(100);

            var cardArr = [];
            $(".cards").each(function(){
                var row = [];
                row.push($(this).attr('id'));

                cardArr.push(row);
            });

            $(cardArr).each(function(k,v){

                if( v[k] == 'card-1' ){
                    var cardOne = '#card-1';
                    $(cardOne).addClass('border-active');
                }else{
                    $('.cards').not('#card-1').addClass('border-isactive');
                }

            });

            var cardCustomArr = [];
            $('.card-custom').each(function(){
                var row = [];
                row.push($(this).attr('id'));

                cardCustomArr.push(row);
            })


            $(cardCustomArr).each(function(k,v){

                if( v[k] == 'card-active-1' ){
                    $('#card-active-1').show();
                }else{
                    $('.card-custom').not('#card-active-1').hide();
                }

            });

            $('.card-body').on('click', function(){

                var cardActive = $('.border-active').attr('id');
                var cardId = $(this).attr('id');

                var Ca = '#'+cardActive+'';
                var Ci = '#'+cardId;

                $(Ca).removeClass('border-active');
                $(Ca).addClass('border-isactive');
                $(Ci).removeClass('border-isactive');
                $(Ci).addClass('border-active');

                var cardCustomFull = [];
                $(cardCustomArr).each(function(k,v){

                    if( $('#'+v[0]).is(':visible') ){
                        var cek = $('#'+v[0]).attr('id');

                        var ceks = cardId;
                        var split = ceks.split('-');
                        var full = '#'+split[0]+'-active-'+split[1]
                        cardCustomFull.push(full);

                    }else{

                    }
                })

                var cardFull = [];
                $(cardArr).each(function(k,v){

                    var cek = $('#'+v[0]).attr('id');

                    if( $('#'+cek).hasClass('border-active') ){
                        var ceks = $('#'+v[0]).attr('id');
                        var full = '#'+ceks
                        cardFull.push(full)

                    }

                })

                // console.log(cardFull)
                // console.log(cardCustomFull)

                $(cardCustomFull[0]).show();
                $('.card-custom').not(cardCustomFull[0]).hide();


                // console.log(Ca)
                // console.log(Ci)
            })


        })
    </script>
@endsection
