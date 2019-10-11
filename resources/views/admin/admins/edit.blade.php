@extends('admin.layout')

@section('title')
    Dashboard | Admins | Edit
@endsection



@section('content')




@if($errors->any())
<div class="alert alert-danger" style="margin:18px;" role="alert">
 <ul>
  @foreach($errors->all() as $error)
  <li>{{ $error }}</li>

  @endforeach
</ul>
</div>
@endif




<div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title">Edit Admin</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="POST" action="{{ url('/admins/'.$admin->id) }}">
            @method('PUT')
            @csrf
          <div class="card-body">
                <div class="form-group">
                        <label for="exampleInputEmail1">Full Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $admin->name }}" placeholder="Full Name" name="name">
                      </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" value="{{ $admin->email }}" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" value="" placeholder="Password" name="password">
            </div>
          
          
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
      <!-- /.card -->




@endsection