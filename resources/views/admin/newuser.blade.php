<x-dash>
    <x-sidebar />
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">New user</li>
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
                                <h3 class="card-title">New User</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{url('new/admin-user/')}}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label >Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Name">
                                    </div>
                                    @error('name')
                                    <p class="text-danger">* {{$message}}</p>
                                    @enderror

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email"  placeholder="Email">
                                    </div>
                                    @error('email')
                                    <p class="text-danger">* {{$message}}</p>
                                    @enderror


                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password"  placeholder="Password">
                                    </div>
                                    @error('password')
                                    <p class="text-danger">* {{$message}}</p>
                                    @enderror


                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" name="confirm"  placeholder="Retype Password">
                                    </div>
                                    @error('confirm')
                                    <p class="text-danger">* {{$message}}</p>
                                    @enderror
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
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
</x-dash>
