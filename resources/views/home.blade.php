@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                   @lang('main.loggedin')


<hr>
<h2>add new post </h2>
<form method="POST" action="{{ url('/addpost') }}"> 
    @csrf
                   <div class="input-group flex-nowrap">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="addon-wrapping">@</span>
                    </div>
                    <input type="text" class="form-control" name="content" placeholder="content" aria-label="Username" aria-describedby="addon-wrapping">
                  </div>
                  <button type="submit" class="btn btn-primary">add post</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
