@extends('admin.layout.master')

@section('content')

    <link rel="stylesheet" href="{{asset('public/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('public/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('public/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{asset('public/assets/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Table</a></li>
                    <li class="active">Data table</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">

                    @if (session()->get('Sukses'))
                    <div class="alert alert-success">
                        {{ session()->get('Sukses') }}

                    </div>
                        
                    @endif

                    <div class="card-header">
                        <strong class="card-title">{{ $pagename }}</strong>
                        <a href="{{ route('users.create') }}" class="btn btn-primary pull-right">Tambah User</a>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Edit</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($allUser as $i=>$row )
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>
                                        @if (!empty($row->getRoleNames()))
                                        @foreach ($row->getRoleNames() as $role)
                                        <label class="badge badge-success">{{ $role }}</label>                                            
                                        @endforeach
                                            
                                        @endif
                                    </td>
                                    <td><a href="{{ route('users.edit', $row->id) }}" class="btn btn-primary">Edit</a></td>
                                    <td>
                                        <form action="{{ route('users.destroy', $row->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->

    {{-- <script src="{{asset('public/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('public/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('public/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/assets/js/main.js')}}"></script> --}}


    <script src="{{asset('public/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('public/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('public/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('public/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('public/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('public/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('public/vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('public/assets/js/init-scripts/data-table/datatables-init.js')}}"></script>

@endsection