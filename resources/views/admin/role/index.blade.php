@extends('admin.master')
@section('title')
    {{'Role'}}
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Role</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Role</li>
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
                                    {{__("Role List")}}
                                </h1>
                                <div class="card-tools">
                                    @can('role_index')
                                        <div class="input-group input-group-sm" style="width: 100px;">
                                            <a href="{{route('role.create')}}" class="btn btn-primary  float-right">
                                                <i class="fas fa-plus"></i>
                                                {{__("Create")}}
                                            </a>
                                        </div>
                                    @endcan
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                @include('admin.partial.alert')
                                <br/>
                                <form action="{{route('role.index')}}" method="get">
                                    <div class="input-group" style="width: 450px; margin-left: 10px">
                                        <input
                                            type="text"
                                            name="search"
                                            class="form-control"
                                            placeholder="Search"
                                        >
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-success float-right">
                                                <i class="fas fa-search"></i>
                                                {{__("Search")}}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                @if($roles->count())
                                    @include('admin.role.table_data')
                                @else
                                    @include('admin.role.table_none')
                                @endif
                            </div>
                            <!-- /.card-body -->
                        </div>
                    {{$roles->links()}}
                    <!-- /.card -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </section>
    </div>
@endsection
