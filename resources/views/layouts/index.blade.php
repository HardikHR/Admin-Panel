<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ciyaza | City</title>

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css" rel="stylesheet">

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
              <h1>State Table</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <a href="/createState"><button type="button" class="btn btn-block btn-outline-primary">Add state</button></a>
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
                  <h3 class="card-title">State list</h3>
                </div>
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr style="text-align: center;">
                        <th>ID</th>
                        <th>State name</th>
                        <th>State code</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($states as $state)
                        <tr style="text-align: center;">
                          <td>{{$state->id}}</td>
                          <td>{{$state->state_name}}</td>
                          <td>{{$state->state_code}}</td>
                          <td>{{$state->created_at}}</td>
                          <td>{{$state->updated_at}}</td>
                          <td style="display: flex;justify-content: center">
                            <a href="/state/{{$state->id}}/edit"><button type="button" name="edit" title="Edit" class="btn btn-block btn-outline-primary btn-sm"><i class="fas fa-pencil-alt"></i></button></a>&nbsp;&nbsp;&nbsp;
                            
                            <form method="POST" action="{{ route('layout.Statedelete', $state->id) }}">
                              @csrf
                              @method('DELETE')
                                <a href="/state/{{$state->id}}/delete"><button type="button" name="delete" title="Delete" class="btn btn-block btn-outline-danger btn-sm clicked show-alert-delete-box"><i class="fa fa-trash"></i></button></a>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <br>
                  <div style="float: right">
                    {{$states->links()}}
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
{{-- <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

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

<script type="text/javascript">
    $('.show-alert-delete-box').click(function(event){
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: "Are you sure you want to delete this record?",
            icon: "warning",
            type: "warning",
            buttons: ["Cancel","Yes!"],
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
</script>

</body>
</html>