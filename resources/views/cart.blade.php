
@extends('layouts.ordermaster')


@section('content')


   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Check Cart</h1><br>
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
                 <h3 class="card-title">Cart</h3><br><br>
                 <a href="/order" class="btn btn-warning">Back</a>
               </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif -->
                <table id="dishes" class="table table-bordered table-striped">
                  <thead>
                   <tr>
                    <th>Dish Name</th>
                    <th>table_id</th>
                    <th>qty</th>
                    <th>Actions</th>  
                   </tr>
                  </thead>
                  @if(isset($cart))
                    <tbody>
                   @foreach($cart as $cat)
                      <tr>
                        <td>{{($cart['name'])}}</td>
                        <td>{{($cart['table_id'])}}</td>
                        <td>{{($cart['qty'])}}</td>
                        <td>
                          <div class="form-row">
                          <a href="" class="btn btn-success" >Order Confirm</a>
                           <a href="/cart/{{($cart['order_id'])}}" class="btn btn-danger">Delete</a>
                          </div>
                        </td>
                      </tr>
                     @endforeach
                  </tbody>
                  

                  @endif
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

<!-- style="height: 40px;margin-right: 10px" -->
