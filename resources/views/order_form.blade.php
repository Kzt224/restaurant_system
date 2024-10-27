
@extends('layouts.ordermaster')

@section('content')

  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Waiter Panal</h1>

            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      @if(session('message'))
            <div class="alert alert-success">
               {{session('message')}}
            </div>
          @endif
      <form action="{{route('order.submit')}}" method="POST">
        <div class="sticky-top">
         <select class="form-select  " aria-label="Default select example" name="table" required>
              <option>Select  Table Name</option>
                  @foreach($tables as $table)
                  <option value="{{$table->id}}">{{$table->number}}</option>
                  @endforeach
            </select>
             <input type="submit" class="btn btn-success"><br><br>
        </div>
      
        @csrf
        
        <div class="row">
        @foreach($errors->all() as $error)
           <li>{{ $error }}</li>
       @endforeach
          @foreach($dishes as $dish)
          <div class="col-lg-6">
            <div class="card">
             <div class="card-body">
                 <img src="{{url('/images/'.$dish->image)}}" class="img-circle" alt="User Image" style="width: 100px ;height: 100px; margin-left: 20px;margin-top: 25px;!important;">
                  <h2 class="card-title">{{$dish->name}}</h2><br>
                  <p class="card-text">
                       
                  </p>
                    <h5>Price: {{$dish->price}} /Kyats</h5>
                    <input type="hidden" name="price[{{$dish->id}}]" value="{{$dish->price}}">
                   <label for="Qty">Qty</label>
                   <!-- <input type="number" name="Qty[{{$dish->id}}]" value=""><br> -->
                   <input type="number" value="" step="1" min="0" max="10" name="Qty[{{$dish->id}}]">
             <!-- card body -->
              </div>
            <!-- card -->
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
          @endforeach
          </form>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@endsection
<script>
  $('input').each(function () {

 $(this).number();

});
</script>
    

