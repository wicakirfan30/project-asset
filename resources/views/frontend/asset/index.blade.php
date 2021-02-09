<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nissin Transport Indonesia Asset</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">    
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.8/css/fixedHeader.bootstrap4.min.css">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">NIssin Indonesia</a>
            </div>
        </ul>
    </div>
</nav>
<div class="container-fluid">
    <h1>Asset List</h1>
    <p class="letter-5"></p>
    @if (session('status'))
        <div class="alert alert-primary" role="alert">
            {{session('status')}}
        </div>
    @endif
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add Data</button>
    <button type="button" class="btn btn-primary">Delete Data</button>
    <p class="letter-5"></p>
        <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
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
                        <td>{{$asset->no_asset}}</td>
                        <td>{{$asset->id_categori}}</td>
                        <td>{{$asset->id_location}}</td>
                        <td>{{$asset->id_divisi}}</td>
                        <td>{{$asset->description}}</td>
                        <td>Rp. {{$asset->price}}</td>
                        <td>{{$asset->date_of_purchase}}</td>
                        <td><a href='#'>Details</a></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No. Asset</th>
                        <th>Category Asset</th>
                        <th>Office Location</th>
                        <th>Divisi</th>
                        <th>Description Asset</th>
                        <th>Price</th>
                        <th>Purchase Of Date</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.8/js/dataTables.fixedHeader.min.js"></script>
<script>
$(document).ready(function() {
    var table = $('#example').DataTable( {
        fixedHeader: true
    } );
} );
</script>

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
</body>
</html>