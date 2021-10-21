<x-layout>
    @if(session()->has('contact-us'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">

        <strong>Success!</strong> {{session()->get('contact-us')}}.

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b>Project</b>2</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Contact Form</p>

                <form action="{{url('contact')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Full name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    @error('name')
                    <p class="text-danger">* {{$message}}</p>
                    @enderror





                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                    <p class="text-danger">* {{$message}}</p>
                    @enderror




                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="subject" placeholder="Subject">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                    @error('subject')
                    <p class="text-danger">* {{$message}}</p>
                    @enderror




                    <div class="input-group mb-3">
                        <textarea type="password" class="form-control" name="message" placeholder="Mention your Queries"></textarea>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-note"></span>
                            </div>
                        </div>
                    </div>
                    @error('message')
                    <p class="text-danger">* {{$message}}</p>
                    @enderror




                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Send Message</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                    <br>


                <p class="text-center"><a href="{{url('/')}}">Login</a> or <a href="{{url('register-new-member')}}">Register</a></p>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
</x-layout>
