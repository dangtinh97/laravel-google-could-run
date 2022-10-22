@extends('admin.master')
@section('title')
    {{'Create Product'}}
@endsection

@section('mycss')
    <link rel="stylesheet" href="{{asset('template-admin/css/style.css')}}">
{{--    <script src="//cdn.ckeditor.com/4.14.1/full/ckeditor.js"></script>--}}
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>

@endsection

@section('content')
    <div class="content-wrapper">
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
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            {{__("Create Product")}}
                        </h3>
                        <div class="card-tools">
                            <div class="card-tools">
                                <a class="btn btn-primary" href="{{route('product.index')}}">
                                    <i class="fa fa-arrow-left"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                            <b>Infomation</b>
                        </h3>

                    </div>
                    <form
                        class="form-horizontal"
                        action="{{route('product.store')}}"
                        method="post"
                        enctype="multipart/form-data"
                    >
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
                                    {{__("Parent")}}
                                    <span style="color: red; font-weight: bold"> (*) </span>
                                </label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="parent">
                                        <option value="" >-- Select Category --</option>
                                        {{cateParent($categories)}}

                                    </select>
                                    @if($errors->has('parent'))
                                        <p style="color: red"> {{$errors->first('parent')}} </p>
                                    @endif
                                </div>
                                <div class="col-sm-2"></div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2"></div>
                                <label for="inputEmail3" class="col-sm-2 col-form-label">
                                    {{__("Description")}}
                                    <span style="color: red; font-weight: bold"> (*) </span>
                                </label>
                                <div class="col-sm-6">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Description"
                                        name="description"
                                        value="{{old('description')}}"
                                    />

                                    @if($errors->has('description'))
                                        <p style="color: red"> {{$errors->first('description')}} </p>
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
                                        name="image"
                                        id="image"
                                        value="{{old('image')}}"
                                    />
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
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fa fa-file-alt" aria-hidden="true"></i>
                                    <b>Content </b></h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label></label>

                                <div id="toolbar-container"></div>
                                <textarea name="content" id="editor1"></textarea>
                            </div>


                        </div>
                        <div class="card-footer">
                            <div class="form-group row">
                                <div class="col-sm-1">
                                </div>
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-primary float-left">
                                        <i class="fa fa-save"></i>
                                        {{__("Save Product")}}
                                    </button>
                                </div>
                                <div class="col-sm-2">
                                    <button
                                        type="reset"
                                        class="btn btn-default float-lg-right"
                                    >
                                        <i class="fas fa-sync"></i>
                                        Reset
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
    <script src="{{asset('./node_modules/@ckeditor/ckeditor5-build-decoupled-document/build/ckeditor.js')}}"></script>
{{--    editor--}}
    <script>
        CKEDITOR.replace( 'editor1' );

        window.onload = function() {
            CKEDITOR.replace( 'editor1', {
                // language: 'fr',
                // uiColor: '#9AB8F3',
                // customConfig: '/custom/ckeditor_config.js'
            });
        };

    {{--    status--}}
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
