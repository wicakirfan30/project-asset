
@extends('layouts.master')
@section('title','NTI Asset Management - ')
@section('content')

@push('page-styles')
<link rel="stylesheet" href="../node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">
<link rel="stylesheet" href="../node_modules/prismjs/themes/prism.css">
@endpush

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Asset List</h4>
                @if (session('status'))
                <div class="alert alert-primary" role="alert">
                    {{session('status')}}
                </div>
                @endif
            </div>
            
            <div class="card-body">
                <!-- Button trigger modal -->
            <button class="btn btn-primary col-0" data-toggle="modal" data-target=".bd-example-modal-lg">Add Data</button>
            <button class="btn btn-primary col-0">Delete Data</button>
            <p class=""></p>
                <div class="table-responsive">
                    <table class="table table-striped" id="table-2">
                        <thead>
                            <tr>
                                <th class="text-center">
                                <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                </div>
                                </th>
                                <th>No. Asset</th>
                                <th>Category Asset</th>
                                <th>Office Location</th>
                                <th>Divisi</th>
                                <th>Description Asset</th>
                                <th>Price</th>
                                <th>Purchase Of Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($asset as $asset)
                            <tr>
                                <td>
                                <div class="custom-checkbox custom-control">
                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                    <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                </div>
                                </td>
                                <td>{{$asset->no_asset}}</td>
                                <td>{{$asset->assetcategori->name_categori}}</td>
                                <td>{{$asset->officelocation->name_office}}</td>
                                <td>{{$asset->divisi->name_divisi}}</td>
                                <td>{{$asset->description}}</td>
                                <td>Rp. {{$asset->price}}</td>
                                <td>{{$asset->date_of_purchase}}</td>
                                <td><a href='#' class="btn btn-secondary">Details</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


    @push('js.lib')
        <!-- JS Libraies -->
        <script src="../node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="../node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>
        <script src="../node_modules/prismjs/prism.js"></script>
    @endpush

    @push('page.scripts')
        <script src="../assets/js/page/modules-datatables.js"></script>
        <script src="../assets/js/page/bootstrap-modal.js"></script>
    @endpush

@endsection

<!-- MODAL -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Data Asset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('add.asset')}}" id="add-asset" method="POST">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">No Asset</label>
                    <div class="col-sm-10">
                    <input name="noasset" type="text" class="form-control" id="inputEmail3" placeholder="No Asset">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Categori Asset</label>
                    <div class="col-sm-10">
                    <select name="categoriasset" type="select" id="inputEmail3" class="form-control">
                        <option value="">Choose...</option>
                        @foreach ($dropdown_categori as $key => $value)
                        <option value="{{ $key }}">
                        {{ $value }} 
                        </option>
                        @endforeach    
                    </select>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Divisi</label>
                    <div class="col-sm-10">
                    <select name="divisi" type="select" id="inputEmail3" class="form-control">
                    <option value="">Choose...</option>
                        @foreach ($dropdown_divisi as $key => $value)
                        <option value="{{ $key }}">
                        {{ $value }} 
                        </option>
                        @endforeach 
                    </select>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Asset Location</label>
                    <div class="col-sm-10">
                    <select name="assetlocation" type="select" id="inputEmail3" class="form-control">
                    <option value="">Choose...</option>
                        @foreach ($dropdown_location as $key => $value)
                        <option value="{{ $key }}">
                        {{ $value }} 
                        </option>
                        @endforeach 
                    </select>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                    <input name="description" type="text" class="form-control" id="inputEmail3" placeholder="Description">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Brand</label>
                    <div class="col-sm-10">
                    <input name="brand" type="text" class="form-control" id="inputEmail3" placeholder="Brand">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Model</label>
                    <div class="col-sm-10">
                    <input name="model" type="text" class="form-control" id="inputEmail3" placeholder="Model">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Product ID</label>
                    <div class="col-sm-10">
                    <input name="productid" type="text" class="form-control" id="inputEmail3" placeholder="Product ID">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                    <input name="price" type="text" class="form-control" id="inputEmail3" placeholder="Price">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Date Of Purchase</label>
                    <div class="col-sm-10">
                    <input name="datepurchase" type="date" class="form-control" id="inputEmail3">
                    </div>
                    </div>
                    <div class="modal-footer">
                    <button type="reset" class="btn btn-primary waves-effect">Reset</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


