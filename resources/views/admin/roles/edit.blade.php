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
                    <h1 class="text-dark">Role Edit</h1>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Role Page</li>
                        </ol>

                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <a href="{{ route('admin.roles') }}" style="text-decoration:none;">
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
                <form method="post" action="{{ route('admin.roles.update', $role->id) }}">
                    @method('patch')
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-1">
                            <label for="name">{{ __('Name') }}</label>
                        </div>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $role->name }}" required autofocus>

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-1">
                            <label for="type_id">{{ __('Type') }}</label>
                        </div>
                        <div class="col-md-6">
                            <select name="type_id" id="type_id" class="form-control" required>
                                @foreach ($types as $type)
                                    @php
                                        $cek = $type->id ==  $role->type->id;
                                    @endphp
                                    <option value="{{ $type->id }}" {{ $cek  ? 'selected = selected' : ''  }}>
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
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
