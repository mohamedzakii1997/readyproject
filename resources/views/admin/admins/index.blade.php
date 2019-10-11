@extends('admin.layout')

@section('title')
    Dashboard | Admins
@endsection

@section('extracss')
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">

@endsection

@section('content')

@if(Session::has('sucsess'))

<div class="alert alert-success" style="margin:18px;" role="alert">
       {{ Session::get('sucsess') }}
      </div>
@endif

<section class="content">
    <div class="row">
      <div class="col-12">



            <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Admins Data</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="user_table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Admin ID</th>
                          <th> Admin name</th>
                          <th> Admin email</th>
                          <th>action</th>
                         
                        </tr>
                        </thead>
                        <tbody>
                        
                        
                        
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->






      </div>
    </div>
</section>



    
@endsection
@section('extrajs')

<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>

<script>
        

$(document).ready(function(){


$('#user_table').DataTable({

processing:true,
serverside:true,
ajax:{

url: "{{ url('admins')}}",

},

columns:[

  {

data:'id',
name:'id',

}
,


{

data:'name',
name:'name',

}
,
{

data:'email',
name:'email',

}
,
{

data:'action',
name:'action',
orderable:false,
}

,




]



});


});



</script>
    
@endsection