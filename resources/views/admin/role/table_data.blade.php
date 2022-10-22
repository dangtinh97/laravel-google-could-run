<table class="table table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th width="600px">Role</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($roles as $role)
        <tr>
            <td>
                <div class="form-group clearfix">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary{{$role->id}}" name="status">
                        <label for="checkboxPrimary{{$role->id}}">
                            {{$role->id}}
                        </label>
                    </div>
                </div>
            </td>
            <td>{{$role->name}}</td>
            <td>
                @foreach($role->permissions as $key => $item)
                    <span class="badge badge-info">{{ $item->name }}</span>
                @endforeach
            </td>
            <td>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#show-role{{$role->id}}">
                    <i class="fas fa-caret-square-up"></i>
                    Show
                </button>
                <div id="show-role{{$role->id}}" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Detail Role</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <table class="table">
                                    <tr>
                                        <td>Role Name :</td>
                                        <td><b>{{$role->name}}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Permission :</td>
                                        <td>
                                            <b>
                                                @foreach($role->permissions as $key => $item)
                                                    <div class="badge badge-info">{{ $item->name }}</div> <br/>
                                                @endforeach
                                            </b>
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
                @can('role_edit')
                    <a href="{{route('role.edit', ['id' => $role->id])}}" class="btn btn-primary">
                        <i class="fas fa-edit"></i>
                        {{__('Edit')}}
                    </a>
                @endcan
                @can('role_delete')
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#delete-role{{$role->id}}">
                        <i class="fas fa-trash-alt"></i>
                        Detele
                    </button>
                    <!-- Modal -->
                    <div id="delete-role{{$role->id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Delete Role</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you want to delete <b>{{$role->name}}</b> ?</p>
                                </div>
                                <div class="modal-footer">
                                    <a
                                        href="{{route('role.destroy', ['id' => $role->id])}}"
                                        class="btn btn-success">OK</a>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>

                        </div>
                    </div>
                @endcan
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
