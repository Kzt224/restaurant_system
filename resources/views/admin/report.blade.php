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
                <table id="" class="table table-bordered table-striped">
                  <thead>
                   <tr>
                    <th>Dishes</th>
                    <th>Qty</th> 
                    <th>Status</th>
                    <th>Price</th>
                   </tr>
                  </thead>
                  <tbody>
                   @foreach($orders as $dishes_name => $order)
                      <tr>
                        <td>{{$dishes_name}}</td>
                        <td>{{$order['qty']}}</td>
                        <td></td>
                        <td>{{$order['price']}}</td>
                      </tr>
                   @endforeach
                  </tbody>
                   <tr>
                     <td></td>
                     <td></td>
                     <td style="font-weight: bold;color: red;">Total</td>
                     <td  style="font-weight: bold;">
                        @if(isset($orders))
                            {{$orders->sum('price')}}
                        @endif
                     </td>
                   </tr>
                </table><br><br>
                <a href="/report/upload" class="btn btn-success">Upload</a>
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
