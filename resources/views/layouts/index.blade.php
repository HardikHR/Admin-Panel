<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>City | DataTables</title>

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
@include('layouts.header')
@include('layouts.sidebar')

  <div class="content-wrapper">
       @if ($mess = Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong>{{ $mess }}</strong>
        </div>
      @endif

       @if(Session('alert-danger'))
        <div class="alert alert-danger alert-block">
            <strong>{{Session('alert-danger')}}</strong>
        </div>
        @endif

        <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>City Table</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <a href="/createState"><button type="button" class="btn btn-block btn-outline-primary">Add</button></a>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
             
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">City list</h3>
                </div>

                <div class="card-body">
                  <table id="example2" id="deleteForm" class="table table-bordered table-striped">
                    <thead>
                      <tr style="text-align: center;">
                        <th>ID</th>
                        <th>State name</th>
                        <th>State Code</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($states as $state)
                        <tr style="text-align: center">
                          <td>{{$state->id}}</td>
                          <td>{{$state->name}}</td>
                          <td>{{$state->code}}</td>
                          <td>{{$state->created_at}}</td>
                          <td>{{$state->updated_at}}</td>
                          <td>
                            <a href="/state/{{$state->id}}/edit"><button type="button" style="width: 100px" name="edit" class="btn btn-block btn-outline-primary btn-sm"><i class=" fa-duotone fa-sparkles fa-sm fa-shake " style=" color: #1c7ed6; " ></i> Edit</button></a>&nbsp;

                            <form action="{{ route('layout.Statedelete', $state->id) }}" method="POST" class="delete-form">
                              <a href="/state/{{$state->id}}/delete"><button type="button" style="width: 100px" name="delete" class="btn btn-block btn-outline-danger btn-sm clicked"><i class="fa fa-trash"></i> Delete</button></a>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div style="float: right">
                    {{-- {{$city->links()}} --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
   @include('layouts.footer')
  </div>

  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="sweetalert2.all.min.js"></script>
  <script src="sweetalert2.min.js"></script>
  <link rel="stylesheet" href="sweetalert2.min.css">

  <script type="text/javascript">
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "length#example1Change": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
      $('#example2').DataTable({
        "paging": false,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": false,
        "autoWidth": true,
        "responsive": true,
      });
    });    
</script>
</body>
</html>