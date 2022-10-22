
    @foreach($permissions as $permission)
        <tr>
            <td>
                <div class="form-group clearfix">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary{{$permission->id}}" name="{{$permission->id}}">
                        <label for="checkboxPrimary{{$permission->id}}">
                            {{$permission->id}}
                        </label>
                    </div>
                </div>
            </td>
            <td>{{$permission->name}}</td>
            <td>{{$permission->permission}}</td>
            <td>
                <button type="button" class="btn btn-success" data-toggle="modal"
                        data-target="#show-permission{{$permission->id}}">
                    <i class="fas fa-caret-square-up"></i>
                    Show
                </button>

                <div id="show-permission{{$permission->id}}" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Detail Permission</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <table class="table">
                                    <tr>
                                        <td>Name :</td>
                                        <td><b>{{$permission->name}}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Permission :</td>
                                        <td><b>{{$permission->permission}}</b></td>
                                    </tr>
                                </table>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                            </div>
                        </div>
                    </div>
                </div>
                @can('permission_edit')
                    <a href="{{route('permission.edit', ['id' => $permission->id])}}" class="btn btn-primary">
                        <i class="fas fa-edit"></i>
                        {{__('Edit')}}
                    </a>
                @endcan
                @can('permission_delete')
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#delete{{$permission->id}}">
                        <i class="fas fa-trash-alt"></i>
                        Detele
                    </button>
                    <div id="delete{{$permission->id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Delete Permission</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you want to delete <b>{{$permission->name}}</b> ?</p>
                                </div>
                                <div class="modal-footer">
                                    <a
                                        href="{{route('permission.destroy', ['id' => $permission->id])}}"
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
