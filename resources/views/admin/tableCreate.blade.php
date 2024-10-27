@extends('layouts.master')


@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin Panel</h1><br>
            
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
                <h3 class="card-title">Create a New Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
                <form action="/table" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="form-group">
                      <label for="Name" class="form-label">Table Number</label>
                       <input type="text" name="table_name" class="form-control" placeholder="Name" id="Name" value="{{old('name')}}" require><br>
                       <input type="hidden" name="status" value="0">
                          <button class="btn btn-success" type="submit">Submit</button>
                          <a href="/table" class="btn btn-warning">Back</a>
                  </div>
                </form>
                 
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          </div>
        </div>
        <div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->

@endsection
