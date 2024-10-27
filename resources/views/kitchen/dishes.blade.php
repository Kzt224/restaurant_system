@extends('layouts.master')


@section('content')
 

     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Kitchen Panal</h1><br>
             <a href="/dish/create" class="btn btn-secondary">Add Dish</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6 col-md-8 col-lg-12" >
          <div class="card">
               <div class="card-header">
                 <h3 class="card-title">Dishes Table</h3>
               </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <table id="dishes" class="table table-bordered table-striped">
                  <thead>
                   <tr>
                    <th>Dish Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Actions</th>  
                   </tr>
                  </thead>
                  <tbody>
                   @foreach($dishes as $dish)
                      <tr>
                        <td>{{$dish->name}}</td>
                        <td>{{$dish->category->name}}</td>
                        <td>{{$dish->price}}</td>
                        <td>
                          <div class="form-row">
                          <a href="/dish/{{$dish->id}}/edit" class="btn btn-warning" style="height: 40px;margin-right: 10px">Edit</a>
                            <form action="/dish/{{$dish->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                          </form>
                          </div>
                        </td>
                      </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
<script src="plugins/jquery/jquery.min.js"></script>
<script>
  $(function () {
    $('#dishes').DataTable({
      
      "pageLength": 3,
      "responsive": true,
    });
  });
</script>