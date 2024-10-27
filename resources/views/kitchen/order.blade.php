@extends('layouts.master')

@section('content')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Kitchen Panal</h1>
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
                 <h3 class="card-title">Order Table</h3>
               </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <table id="orders" class="table table-bordered table-striped">
                  <thead>
                   <tr>
                    <th>Dishes</th>
                    <th>Table Name</th>
                    <th>Status</th> 
                    <th>Actions</th> 
                   </tr>
                  </thead>
                  <tbody>
                   @foreach($orders as $order)
                      <tr>
                        <td>{{$order->dishes->name}}</td>
                        <td>{{$order->table_id}}</td>
                        <td>{{$status[$order->status]}}</td>
                        <td>
                         <a href="/kitchen/{{$order->id}}/approve" class="btn btn-warning">Approve</a>
                         <a href="/kitchen/{{$order->id}}/cancle" class="btn btn-danger">Cancle</a>
                         <a href="/kitchen/{{$order->id}}/ready" class="btn btn-success">Ready</a>
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
    $('#orders').DataTable({
      "searching" : false,
      "pageLength": 3,
      "responsive": true,
    });
  });
</script>