@extends('Layouts.dashboard')
@section('title' , 'Categories')
@section('Content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Categories</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Starter Page</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="mb-5">
            <a href="{{route("dashboard.categories.create")}}" class="btn btn-sm btn-outline-primary"> Create</a>
        </div>
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <form action="{{route('dashboard.categories.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('dashboard.categories._form')
                </form>
            </div>
        </div>
    </div>


@endsection
