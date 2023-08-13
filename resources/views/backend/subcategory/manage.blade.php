@extends('backend.master')
@section('body')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Table</h4>
                    <h6 class="card-subtitle">Data table example</h6>
                    <div class="table-responsive m-t-40">
                        <p class="text-center text-success">{{Session::get('message')}}</p>
                        <table id="myTable" class="table table-striped border">
                            <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Category Name</th>
                                <th>Sub Category Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subcategories as $subcategory)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$subcategory->category->name}}</td>
                                    <td>{{$subcategory->name}}</td>
                                    <td>{{$subcategory->description}}</td>
                                    <td><img src="{{asset($subcategory->image)}}" alt="{{$subcategory->name}}" height="50" width="80"/></td>
                                    <td>{{$subcategory->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    <td>
                                        <a href="{{route('subcategory.edit', ['id' => $subcategory->id])}}" class="btn btn-success btn-sm">
                                            <i class="ti-reddit"></i>
                                        </a>
                                        <a href="{{route('subcategory.delete', ['id' => $subcategory->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this');">
                                            <i class="ti-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
