@extends('admin.layout')

@section('title')
    Dashboard | Systems | Create
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
          <h3 class="card-title">Edit System</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="POST" enctype="multipart/form-data" action="{{ url('/systems/'.$system->id) }}">
           @method('PUT')
            @csrf

          <div class="card-body">

                <div class="form-group">
                        <label for="exampleInputEmail1">System Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" Name" name="name" value="{{ $system->name }}">
                      </div>


                      <div class="form-group">
                            <label for="exampleInputEmail1">Customer Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" Customer Name" value="{{ $system->customer_name }}" name="customer_name">
                          </div>


                          <div class="form-group">
                                <label for="exampleInputEmail1">Modality </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" Modality" value="{{ $system->modality }}" name="modality">
                              </div>



                              <div class="form-group">
                                    <label for="exampleInputEmail1">Version </label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" Version" value="{{ $system->version }}" name="version">
                                  </div>


                                  <label for="exampleInputEmail1">Country :  </label>

                                  @foreach($countries as $country)
                               
                                  <div class="form-check">
                                      <input class="form-check-input" type="radio" name="Radios" id="exampleRadios1" @if($country->id == $system->country) checked  @endif value="{{ $country->id }}" >
                                      <label class="form-check-label" for="exampleRadios1">
                                        {{ $country->name }}
                                      </label>
                                    </div>
                                  
                                    @endforeach
                               <br>

        


                                  <div class="form-group">
                                        <label for="exampleInputEmail1">Contact Person </label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" Contact Person" value="{{ $system->contcat_person }}" name="contcat_person">
                                      </div>
        
          
                                      <div class="form-group">
                                            <label for="exampleInputEmail1">HMME - Sales Person </label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" HMME" value="{{ $system->hmme_sales_person }}" name="hmme">
                                          </div>

                                          <div class="form-group">
                                              <label for="exampleInputEmail1">PO - NO </label>
                                              <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $system->po_no }}" placeholder=" PO-NO" name="po">
                                            </div>


                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">System Preferances</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"  name="systemprefs">{{ $system->system_preferences }}</textarea>
                                              </div>

                                              <div class="form-group">
                                                  <label for="exampleFormControlTextarea1">installatiobn Options </label>
                                                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="installationoptios">{{ $system->install_options }}</textarea>
                                                </div>

                                                <label for="exampleFormControlTextarea1"> Shipping date </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control" value="{{ $system->shipping_date }}" name="shippingdate">
                                                  </div>


                                                  <label for="exampleFormControlTextarea1"> Installation date </label>
                                                  <div class="input-group">
                                                      <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                      </div>
                                                      <input type="date" class="form-control" value="{{ $system->installtion_date }}" name="installationdate">
                                                    </div>
<br>

<label for="exampleFormControlTextarea1"> Warrantly Start date </label>
<div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
    </div>
    <input type="date" class="form-control" value="{{ $system->warrantly_start_date }}" name="warrantlystart">
  </div>


  <label for="exampleFormControlTextarea1">  Warrantly Start date </label>
  <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
      </div>
      <input type="date" class="form-control" value="{{ $system->warrantly_end_date }}" name="warrantlyend">
    </div>



<br>
<label for="exampleFormControlTextarea1"> Upload attachment [Optional] </label>

    <div class="custom-file">
        <input type="file" name="upload" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
      </div>



          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
      <!-- /.card -->




@endsection


