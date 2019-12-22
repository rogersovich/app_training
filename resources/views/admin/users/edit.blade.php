@extends('admin.element.main')


@section('title', 'Admin')

@section('content')

    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h1 class="text-dark">User Add</h1>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">User Page</li>
                        </ol>

                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <a href="{{ route('admin.users') }}" style="text-decoration:none;">
                        <i class="fa fa-arrow-left"></i>
                        Back
                    </a>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="container">
                <form method="post" action="{{ route('admin.users.update', $user->id) }}">
                    @method('patch')
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-1">
                            <label for="first_name">{{ __('Nama Depan') }}</label>
                        </div>
                        <div class="col-md-6">
                            <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $user->profile->first_name }}" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-1">
                            <label for="last_name">{{ __('Nama Belakang') }}</label>
                        </div>
                        <div class="col-md-6">
                            <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $user->profile->last_name }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-1">
                            <label for="age">{{ __('Umur') }}</label>
                        </div>
                        <div class="col-md-6">
                            <input id="age" type="text" class="form-control" name="age" value="{{ $user->profile->age }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-1">
                            <label for="gender">{{ __('Gender') }}</label>
                        </div>
                        <div class="col-md-6">
                            <select name="gender" id="gender" class="form-control" required>
                                @foreach ($profiles as $p)
                                    @php
                                        $cek = $p->id ==  $user->profile->id;
                                    @endphp
                                    <option value="{{ $p->gender }}" {{ $cek  ? 'selected = selected' : ''  }}>
                                        {{ $p->gender }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-1">
                            <label for="email">{{ __('Email') }}</label>
                        </div>
                        <div class="col-md-6">
                            <input id="email" type="text" class="form-control" name="email" value="{{ $user->email }}" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-1">
                            <label for="password">{{ __('Password') }}</label>
                        </div>
                        <div class="col-md-6">
                            <input id="password" type="text" class="form-control" name="password" value="" autofocus>
                            <input type="hidden" name="password_lama" value="{{ $user->password }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-1">
                            <label for="exp">{{ __('Exp') }}</label>
                        </div>
                        <div class="col-md-6">
                            <input id="exp" type="text" class="form-control" readonly name="exp" value="{{ $user->exp }}" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="profile_id" value="{{ $user->profile->id }}">
                        <button type="submit" class="btn btn-primary" style="margin-left:110px;">
                            {{ __('Submit') }}
                        </button>
                    </div>
                </form>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->

@endsection
