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
        @if(session()->has('contact-us'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">

                <strong>Success!</strong> {{session()->get('contact-us')}}.

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(session()->has('login'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">

                <strong>Success!</strong> {{session()->get('login')}}.

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    @endif



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
                <a class="btn btn-outline-primary" href="{{url('user-contact')}}" style="margin-left: 30px">New</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
                        <th scope="col">Action </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contact as $contacts)
                        <tr>
                            <td>{{$contacts->subject}}</td>
                            <td>{{$contacts->message}}</td>
                            <td><a class="btn btn-success" href="{{url('edit-contact/'.$contacts->id)}}">Edit</a>&nbsp;<a class="btn btn-danger" onclick="del({{$contacts->id}})" >Delete</a></td>
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
                        url:"delete-contact/"+id,
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
