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
          
         @forelse($tables as $table)
         <div class="col-sm-6 col-md-8 col-lg-12" >
           <div class="card">
               <div class="card-header">
                 <h3 class="card-title ms-5">Chash View</h3>
               </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <h4>Tabale Name : <span style="font-weight: 500; color: green">{{$table->number}}</span></h4>
                 <h5>Status : <span style="color: red;">No Cash</span></h5>
               </div>
              <!-- /.card-body -->
               <div class="card-footer">
                 <a href="/bill/{{$table->id}}/detail" class="btn btn-warning">View Cash</a>
               </div>
            </div>
            <!-- /.card -->
          </div>
            @empty
             <h2>Nothing...</h2>
            @endforelse
        </div>
      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
