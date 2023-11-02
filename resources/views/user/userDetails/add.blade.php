@extends('layout.app')

  @section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12" style="display: flex">
           <header class="container-fluid bg-dark text-light">
            <div class="row" style="height: 60px;">
                <div class="col-md-6" style="margin-top: 10px;">
                    <h1>Add New User Details</h1>
                </div>
                <div class="col-md-6 text-right" style="margin-top: 10px;">
                    <a href="{{ route('admin.list')}}"><button class="btn btn-secondary"><i class="fas fa-times"></i> Close</button></a>
                </div>
            </div>
        </header>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">

              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action=" {{ url('user/user/add') }} ">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name')}}" placeholder="Name" >
                        <div style="color: red;">{{ $errors->first('email')}}</div>
                      </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email')}}" placeholder="Enter email" >
                    <div style="color: red;">{{ $errors->first('email')}}</div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" value="{{ old('mobile')}}" placeholder="Enter mobile" >
                    <div style="color: red;">{{ $errors->first('mobile')}}</div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address')}}" placeholder="Enter address" >
                    <div style="color: red;">{{ $errors->first('address')}}</div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">State</label>
                    <input type="text" class="form-control" id="state" name="state" value="{{ old('state')}}" placeholder="Enter state" >
                    <div style="color: red;">{{ $errors->first('state')}}</div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">City</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{ old('city')}}" placeholder="Enter email" >
                    <div style="color: red;">{{ $errors->first('city')}}</div>
                  </div>



                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->



          </div>
          <!--/.col (left) -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
