<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ciyaza | Add City</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

@include('layouts.header')
@include('layouts.sidebar')

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
    </section>
    
    @if($mess = Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong>{{ $mess }}</strong>
        </div>
    @endif

    <section class="content">
      <div class="container-fluid" style="width: 600px">
        <div class="row">
            <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header" style="width: 585px">
                <a href="/city" style="float: right"><button type="submit" class="btn btn-block btn-default">Back</button></a>
                <h2>Add City</h2>
              </div>
              {{-- <form id="addState" action="@if(isset($stateEdit)) /addState @else /state/{{$stateEdit->id}}/update @endif" method="post"> --}}
              <form action="/addCity" method="post">
                @csrf
                @method('post')
                <div class="card-body" style="width: 580px">
                  
                  <div class="form-group">
                      <label>Select state name</label>
                      <select class="custom-select" name="state_id">
                        <option value="">Select state</option>
                        @foreach($state as $st)
                        <option value="{{$st->id}}">{{$st->state_name}}</option>
                        @endforeach
                      </select>
                      @if($errors->has('state_id'))
                        <span class="text-danger">{{ $errors->first('state_id') }}</span>
                      @endif
                  </div>
 
                  <div class="form-group">
                    <label for="scode">City name</label>
                    <input type="text" name="city_name" value="{{ old('city_name') }}" class="form-control" placeholder="Enter state name">
                    @if($errors->has('city_name'))
                      <span class="text-danger">{{ $errors->first('city_name') }}</span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label for="name">City code</label>
                    <input type="text" name="city_code" value="{{ old('city_code') }}" class="form-control" placeholder="Enter state code">
                     @if($errors->has('city_code'))
                      <span class="text-danger">{{ $errors->first('city_code') }}</span>
                    @endif
                  </div>

                  <div class="form-group">
                   <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </div>
              </form>

            </div>
            </div>
            <div class="col-md-6">
          </div>
        </div>
      </div>
    </section>
  </div>
    @include('layouts.footer')
</div>
</body>
</html>
