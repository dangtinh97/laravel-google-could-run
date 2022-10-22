<table class="table table-hover text-nowrap">
    <thead>
    <tr>
        <th>ID</th>
        <th>Category</th>
        <th>Title</th>
        <th>Description</th>
        <th>Image</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>
                <div class="form-group clearfix">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary.{{$product->id}}" name="product_id">
                        <label for="checkboxPrimary.{{$product->id}}">
                            {{$product->id}}
                        </label>
                    </div>
                </div>
            </td>
            <td>{{$product->category->name}}</td>
            <td>{{$product->title}}</td>
            <td>{{$product->description}}</td>
            <td>
                <img src="{{asset($product->image)}}" width="300px"/>
            </td>
            <td>
                @if($product->status == 0)
                    <span class="badge badge-danger">{{'Disable'}}</span>
                @else
                    <span class="badge badge-success">{{'Enable'}}</span>
                @endif
            </td>
            <td>
                <button type="button" class="btn btn-success" data-toggle="modal"
                        data-target="#show-product{{$product->id}}">
                    <i class="fas fa-caret-square-up"></i>
                    Show
                </button>
                <div id="show-product{{$product->id}}" class="modal fade" role="dialog">
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
                                        <td><b>{{$product->title}}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Parent :</td>
                                        <td><b>{{$product->description}}</b></td>
                                    </tr>
                                    <tr>
                                        <td>content :</td>
                                        <td><b>{!!  $product->content !!}</b></td>
                                    </tr>
                                    <tr>
                                        <td>profiles :</td>
                                        <td><b>{{$product->profiles}}</b></td>
                                    </tr>
                                    <tr>
                                        <td>image :</td>
                                        <td>
                                            <img src="{{asset($product->image)}}" width="200px"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Status :</td>
                                        <td>
                                            @if($product->status == 0)
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
                @can('product_edit')
                    <a href="{{route('product.edit', ['id' => $product->id])}}" class="btn btn-primary">
                        <i class="fas fa-edit"></i>
                        {{__('Edit')}}
                    </a>
                @endcan
                @can('product_delete')
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#delete{{$product->id}}">
                        <i class="fas fa-trash-alt"></i>
                        Detele
                    </button>
                    <!-- Modal -->
                    <div id="delete{{$product->id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Delete User</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you want to delete <b>{{$product->name}}</b> ?</p>
                                </div>
                                <div class="modal-footer">
                                    <a
                                        href="{{route('product.destroy', ['id' => $product->id])}}"
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
