@extends('layout.app')

  @section('content')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">



      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Detail List (Total : {{$getRecord->total()}})</h1>
          </div>

          <div class="col-sm-6" style="text-align:right;">
            <a href="{{url('user/user/add')}}" class="btn btn-primary">Add New User</a>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <!-- /.col -->
          <div class="col-md-12">










            <!-- /.card -->
            @include('_message')
            <div class="card">
              <div class="card-header bg-primary">
                <h3 class="card-title">Admin List </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Address</th>
                      <th>State</th>
                      <th>City</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($getRecord as $value)
                    <tr>
                      <td>{{ $value->id }}</td>
                      <td>{{ $value->name }}</td>
                      <td>{{ $value->email }}</td>
                      <td>{{ $value->mobile }}</td>
                      <td>{{ $value->address }}</td>
                      <td>{{ $value->state }}</td>
                      <td>{{ $value->city }}</td>

                      <td>{{ date('d-m-y H:i:A',strtotime($value->created_at)) }}</td>
                      <td>
                        <a href="{{ url('user/user/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('user/user/delete/'.$value->id) }}" class="btn btn-danger delete-button">Delete</a>
                      </td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
               <div style="float: right;padding:10px;">
              {{-- //  {{ $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links()}} --}}
                {{ $getRecord->onEachSide(1)->links('pagination::simple-bootstrap-4') }}
               </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>








        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <script>
    $(document).ready(function() {
        $('.delete-button').on('click', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = $(this).attr('href');
                }
            });
        });
    });
</script>


  @endsection
