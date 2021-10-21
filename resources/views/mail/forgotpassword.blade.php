<x-layout>

    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Forgot Password</p>
              <div class="row">

                        <!-- /.col -->
                        <div class="col-12">
                            <a href="{{url('reset/user-password/'.$user->id)}}" class="btn btn-primary btn-block">Verify Link</a>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</x-layout>




