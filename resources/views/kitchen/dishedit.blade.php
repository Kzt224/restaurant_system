@extends('layouts.master')


@section('content')
 
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Kitchen Panel</h1><br>
            
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
                <h3 class="card-title">Edit A dish</h3>
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
                <form action="/dish/{{$dish->id}}" method="POST" enctype="multipart/form-data">
                     @csrf
                     @method('PUT')
                     <div class="form-group">
                      <label for="Name" class="form-label">Name</label>
                       <input type="text" name="name" class="form-control" placeholder="Name" id="Name" value="{{old('name',$dish->name)}}" require><br>
                        <label for="cat" class="form-label">Category</label>
                          <select name="category" id="cat" class="form-control">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                              <option value="{{$category->id}}" {{$category->id == $dish->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                          </select><br>
                          <label for="Price" class="form-label">Price</label>
                          <input type="number" name="price" class="form-control" placeholder="Price" id="price" value="{{old('price',$dish->price)}}" require><br>
                          <img src="{{url('/images/'.$dish->image)}}" alt="image" width="150px"><br>
                           <label for="image">Image</label>
                           <div class="form-group">
                             <input type="file" name="dish_image" id="image">
                           </div>
                          <button class="btn btn-success" type="submit">Submit</button>
                          <a href="/dish" class="btn btn-warning">Back</a>
                  </div>
                </form>
                 
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          </div>
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->

    </div>
    <!-- /.content -->
</div>
  </div>


  <!-- /.content-wrapper -->

@endsection
