@extends('component.sidebar')

@section('content')
<style>
    .table-container {
        max-height: 400px; 
        overflow-y: auto; 
    }
    .table th, .table td {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .w-15{
        width: 15%;
    }
    .w-25{
        width: 25%;
    }
    .btn-group {
        display: flex;
        gap: 5px; 
    }
    .icons{
        padding-right: 5px;
    }
    .modal.show {
    display: block;
    background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-backdrop {
    display: none;
    }

    .modal-dialog-centered {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    }

    .modal-dialog {
    max-width: 600px; 
    margin: auto;
    }

    .modal-content {
    position: relative;
    z-index: 11000;
    background-color: #fff;
    border-radius: 8px;
    }

</style>

<div class="title">
    <h4 class="text-primary mt-4 mb-0 align-middle">Connection Setting</h4>
    <br>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="container">
                    @if(Session::get('success')) 
                    <div class="alert alert-success"> {{Session::get('success')}}</div>
                    @endif
                    @if(Session::get('deleted')) 
                    <div class="alert alert-danger"> {{Session::get('deleted')}}</div>
                    @endif

                    <div class="d-flex justify-content-between mb-3">
                        <div class="d-flex w-50">
                            <a href="{{ route('connection.create') }}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Setup New Connection</a>
                        </div>
                    </div>
                
                    <div class="border-gray-subtle border rounded-2 overflow-hidden">
                        <div class="table-container">
                            <table class="table table-hover align-middle mb-0 bg-white">
                                <thead class="table-active">
                                    <tr>
                                        <th class="w-15 text-s pointer fw-bold text-center">No</th>
                                        <th class="w-15 text-s pointer fw-bold text-center">Client Code</th>
                                        <th class="w-15 text-s pointer fw-bold text-center">Client Name</th>

                                        {{-- prohukum --}}
                                        <th class="w-15 text-s pointer fw-bold text-center">Prohukum Database IP</th>
                                        <th class="w-15 text-s pointer fw-bold text-center">Prohukum Database Port</th>
                                        <th class="w-15 text-s pointer fw-bold text-center">Prohukum Database User</th>
                                        <th class="w-15 text-s pointer fw-bold text-center">Prohukum Database Name</th>
                                        <th class="w-25 text-s pointer fw-bold text-center">Prohukum Database Password</th>

                                        {{-- proaccounting --}}
                                        <th class="w-15 text-s pointer fw-bold text-center">Proaccounting Database IP</th>
                                        <th class="w-15 text-s pointer fw-bold text-center">Proaccounting Database Port</th>
                                        <th class="w-15 text-s pointer fw-bold text-center">Proaccounting Database User</th>
                                        <th class="w-15 text-s pointer fw-bold text-center">Proaccounting Database Name</th>
                                        <th class="w-25 text-s pointer fw-bold text-center">Proaccounting Database Password</th>
                                        <th class="w-25 text-s pointer fw-bold text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($connection as $conn)
                                    <tr>
                                        <td class="w-15">{{ $no++ }}</td>
                                        <td class="w-15"> {{ $conn['client_code']}}</td>
                                        <td class="w-15"> {{ $conn['client_name'] }}</td>

                                        {{-- prohukum --}}
                                        <td class="w-15"> {{ $conn['prohukum_database_ip']?? '-' }}</td>
                                        <td class="w-15"> {{ $conn['prohukum_database_port']?? '-' }}</td>
                                        <td class="w-15"> {{ $conn['prohukum_database_user']?? '-' }}</td>
                                        <td class="w-15"> {{ $conn['prohukum_database_password']?? '-' }}</td>
                                        <td class="w-25"> {{ $conn['prohukum_database_name']?? '-' }}</td>

                                        {{-- proaccounting --}}
                                        <td class="w-15"> {{ $conn['proaccounting_database_ip']?? '-' }}</td>
                                        <td class="w-15"> {{ $conn['proaccounting_database_port']?? '-' }}</td>
                                        <td class="w-15"> {{ $conn['proaccounting_database_user']?? '-' }}</td>
                                        <td class="w-15"> {{ $conn['proaccounting_database_password']?? '-' }}</td>
                                        <td class="w-25"> {{ $conn['proaccounting_database_name']?? '-' }}</td>
                                        <td class="w-25">
                                            <div class="btn-group">
                                                <a href="{{ route('connection.edit', $conn->id) }}" class="btn btn-primary rounded">Edit</a>
                                                <button type="button" class="btn btn-danger rounded" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$conn['id']}}">Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- modal delete --}}
                                    <div
                                        class="modal"
                                        id="exampleModal-{{$conn['id']}}"
                                        tabindex="-1"
                                        aria-hidden="true"
                                        aria-labelledby="exampleModalToggleLabel1"
                                    >
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-body-secondary">
                                                    <div class="d-flex justify-content-center w-100">
                                                        <h5 class="modal-title fw-semibold" id="exampleModalToggleLabel1">
                                                            Detail The Connection Setting
                                                        </h5>
                                                    </div>
                                                    <button
                                                        type="button"
                                                        class="btn-close"
                                                        data-bs-dismiss="modal"
                                                        aria-label="Close"
                                                    ></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="bg-white rounded-7 p-2">
                                                        <div class="d-flex align-items-center justify-content-center gap-3">
                                                            <h6 class="mb-0 text-md">
                                                                Are you sure you want to delete this data permanently?
                                                            </h6>
                                                        </div>
                                                        <div class="d-flex justify-content-end gap-2 pt-3 mt-3">
                                                            <button
                                                                type="button"
                                                                data-bs-dismiss="modal"
                                                                class="fw-semibold btn btn-outline-primary text-decoration-none fw-normal rounded-2 px-3 py-2"
                                                            >
                                                                Cancel
                                                            </button>
                                                            <form action="{{route('connection.delete', $conn['id'] )}}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn-danger btn rounded-2 text-decoration-none px-3 py-2 fw-normal">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <button
            type="button"
            onclick="window.history.back()"
            class="btn btn-sm btn-custom p-2 mt-4 d-flex align-items-center bg-white shadow-sm rounded"
        >
            <i class="fa-solid fa-arrow-left icons"></i> Back to previous page
        </button>
</div>

@endsection
