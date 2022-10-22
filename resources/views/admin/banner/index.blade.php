@extends('admin.master')
@section('title')
    {{'Banner'}}
@endsection
@section('name_function')
    {{'Dashboard'}}
@endsection

@section('page_link')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">index</li>
    </ol>
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">
                                <i class="fa fa-list" aria-hidden="true"></i>
                                {{__(" Banner List")}}
                            </h1>
                            @can('banner_create')
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 100px;">
                                        <a href="{{route('banner.create')}}" class="btn btn-primary  float-right">
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

                            <form action="{{route('banner.index')}}" method="get" class="input-group"
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
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($banners->count())
                                    @include('admin.banner.table_data')
                                @else
                                    @include('admin.banner.table_none')
                                @endif
                                </tbody>
                            </table>


                        </div>
                        <!-- /.card-body -->
                    </div>
                    {{$banners->links()}}
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection
