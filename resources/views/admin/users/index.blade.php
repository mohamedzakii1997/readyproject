@extends('admin.layout')

@section('title')
    Dashboard | Users
@endsection

@section('extracss')
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">

@endsection

@section('content')


<section class="content">
    <div class="row">
      <div class="col-12">



            <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">DataTable with default features</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="user_table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>image</th>
                          <th>name</th>
                          <th>email</th>
                          <th>action</th>
                          <th>posts</th>
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

url: "{{ url('users')}}",

},

columns:[

{

data:'image',
name:'image',
render: function(data,type,full,meta){
    return "<img src={{ URL::to('/') }}" + data + " width='70' class='img-thumbnail' />";

},
orderable:false,



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

{ 
data:'posts',
name:'posts',

}



]



});


});



</script>
    
@endsection