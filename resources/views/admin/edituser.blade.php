<x-dash>
    <x-sidebar />
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Contact Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Contact Form</li>
                        </ol>
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
                            <div class="card-header">
                                <h3 class="card-title">Change Role</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{url('update/admin-user/'.$user->id)}}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label >Name</label>
                                        <input type="text" class="form-control" name="name" value="{{$user->name}}" >
                                    </div>
                                    @error('name')
                                    <p class="text-danger">* {{$message}}</p>
                                    @enderror

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" value="{{$user->email}}" >
                                    </div>
                                    @error('email')
                                    <p class="text-danger">* {{$message}}</p>
                                    @enderror



                                    <div class="form-group">
                                        <label>Role</label>
                                        <div class="custom-control custom-checkbox">
                                            <label>is Admin?</label>
                                            <input class="toggle-class" type="checkbox" id="checkbox" name="role" {{$user->role==0?'':'checked'}}>

                                        </div>
                                    </div>
                                    @error('role')
                                    <p class="text-danger">* {{$message}}</p>
                                    @enderror
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->




                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <script>
        // $(document).ready(function ()
        // {
        //     $('#checkbox').click(function ()
        //     {
        //      console.log($(this).val());
        //     });
        // })
    </script>
</x-dash>
