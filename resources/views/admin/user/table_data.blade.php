<table class="table table-hover text-nowrap">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Role</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>
                <div class="form-group clearfix">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary.{{$user->id}}" name="user_id">
                        <label for="checkboxPrimary.{{$user->id}}">
                            {{$user->id}}
                        </label>
                    </div>
                </div>
            </td>
            <td>{{$user->name}}</td>
            <td>
                @foreach($user->roles as $key => $item)
                    <span class="badge badge-info">{{ $item->name }}</span>
                @endforeach
            </td>

            <td>
                @if(auth()->user()->id != $user->id)
                    <button type="button" class="btn btn-success" data-toggle="modal"
                            data-target="#show-user{{$user->id}}">
                        <i class="fas fa-caret-square-up"></i>
                        Show
                    </button>
                    <div id="show-user{{$user->id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Detail User</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <table class="table">
                                        <tr>
                                            <td>User Name :</td>
                                            <td><b>{{$user->name}}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Email :</td>
                                            <td><b>{{$user->email}}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Role :</td>
                                            <td>
                                                @foreach($user->roles as $key => $item)
                                                    <span class="badge badge-info">{{ $item->name }}</span> <br/>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Address :</td>
                                            <td>
                                                {{$user->profile !=null ? json_decode($user->profile)->address : null}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Phone :</td>
                                            <td>
                                                {{$user->profile !=null ? json_decode($user->profile)->phone : null}}
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Image :</td>
                                            <td>
                                                <img src="{{asset('/'.$user->image)}}" alt="" height="150px">
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Status :</td>
                                            <td>
                                                @if($user->status == 0)
                                                    <span class="badge badge-danger">{{'Disable'}}</span>
                                                @else
                                                    <span class="badge badge-success">{{'Enable'}}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @can('user_edit')
                        <a href="{{route('user.edit', ['id' => $user->id])}}" class="btn btn-primary">
                            <i class="fas fa-edit"></i>
                            {{__('Edit')}}
                        </a>
                    @endcan
                    @can('user_delete')
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#delete{{$user->id}}">
                            <i class="fas fa-trash-alt"></i>
                            Detele
                        </button>

                        <!-- Modal -->
                        <div id="delete{{$user->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Delete User</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you want to delete <b>{{$user->name}}</b> ?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <a
                                            href="{{route('user.destroy', ['id' => $user->id])}}"
                                            class="btn btn-success">OK</a>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endcan
                @else
                    {{''}}
                @endif
            </td>

        </tr>

    @endforeach
    </tbody>
</table>
