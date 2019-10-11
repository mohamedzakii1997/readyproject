@extends('admin.layout')

@section('title')
    Dashboard | Admins | Create
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
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add New Admin</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="POST" action="{{ url('/admins') }}">
            @csrf
          <div class="card-body">
                <div class="form-group">
                        <label for="exampleInputEmail1">Full Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Full Name" name="name">
                      </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
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


