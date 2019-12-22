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
                    <h1 class="text-dark">Task Edit</h1>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Task Page</li>
                        </ol>

                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <a href="{{ route('admin.tasks') }}" style="text-decoration:none;">
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
                <form method="post" action="{{ route('admin.tasks.update', $task->id) }}">
                    @method('patch')
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-1">
                            <label for="name">{{ __('Name') }}</label>
                        </div>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $task->name }}" required autofocus>

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-1">
                            <label for="description">{{ __('Description') }}</label>
                        </div>
                        <div class="col-md-6">
                            <textarea name="description" id="description" class="form-control" cols="30" rows="5" required>{{ $task->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-1">
                            <label for="role_id">{{ __('Role') }}</label>
                        </div>
                        <div class="col-md-6">
                            <select name="role_id" id="role_id" class="form-control" required>
                                @foreach ($roles as $r)
                                    @php
                                        $cek = $r->id ==  $task->role->id;
                                    @endphp
                                    <option value="{{ $r->id }}" {{ $cek  ? 'selected = selected' : ''  }}>
                                        {{ $r->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-1">
                            <label for="category_id">{{ __('Category') }}</label>
                        </div>
                        <div class="col-md-6">
                            <select name="category_id" id="category_id" class="form-control" required>
                                @foreach ($categories as $c)
                                    @php
                                        $cek = $c->id ==  $task->category->id;
                                    @endphp
                                    <option value="{{ $c->id }}" {{ $cek  ? 'selected = selected' : ''  }}>
                                        {{ $c->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-1">
                            <label for="score_id">{{ __('Score') }}</label>
                        </div>
                        <div class="col-md-6">
                            <select name="score_id" id="score_id" class="form-control" required>
                                @foreach ($scores as $s)
                                    @php
                                        $sek = $s->id ==  $task->score->id;
                                    @endphp
                                    <option value="{{ $s->id }}" {{ $cek  ? 'selected = selected' : ''  }}>
                                        {{ $s->nilai }}
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
