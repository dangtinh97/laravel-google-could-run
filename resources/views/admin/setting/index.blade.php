@extends('admin.master')
@section('title')
    {{'Setting'}}
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Configuration</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Config</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @include('admin.partial.alert')
                        <form
                            class="form-horizontal"
                            action="{{route('setting.store')}}"
                            method="post"
                            enctype="multipart/form-data"
                        >
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                                        <b>{{__("Information")}}</b></h3>
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm">
                                            <input type="hidden"
                                                   value="{{$setting->count() > 0 ? $setting[0]->id : '' }}" name="id">
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="" class="col-sm-2 control-label">
                                        <i class="fas fa-gavel"></i> {{__("Title")}}
                                    </label>
                                    <div class="col-sm-6">
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="title"
                                            placeholder="Title"
                                            value="{{old('title', $setting->count() > 0 ? $setting[0]->title : '')}}"
                                        >
                                        @if($errors->has('title'))
                                            <p style="color: red"> {{$errors->first('title')}} </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="" class="col-sm-2 control-label">
                                        <i class="fas fa-map-marker-alt"></i> {{__("Address")}}
                                    </label>
                                    <div class="col-sm-6">
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="address"
                                            placeholder="Address"
                                            value="{{old('address', $setting->count() > 0 ? json_decode($setting[0]->profile)->address : '')}}"
                                        >
                                        @if($errors->has('address'))
                                            <p style="color: red"> {{$errors->first('address')}} </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="" class="col-sm-2 control-label">
                                        <i class="fas fa-phone"></i> {{__("Phone")}}
                                    </label>
                                    <div class="col-sm-6">
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="phone"
                                            placeholder="Phone"
                                            value="{{old('phone', $setting->count() > 0 ? json_decode($setting[0]->profile)->phone : '')}}"
                                        >
                                        @if($errors->has('phone'))
                                            <p style="color: red"> {{$errors->first('phone')}} </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="" class="col-sm-2 control-label">
                                        <i class="fas fa-address-book"></i> {{__("Contact")}}
                                    </label>
                                    <div class="col-sm-6">
                                    <textarea
                                        id="inputDescription"
                                        class="form-control"
                                        rows="5"
                                        name="contact"
                                        placeholder="Contact"
                                    >{{old('contact', $setting->count() > 0 ? json_decode($setting[0]->profile)->contact : '')}}</textarea>
                                        @if($errors->has('contact'))
                                            <p style="color: red"> {{$errors->first('contact')}} </p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="card-header">
                                    <h2 class="card-title">
                                        <i class="fa fa-camera-retro"></i>
                                        <b>{{__("Images")}}</b></h2>
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm">
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="" class="col-sm-2 control-label">
                                        <i class="fas fa-home"></i> {{__("Favicon")}}
                                    </label>
                                    <div class="col-sm-5">
                                        <input
                                            type="file"
                                            class="form-control"
                                            name="favicon"
                                            id="favicon"
                                        >
                                        <br>

                                        <img
                                            id="target_favicon"
                                            {{old('title', $setting->count() > 0 ? $setting[0]->title : '')}}
                                            src="{{$setting->count() > 0  ? asset($setting[0]->favicon) : asset('images/setting/favicon.jpg')}}"
                                            alt="Favicon image"
                                            width="100px"
                                            height="100px"
                                        />

                                        @if($errors->has('favicon'))
                                            <p style="color: red"> {{$errors->first('favicon')}} </p>
                                        @endif
                                    </div>
                                    <div class="col-sm-1">100 x 100</div>
                                </div>
                                <br>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label class="col-sm-2 control-label">
                                        <i class="far fa-image"></i> {{__("Logo")}}
                                    </label>
                                    <div class="col-sm-6">
                                        <input
                                            type="file"
                                            class="form-control"
                                            name="logo"
                                            id="logo"
                                        >
                                        <br>
                                        <img
                                            id="target_logo"
                                            src="{{$setting->count() ? asset($setting[0]->logo) : asset('images/setting/logo.jpg')}}"
                                            height="200px"
                                        />
                                        <br>

                                        @if($errors->has('logo'))
                                            <p style="color: red"> {{$errors->first('logo')}} </p>
                                        @endif
                                    </div>
                                </div>
                                <br>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="" class="col-sm-2 control-label">
                                        <i class="fas fa-images"></i> {{__("Banner")}}
                                    </label>
                                    <div class="col-sm-6">
                                        <input
                                            type="file"
                                            class="form-control"
                                            name="banner"
                                            id="banner"
                                        >
                                        <br>
                                        <img id="target_banner"
                                             src="{{$setting->count() > 0 ? asset($setting[0]->banner) : asset('images/setting/banner.jpg')}}"
                                             alt="Banner image"
                                             height="300px"
                                        />
                                        <input type="hidden" name="banner_curr"
                                        >
                                        <br>
                                        @if($errors->has('banner'))
                                            <p style="color: red"> {{$errors->first('banner')}} </p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="card-header">
                                    <h2 class="card-title">
                                        <i class="fa fa-link" aria-hidden="true"></i>
                                        <b>{{__("Links")}}</b>
                                    </h2>
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="" class="col-sm-2 control-label">
                                        <i class="fab fa-facebook-square"></i> {{__("Link facebook")}}
                                    </label>
                                    <div class="col-sm-6">
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="facebook"
                                            placeholder="link facebook"
                                            value="{{old('facebook', $setting->count() > 0 ? json_decode($setting[0]->links)->facebook : '')}}"
                                        >
                                        @if($errors->has('facebook'))
                                            <p style="color: red"> {{$errors->first('facebook')}} </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="" class="col-sm-2 control-label">
                                        <i class="fab fa-youtube-square"></i> {{__("Link youtube")}}
                                    </label>
                                    <div class="col-sm-6">
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="youtube"
                                            placeholder="Link youtube"
                                            value="{{old('youtube', $setting->count() > 0 ? json_decode($setting[0]->links)->youtube : '')}}"
                                        >
                                        @if($errors->has('youtube'))
                                            <p style="color: red"> {{$errors->first('youtube')}} </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="" class="col-sm-2 control-label">
                                        <i class="fab fa-twitter-square"></i> {{__("Link twitter")}}
                                    </label>
                                    <div class="col-sm-6">
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="twitter"
                                            placeholder="Link twitter"
                                            value="{{old('twitter', $setting->count() > 0 ? json_decode($setting[0]->links)->twitter : '')}}"
                                        >
                                        @if($errors->has('twitter'))
                                            <p style="color: red"> {{$errors->first('twitter')}} </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="" class="col-sm-2 control-label">
                                        <i class="fab fa-instagram"></i> {{__("Link instagram")}}
                                    </label>
                                    <div class="col-sm-6">
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="instagram"
                                            placeholder="Link instagram"
                                            value="{{old('instagram', $setting->count() > 0 ? json_decode($setting[0]->links)->instagram : '')}}"
                                        >
                                        @if($errors->has('instagram'))
                                            <p style="color: red"> {{$errors->first('instagram')}} </p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-info"><i
                                            class="fa fa-save"> </i> {{__("Save Configuration")}} </button>
                                    <div class="col-sm-3"></div>
                                </div>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
