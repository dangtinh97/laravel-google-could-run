@extends('admin.master')
@section('title')
    {{'Update Role'}}
@endsection
@section('mycss')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('template-admin/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet"
          href="{{asset('template-admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"')}}">
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Role</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">update</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <div class="container-fluid">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fa fa-edit" aria-hidden="true"></i>{{__("Update Role")}}</h3>
                        <div class="card-tools">
                            <div class="card-tools">
                                <a class="btn btn-primary" href="{{route('permission.index')}}">
                                    <i class="fa fa-arrow-left"></i>
                                    Back
                                </a>
                            </div>
                        </div>
                    </div>
                    <form class="form-horizontal" action="{{route('role.update',[$role->id])}}" method="post">
                        {{csrf_field()}}
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-sm-2"></div>
                                <label for="inputEmail3" class="col-sm-2 col-form-label">
                                    {{__("Name Role")}}
                                    <span style="color: red; font-weight: bold"> (*) </span>
                                </label>
                                <div class="col-sm-6">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Name Role"
                                        name="name"
                                        value="{{old('name', isset($role) ? $role->name: null)}}"
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
                                    {{__("Permission Name")}}
                                </label>
                                <div class="col-sm-6 select2-purple">
                                    <select
                                        class="form-control select2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}"
                                        name="permissions[]"
                                        id="permissions"
                                        multiple
                                    >
                                        @foreach($permissions as $id => $permissions)
                                            <option value="{{ $permissions->id }}"
                                                {{
                                                    (in_array($permissions->id, old('permissions', [])) ||
                                                     $role->permissions->contains($permissions->id)) ? 'selected' : ''
                                                }}
                                            >{{ $permissions->name }}</option>
                                        @endforeach
                                    </select>
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
                                        {{__("Update Role")}}
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
    </div>
@endsection

@section('style_script')
    <!-- Select2 -->
    <script src="{{asset('template-admin/plugins/select2/js/select2.full.min.js')}}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

        })
    </script>
@endsection
