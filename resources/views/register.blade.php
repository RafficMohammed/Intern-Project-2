<x-layout>

    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="" class="h1"><b>Project</b>2</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register !</p>

                <form action="{{url('register-new-member')}}" method="post">
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
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                    <p class="text-danger">* {{$message}}</p>
                    @enderror




                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="confirm" placeholder="Retype Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('confirm')
                    <p class="text-danger">* {{$message}}</p>
                    @enderror




                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <br>


                <p class="text-center"><a href="{{url('/')}}">Existing User ? Login Here !</a>
                    <br>or
                    <br>
                <a href="{{url('contact')}}">Contact-us</a></p>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
</x-layout>
