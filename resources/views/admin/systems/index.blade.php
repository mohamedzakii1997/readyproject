@extends('admin.layout')

@section('title')
    Dashboard | Systems
@endsection

@section('extracss')
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
<style>
#user_table_wrapper {

    overflow-y: scroll;

}


</style>
@endsection

@section('content')

@if(Session::has('sucsess'))

<div class="alert alert-success" style="margin:18px;" role="alert">
       {{ Session::get('sucsess') }}
      </div>
@endif

<section class="content" >
    <div class="row">
      <div class="col-12" >



            <div class="card" >
                    <div class="card-header">
                      <h3 class="card-title">Systems Data</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" >
                      <table id="user_table" class="table table-bordered table-striped" style="overflow-y:roll;">
                        <thead>
                        <tr>
                          <th>System ID</th>
                          <th> System name</th>
                          <th> Customer name</th>
                          <th> Modality</th>
                          <th>Version</th>
                          <th>Country</th>
                          <th> Contact Person </th>
                          <th> HMME-Sales Person</th>
                          <th>PO-NU</th>
                          <th> Shipping Date  </th>
                          <th>Installtion Date </th>
                          <th> System Preferences  </th>
                          <th>Install Option  </th>
                          <th> Warrantly Start Date  </th>
                          <th>Warrantly End Date  </th>
                          <th>Created At </th>
                          <th>Updated At   </th>
                          <th>Actions   </th>
                         
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

url: "{{ url('systems')}}",

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

data:'customer_name',
name:'customer_name',

}
,
{

data:'modality',
name:'modality',

}
,




{

data:'version',
name:'version',

}
,
{

data:'country',
name:'country',

}

,




{

data:'contcat_person',
name:'contcat_person',

}

,


{

data:'hmme_sales_person',
name:'hmme_sales_person',

}

,

{

data:'po_no',
name:'po_no',

}

,

{

data:'shipping_date',
name:'shipping_date',

}

,

{

data:'installtion_date',
name:'installtion_date',

}

,

{

data:'system_preferences',
name:'system_preferences',

}

,

{

data:'install_options',
name:'install_options',

}

,

{

data:'warrantly_start_date',
name:'warrantly_start_date',

}

,
{

data:'warrantly_end_date',
name:'warrantly_end_date',

}

,
{

data:'created_at',
name:'created_at',

}
,
{

data:'updated_at',
name:'updated_at',

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