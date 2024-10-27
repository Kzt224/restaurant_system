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
             <a href="/table/create" class="btn btn-secondary">Add New Table</a>
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
                 <h3 class="card-title"> Table</h3>
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
                    <th>Id</th>
                    <th>Tabale Name</th>
                    <th>Created_at</th>
                    <th>Actions</th>  
                   </tr>
                  </thead>
                  <tbody>
                   @foreach($tables as $table)
                      <tr>
                        <td>{{$table->id  }}</td>
                        <td>{{$table->number}}</td>
                        <td>{{$table->created_at}}</td>
                        <td>
                          <div class="form-row">
                          <a href="/table/{{$table->id}}/edit" class="btn btn-warning">Edit</a>
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

