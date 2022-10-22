@extends('admin.master')
@section('title')
    {{'Create User'}}
@endsection

@section('mycss')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('template-admin/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('template-admin/css/style.css')}}">
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
                            <h1>User</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">User</li>
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
                            {{__("Create User")}}</h3>

                        <div class="card-tools">
                            <div class="card-tools">
                                <a class="btn btn-primary" href="{{route('user.index')}}"><i
                                        class="fa fa-arrow-left"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                    <form class="form-horizontal" action="{{route('user.store')}}" method="post"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-sm-2"></div>
                                <label for="inputEmail3" class="col-sm-2 col-form-label">
                                    {{__("User Name")}}
                                    <span style="color: red; font-weight: bold"> (*) </span>
                                </label>
                                <div class="col-sm-6">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="User Name"
                                        name="name"
                                        value="{{old('name')}}"
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
                                    {{__("Email")}}
                                    <span style="color: red; font-weight: bold"> (*) </span>
                                </label>
                                <div class="col-sm-6">
                                    <input
                                        type="email"
                                        class="form-control"
                                        placeholder="Email"
                                        name="email"
                                        value="{{old('email')}}"
                                    >
                                    @if($errors->has('email'))
                                        <p style="color: red"> {{$errors->first('email')}} </p>
                                    @endif
                                </div>
                                <div class="col-sm-2"></div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2"></div>
                                <label for="inputEmail3" class="col-sm-2 col-form-label">
                                    {{__("Password")}}
                                    <span style="color: red; font-weight: bold"> (*) </span>
                                </label>
                                <div class="col-sm-6">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Password"
                                        name="password"
                                        value="{{old('password')}}"
                                    >
                                    @if($errors->has('password'))
                                        <p style="color: red"> {{$errors->first('password')}} </p>
                                    @endif
                                </div>
                                <div class="col-sm-2"></div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2"></div>
                                <label for="inputEmail3" class="col-sm-2 col-form-label">{{__("Address")}}</label>
                                <div class="col-sm-6">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Address"
                                        name="address"
                                        value="{{old('address')}}"
                                    >
                                    @if($errors->has('address'))
                                        <p style="color: red"> {{$errors->first('address')}} </p>
                                    @endif
                                </div>
                                <div class="col-sm-2"></div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2"></div>
                                <label for="inputEmail3" class="col-sm-2 col-form-label">{{__("Phone")}}</label>
                                <div class="col-sm-6">
                                    <input
                                        type="number"
                                        class="form-control"
                                        placeholder="Phone"
                                        name="phone"
                                        value="{{old('phone')}}"
                                    >
                                    @if($errors->has('phone'))
                                        <p style="color: red"> {{$errors->first('phone')}} </p>
                                    @endif
                                </div>
                                <div class="col-sm-2"></div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2"></div>
                                <label for="inputPassword3"
                                       class="col-sm-2 col-form-label">{{__("Role Name")}}</label>
                                <div class="col-sm-6 select2-purple">
                                    <select
                                        class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}"
                                        name="roles[]"
                                        id="roles"
                                        multiple
                                    >
                                        @foreach($roles as $id => $roles)
                                            <option
                                                value="{{ $roles->id }}"
                                                {{ in_array($id, old('roles', [])) ? 'selected' : '' }}
                                            >
                                                {{ $roles->name }}
                                            </option>
                                        @endforeach
                                    </select>
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
                                                <input type="checkbox" id="myCheck" onclick="myFunction()"
                                                       name="status">
                                                <span class="slider round"></span>
                                            </label>
                                            <label style="margin-top: 8px">
                                                <p id="text" style="display:none; font-size: 20px">Enable</p>
                                                <p id="text2" style="display:block; font-size: 20px">Disable</p>
                                            </label>
                                        </div>
                                    </div>
                                    @if($errors->has('status'))
                                        <p style="color: red"> {{$errors->first('status')}} </p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2"></div>
                                <label for="inputPassword3"
                                       class="col-sm-2 col-form-label">{{__("Image")}}</label>
                                <div class="col-sm-6 ">
                                    <input
                                        type="file"
                                        class="form-control"
                                        placeholder="Images"
                                        name="images"
                                    >
                                    @if($errors->has('images'))
                                        <p style="color: red"> {{$errors->first('images')}} </p>
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
                                        {{__("Save User")}}
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

        });

        function myFunction() {
            var checkBox = document.getElementById("myCheck");
            var text = document.getElementById("text");
            if (checkBox.checked == true) {
                text.style.display = "block";
                text2.style.display = "none";
            } else {
                text.style.display = "none";
                text2.style.display = "block";
            }
        }

    </script>


@endsection
