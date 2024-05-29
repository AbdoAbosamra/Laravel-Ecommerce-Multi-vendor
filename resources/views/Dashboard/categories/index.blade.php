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
        <x-alert />
        <div class="content">
            <div class="container-fluid">
                <table class="table">
                    <div class="row">
                        <div class="col-lg-6">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Parent</th>
                        <th>Created At</th>
                        <th colspan="2"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($categories->count())
                        @foreach($categories as $category)
                            <tr>
                                <td><img src="{{asset("storage/" . $category->image) }}" alt="" height="50" ></td>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->parent_id}}</td>
                                <td>{{$category->created_at}}</td>
                                <td>
                                    <a href="{{route('dashboard.categories.edit' ,['category' => $category->id])}}" class="btn btn-sm btn-outline-success">Edit</a>
                                </td>
                                <td>
                                    <form action="{{route('dashboard.categories.destroy', ['category' => $category->id])}}" method="post">
                                    @csrf
                                    <!-- Form Method Spoofing-->
{{--                                    <input type="hidden" name="_method" value="delte">--}}
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="7">No Catefories Yet</td>
                    </tr>
                    </tbody>
                </table>
                </div>


               @endif
            </div>
        </div>
    </div>

@endsection
