@extends('admin.master')
@section('title')
    {{'Update Permission'}}
@endsection
@section('content')
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fa fa-edit" aria-hidden="true"></i>
                            {{__("Update")}}
                        </h3>
                        <div class="card-tools">
                            <div class="card-tools">
                                <a class="btn btn-primary" href="{{route('permission.index')}}">
                                    <i class="fa fa-arrow-left"></i>
                                    Back
                                </a>
                            </div>
                        </div>
                    </div>
                    <form class="form-horizontal" action="{{route('permission.update', [$permission->id])}}"
                          method="post">
                        {{csrf_field()}}
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-sm-2"></div>
                                <label for="inputEmail3" class="col-sm-2 col-form-label">
                                    {{__("Name Permission")}}
                                    <span style="color: red; font-weight: bold"> (*) </span>
                                </label>
                                <div class="col-sm-6">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Name Permission"
                                        name="name"
                                        value="{{old('name', isset($permission) ? $permission->name: null)}}"
                                    >
                                    @if($errors->has('name'))
                                        <p style="color: red"> {{$errors->first('name')}} </p>
                                    @endif
                                </div>
                                <div class="col-sm-2"></div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2"></div>
                                <label for="inputPassword3" class="col-sm-2 col-form-label">
                                    {{__("Permission")}}
                                    <span style="color: red; font-weight: bold"> (*) </span>
                                </label>
                                <div class="col-sm-6">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Permission"
                                        name="permission"
                                        value="{{old('permission', isset($permission) ? $permission->permission: null)}}"
                                    >
                                    @if($errors->has('permission'))
                                        <p style="color: red"> {{$errors->first('permission')}} </p>
                                    @endif
                                </div>

                                <div class="col-sm-2"></div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="form-group row">
                                <div class="col-sm-4">
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-primary float-left">
                                        <i class="fa fa-save"></i>
                                        {{__("Update Permission")}}
                                    </button>
                                </div>
                                <div class="col-sm-2">
                                    <button
                                        type="reset"
                                        class="btn btn-default float-lg-right"
                                    >
                                        <i class="fas fa-sync"></i>
                                        Reset Form
                                    </button>
                                </div>
                                <div class="col-sm-2">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
            <!-- /.card -->
        </section>
@endsection
