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
             <a href="/category/create" class="btn btn-secondary">Add Category</a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="/dishes">{{Request::segment(1)}}</a> </li>
              <li class="breadcrumb-item "><a href="/bill" >Bill</a></li>
            </ol>
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
                 <h3 class="card-title">Category Table</h3>
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
                    <th>Category Name</th>
                    <th>Created_at</th>
                    <th>Actions</th>  
                   </tr>
                  </thead>
                  <tbody>
                   @foreach($categories as $category)
                      <tr>
                        <td>{{$category->id - 2 }}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->created_at}}</td>
                        <td>
                          <div class="form-row">
                          <a href="/category/{{$category->id}}/edit" class="btn btn-warning">Edit</a>
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