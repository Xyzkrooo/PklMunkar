@extends('layouts.admin')
@section('styles')
    <link href="{{ asset('blade/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <!--breadcrumb-->
    <div class="p-3">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Components</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{route('user.create')}}" type="button" class="btn btn-grd-primary px-4"><i
                        class="material-icons-outlined fs-5">add</i></a>
                </div>
            </div>
        </div>

        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">DataTable Example</h6>
    </div>
    <hr>
    <div class="p-3">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>no</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach ($users as $data)
                            @if ($loop->first)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->isAdmin == 1 ? 'admin' : 'user' }}</td>
                                <td>
                                    <a class="btn btn-danger btn-sm btn-block"  disabled>Cant Delete</a>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->isAdmin == 1 ? 'admin' : 'user' }}</td>
                                <td>
                                    <form action="{{route('user.destroy',$data->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <a href="{{route('user.edit',$data->id)}}"
                                            class="btn btn-md btn-warning btn-sm">
                                            Edit
                                        </a>
                                        |
                                        <a href="{{ route('user.destroy', $data->id) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('blade/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('blade/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print']
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
