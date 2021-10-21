<x-dash>


    <!-- Main Sidebar Container -->
    <x-sidebar  />
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>


        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="deletedialog" style="display: none">

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>





        @if(session()->has('update'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">

                <strong>Success!</strong> {{session()->get('update')}}.

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card" style="margin-top: 50px">
            <div class="card-header">
                <h3 class="card-title">Contact-Section</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th scope="col">User Name</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
                        <th scope="col">Action </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($conall as $conalls)
                        <tr>
                            <td>{{$conalls->name}}</td>
                            <td>{{$conalls->subject}}</td>
                            <td>{{$conalls->message}}</td>
                            <td><a class="btn btn-success" href="{{url('edit/admin-contact/'.$conalls->id)}}">Edit</a>&nbsp;<a class="btn btn-danger" onclick="del({{$conalls->id}})" >Delete</a></td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- Main content -->


    </div>
    <script>

        function del(id)
        {
            if (confirm('Are you sure want to delete ?'))
            {
                $.ajax(
                    {
                        type:"GET",
                        url:"{{url('delete/admin-contact')}}"+'/'+id,
                        datatype: 'json',
                        success:function (response)
                        {
                            if(response.status == 200)
                            {
                                $('#deletedialog').show(function ()
                                {
                                    $(this).text(response.message);
                                    location.reload();

                                })

                            }

                        }
                    }
                )
            }
        }
        $(document).ready(function ()
        {
            $('#example').DataTable();

        })
    </script>

</x-dash>
