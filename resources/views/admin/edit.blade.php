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
                                <h3 class="card-title">Update Query?</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{url('update/admin-contact/'.$contact->id)}}" method="post">
                                @csrf
                                <input type="hidden" name="name" value="{{$contact->name}}">
                                <input type="hidden" name="email" value="{{$contact->email}}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label >Subject</label>
                                        <input type="text" class="form-control" name="subject" value="{{$contact->subject}}" >
                                    </div>
                                    @error('subject')
                                    <p class="text-danger">* {{$message}}</p>
                                    @enderror



                                    <div class="form-group">
                                        <label >Message</label>
                                        <textarea  class="form-control" name="message"   placeholder="Type here !..">{{$contact->message}}</textarea>
                                    </div>
                                    @error('message')
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
</x-dash>
