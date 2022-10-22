@extends('admin.master')
@section('title')
    {{'Create Banner'}}
@endsection

@section('mycss')
    <link rel="stylesheet" href="{{asset('template-admin/css/style.css')}}">
@endsection

@section('content')
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            {{__("Create Banner")}}
                        </h3>
                        <div class="card-tools">
                            <div class="card-tools">
                                <a class="btn btn-primary" href="{{route('permission.index')}}">
                                    <i class="fa fa-arrow-left"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                    <form class="form-horizontal" action="{{route('banner.store')}}" method="post"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-sm-2"></div>
                                <label for="inputEmail3" class="col-sm-2 col-form-label">
                                    {{__("Title")}}
                                    <span style="color: red; font-weight: bold"> (*) </span>
                                </label>
                                <div class="col-sm-6">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Title"
                                        name="title"
                                        value="{{old('title')}}"
                                    >
                                    @if($errors->has('title'))
                                        <p style="color: red"> {{$errors->first('title')}} </p>
                                    @endif
                                </div>
                                <div class="col-sm-2"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2"></div>
                                <label for="inputEmail3" class="col-sm-2 col-form-label">
                                    {{__("Image")}}
                                    <span style="color: red; font-weight: bold"> (*) </span>
                                </label>
                                <div class="col-sm-6">
                                    <input
                                        type="file"
                                        class="form-control"
                                        placeholder="Image"
                                        name="image"
                                        value="{{old('image')}}"
                                    >
                                    @if($errors->has('image'))
                                        <p style="color: red"> {{$errors->first('image')}} </p>
                                    @endif
                                </div>
                                <div class="col-sm-2"></div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2"></div>
                                <label for="inputEmail3" class="col-sm-2 control-label">
                                    {{__("Status")}} :
                                </label>
                                <div class="col-sm-6">
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <label class="switch">
                                                <input type="checkbox" id="status" onclick="myFunction()"
                                                       name="status">
                                                <span class="slider round"></span>
                                            </label>
                                            <label style="margin-top: 8px">
                                                <p id="enable" style="display:none; font-size: 20px">Enable</p>
                                                <p id="disable" style="display:block; font-size: 20px">Disable</p>
                                            </label>
                                        </div>
                                    </div>
                                    @if($errors->has('status'))
                                        <p style="color: red"> {{$errors->first('status')}} </p>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="form-group row">
                                <div class="col-sm-4">
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-primary float-left">
                                        <i class="fa fa-save"></i>
                                        {{__("Save Banner")}}
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

@section('style_script')
    <script>
        function myFunction() {
            var status = document.getElementById("status");
            var enable = document.getElementById("enable");
            if (status.checked == true) {
                enable.style.display = "block";
                disable.style.display = "none";
            } else {
                enable.style.display = "none";
                disable.style.display = "block";
            }
        }

    </script>


@endsection
