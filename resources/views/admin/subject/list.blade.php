@extends('layout.app')

  @section('content')
      
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">  



      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subject List</h1>
          </div>

          <div class="col-sm-6" style="text-align:right;">
            <a href="{{url('admin/subject/add')}}" class="btn btn-primary">Add New Subject</a>
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
        
           
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Search Subject </h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form method="get" action="">
                  
                    <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-3">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{Request::get('name')}}" placeholder="Name">
                          </div>
                          <div class="form-group col-md-3">
                            <label for="exampleInputEmail1">Subject Type</label>
                            <select class="form-control" id="type" name="type">
                            <option value="">Select type</option>
                            <option {{ (Request::get('type')=='Theory') ? 'selected' : ''}} value="Theory">Theory</option>
                            <option {{ (Request::get('type')=='Practical') ? 'selected' : ''}} value="Practical">Practical</option>
                            </select>
                          </div>

                         
                     
                      <div class="form-group col-md-3">
                        <label for="exampleInputEmail1">Date</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{Request::get('date')}}" placeholder="Enter email">
                      </div>
                      <div class="form-group col-md-3">
                       <button type="submit" class="btn btn-primary" style="margin-top: 31px;">Search</button>
                       <a href="{{url('admin/subject/list')}}" class=" btn btn-success"  style="margin-top: 31px;">Clear</a>
                      </div> 
                        </div>      
                    </div>
                    <!-- /.card-body -->
        
                  
                  </form>
                </div>
                <!-- /.card -->
        
               
        
          



            <!-- /.card -->
            @include('_message')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Subject List </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Subject Name</th>
                      <th>Subject Type</th>
                      <th>Status</th>
                      <th>Created By</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach ($getRecord as $value)
                         <tr>
                          <td>{{$value->id}}</td>
                          <td>{{$value->name}}</td>
                          <td>{{$value->type}}</td>
                          <td>{{(($value->status==0)? 'Active' : 'Inactive')}}</td>
                          <td>{{$value->created_by_name}}</td>
                          <td>{{ date('d-m-y',strtotime($value->created_at)) }}</td>
                          <td>
                            <a href="{{ url('admin/subject/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('admin/subject/delete/'.$value->id) }}" class="btn btn-danger">Delete</a>
                          </td>
                         </tr>
                     @endforeach
                   
                  </tbody>
                </table>
                <div style="float: right;padding:10px;">
                  {{ $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links()}}
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

  @endsection