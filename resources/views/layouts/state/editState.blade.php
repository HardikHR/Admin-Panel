<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ciyaza | Edit State</title>
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
    @if ($mess = Session::get('success'))
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
                  <a href="/state" style="float: right"><button type="submit" class="btn btn-block btn-default">Back</button></a>
                <h2>Edit State</h2>
              </div>
              {{-- <form id="addState" action="@if(isset($stateEdit)) /addState @else /state/{{$stateEdit->id}}/update @endif" method="post"> --}}
              <form id="addState" action="/state/{{$stateEdit->id}}/update" method="post">
                @csrf
                @method('post')
                <div class="card-body" style="width: 580px">
                  <div class="form-group">
                    <label for="name">State name</label>
                    <input type="text" name="name" value="{{$stateEdit->name}}" class="form-control" id="name" placeholder="Enter state name">
                     @if($errors->has('name'))
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="scode">Code</label>
                    <input type="text" name="code" value="{{ $stateEdit->code }}" class="form-control" id="code" placeholder="Enter state code">
                    @if($errors->has('code'))
                      <span class="text-danger">{{ $errors->first('code') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                      Update
                    </button>&nbsp&nbsp&nbsp
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
