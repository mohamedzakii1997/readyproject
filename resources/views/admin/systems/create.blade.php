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
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add New System</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="POST" enctype="multipart/form-data" action="{{ url('/systems') }}">
            @csrf

          <div class="card-body">

                <div class="form-group">
                        <label for="exampleInputEmail1">System Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" Name" name="name">
                      </div>


                      <div class="form-group">
                            <label for="exampleInputEmail1">Customer Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" Customer Name" name="customer_name">
                          </div>


                          <div class="form-group">
                                <label for="exampleInputEmail1">Modality </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" Modality" name="modality">
                              </div>



                              <div class="form-group">
                                    <label for="exampleInputEmail1">Version </label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" Version" name="version">
                                  </div>


                                  <label for="exampleInputEmail1">Country :  </label>

                                  @foreach($countries as $country)
                                  <div class="form-check">
                                      <input class="form-check-input" type="radio" name="Radios" id="exampleRadios1" value="{{ $country->id }}" >
                                      <label class="form-check-label" for="exampleRadios1">
                                        {{ $country->name }}
                                      </label>
                                    </div>
                                    @endforeach
                               <br>

        


                                  <div class="form-group">
                                        <label for="exampleInputEmail1">Contact Person </label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" Contact Person" name="contcat_person">
                                      </div>
        
          
                                      <div class="form-group">
                                            <label for="exampleInputEmail1">HMME - Sales Person </label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" HMME" name="hmme">
                                          </div>

                                          <div class="form-group">
                                              <label for="exampleInputEmail1">PO - NO </label>
                                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" PO-NO" name="po">
                                            </div>


                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">System Preferances</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="systemprefs"></textarea>
                                              </div>

                                              <div class="form-group">
                                                  <label for="exampleFormControlTextarea1">installatiobn Options </label>
                                                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="installationoptios"></textarea>
                                                </div>

                                                <label for="exampleFormControlTextarea1"> Shipping date </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control" name="shippingdate">
                                                  </div>


                                                  <label for="exampleFormControlTextarea1"> Installation date </label>
                                                  <div class="input-group">
                                                      <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                      </div>
                                                      <input type="date" class="form-control" name="installationdate">
                                                    </div>
<br>

<label for="exampleFormControlTextarea1"> Warrantly Start date </label>
<div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
    </div>
    <input type="date" class="form-control" name="warrantlystart">
  </div>


  <label for="exampleFormControlTextarea1">  Warrantly Start date </label>
  <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
      </div>
      <input type="date" class="form-control" name="warrantlyend">
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
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
      <!-- /.card -->




@endsection


