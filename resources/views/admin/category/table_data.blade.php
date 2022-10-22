<table class="table table-hover text-nowrap">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Parent</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>
                <div class="form-group clearfix">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary.{{$category->id}}" name="category_id">
                        <label for="checkboxPrimary.{{$category->id}}">
                            {{$category->id}}
                        </label>
                    </div>
                </div>
            </td>
            <td>{{$category->name}}</td>
            <td>
                {{$category->parent_id}}
            </td>
            <td>
                @if($category->status == 0)
                    <span class="badge badge-danger">{{'Disable'}}</span>
                @else
                    <span class="badge badge-success">{{'Enable'}}</span>
                @endif
            </td>
            <td>
                <button type="button" class="btn btn-success" data-toggle="modal"
                        data-target="#show-category{{$category->id}}">
                    <i class="fas fa-caret-square-up"></i>
                    Show
                </button>
                <div id="show-category{{$category->id}}" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Detail Category</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <table class="table">
                                    <tr>
                                        <td>Name :</td>
                                        <td><b>{{$category->name}}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Parent :</td>
                                        <td><b>{{$category->parent_id}}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Status :</td>
                                        <td>
                                            @if($category->status == 0)
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
                @can('category_edit')
                    <a href="{{route('category.edit', ['id' => $category->id])}}" class="btn btn-primary">
                        <i class="fas fa-edit"></i>
                        {{__('Edit')}}
                    </a>
                @endcan
                @can('category_delete')
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#delete{{$category->id}}">
                        <i class="fas fa-trash-alt"></i>
                        Detele
                    </button>
                    <!-- Modal -->
                    <div id="delete{{$category->id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Delete User</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you want to delete <b>{{$category->name}}</b> ?</p>
                                </div>
                                <div class="modal-footer">
                                    <a
                                        href="{{route('category.destroy', ['id' => $category->id])}}"
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
    </tbody>
</table>
