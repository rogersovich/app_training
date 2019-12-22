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
                    <h1 class="text-dark">Score Page</h1>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Score Page</li>
                        </ol>

                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <a href="{{ route('admin.scores.create') }}" class="btn btn-success btn-sm">
                        Tambah Data
                    </a>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">

                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover tabel-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Category</th>
                                    <th>Nilai</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($scores as $s)
                                    <tr>
                                        <td>{{ $s->id }}</td>
                                        <td>{{ $s->category->name }}</td>
                                        <td>{{ $s->nilai }}</td>
                                        <td>
                                            <a href="{{ route('admin.scores.edit',$s->id) }}">
                                                Edit
                                            </a>
                                            <a href="{{ route('admin.scores.destroy',$s->id) }}">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
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
