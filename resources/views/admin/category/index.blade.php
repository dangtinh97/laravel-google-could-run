@extends('admin.master')
@section('title')
    {{'Category'}}
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Category</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Category</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <div class="container-fluid">
                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="card-title">
                                    <i class="fa fa-list" aria-hidden="true"></i>
                                    {{__(" Category List")}}
                                </h1>
                                @can('category_create')
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 100px;">
                                            <a href="{{route('category.create')}}" class="btn btn-primary  float-right">
                                                <i class="fas fa-plus"></i>
                                                {{__("Create")}}
                                            </a>
                                        </div>
                                    </div>
                                @endcan
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                @include('admin.partial.alert')
                                <br/>

                                <form action="{{route('category.index')}}" method="get" class="input-group"
                                      style="width: 450px; margin-left: 10px">
                                    <input
                                        type="text"
                                        name="search"
                                        class="form-control float-right"
                                        placeholder="Search Name"
                                    >
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-search"></i>
                                            {{__("Search")}}
                                        </button>
                                    </div>
                                </form>

                                @if($categories->count())
                                    @include('admin.category.table_data')
                                @else
                                    @include('admin.category.table_none')
                                @endif
                            </div>
                            <!-- /.card-body -->
                        </div>
                    {{$categories->links()}}
                    <!-- /.card -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </section>
    </div>
@endsection
