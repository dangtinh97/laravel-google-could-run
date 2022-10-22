@extends('admin.master')
@section('title')
    {{'Edit Category'}}
@endsection

@section('mycss')
    <link rel="stylesheet" href="{{asset('template-admin/css/style.css')}}">
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">{{__("Edit Category")}}</h3>
                    </div>
                    <form class="form-horizontal" action="{{route('category.update', [$category->id])}}" method="post"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-sm-2"></div>
                                <label for="inputEmail3" class="col-sm-2 col-form-label">
                                    {{__("Name")}}
                                    <span style="color: red; font-weight: bold"> (*) </span>
                                </label>
                                <div class="col-sm-6">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Name"
                                        name="name"
                                        value="{{old('name', isset($category) ? $category->name : '')}}"
                                    >
                                    @if($errors->has('name'))
                                        <p style="color: red"> {{$errors->first('name')}} </p>
                                    @endif
                                </div>
                                <div class="col-sm-2"></div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2"></div>
                                <label for="inputEmail3" class="col-sm-2 col-form-label">
                                    {{__("Parent")}}
                                </label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="parent">
                                        <option value="0">-- Root Parent --</option>
                                        {{cateParent($categories, 0, '--', $category->parent_id)}}
                                    </select>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>

                            {{--                            <div class="form-group row">--}}
                            {{--                                <div class="col-sm-2"></div>--}}
                            {{--                                <label for="inputEmail3" class="col-sm-2 control-label">--}}
                            {{--                                    {{__("Type")}} :--}}
                            {{--                                </label>--}}
                            {{--                                <div class="col-sm-6">--}}
                            {{--                                    <div class="form-group clearfix">--}}
                            {{--                                        <div class="icheck-primary d-inline">--}}
                            {{--                                            <select class="form-control">--}}
                            {{--                                                <option value="1">Category 1</option>--}}
                            {{--                                                <option value="2">Category 2</option>--}}
                            {{--                                            </select>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                    @if($errors->has('status'))--}}
                            {{--                                        <p style="color: red"> {{$errors->first('status')}} </p>--}}
                            {{--                                    @endif--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}

                            <div class="form-group row">
                                <div class="col-sm-2"></div>
                                <label for="inputEmail3" class="col-sm-2 control-label">
                                    {{__("Status")}} :
                                </label>
                                <div class="col-sm-6">
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <label class="switch">
                                                <input
                                                    type="checkbox"
                                                    id="status"
                                                    onclick="myFunction()"
                                                    name="status"
                                                    @if($category->status == 1)
                                                        {{"checked"}}
                                                    @endif
                                                >
                                                <span class="slider round"></span>
                                            </label>
                                            <label style="margin-top: 8px">
                                                @if($category->status == 1)
                                                    <p id="enable" style="display:block; font-size: 20px">Enable</p>
                                                    <p id="disable" style="display:none; font-size: 20px">Disable</p>
                                                @else
                                                    <p id="enable" style="display:none; font-size: 20px">Enable</p>
                                                    <p id="disable" style="display:block; font-size: 20px">Disable</p>
                                                @endcan
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
                                        {{__("Save Category")}}
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
