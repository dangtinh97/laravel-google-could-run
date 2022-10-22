@foreach($banners as $banner)
    <tr>
        <td>
            <div class="form-group clearfix">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" id="checkboxPrimary.{{$banner->id}}" name="banner_id">
                    <label for="checkboxPrimary.{{$banner->id}}">
                        {{$banner->id}}
                    </label>
                </div>
            </div>
        </td>
        <td>{{$banner->title}}</td>
        <td>
            <img src="{{asset($banner->image)}}" alt="" width="300px" />
        </td>
        <td>
            @if($banner->status == 0)
                <span class="badge badge-danger">{{'Disable'}}</span>
            @else
                <span class="badge badge-success">{{'Enable'}}</span>
            @endif
        </td>
        <td>
            @can('banner_edit')
                <a href="{{route('banner.edit', ['id' => $banner->id])}}" class="btn btn-primary">
                    <i class="fas fa-edit"></i>
                    {{__('Edit')}}
                </a>
            @endcan
            @can('banner_delete')
                <button type="button" class="btn btn-danger" data-toggle="modal"
                        data-target="#delete{{$banner->id}}">
                    <i class="fas fa-trash-alt"></i>
                    Detele
                </button>
                <!-- Modal -->
                <div id="delete{{$banner->id}}" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Delete User</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <p>Are you want to delete <b>{{$banner->name}}</b> ?</p>
                            </div>
                            <div class="modal-footer">
                                <a
                                    href="{{route('banner.destroy', ['id' => $banner->id])}}"
                                    class="btn btn-success">OK</a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
        </td>
    </tr>

@endforeach
