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
    <h4 class="text-primary mt-4 mb-0 align-middle">Documentation</h4>
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
                            <a href="{{ route('documentation.create') }}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Setup New Connection</a>
                        </div>
                    </div>
                
                    <div class="">
                        <div class="table-container">
                            <table id="documentation" class="rounded-2 overflow-hidden display nowrap table table-hover align-middle mb-0 bg-white">
                                <thead class="table-active">
                                    <tr>
                                        <th class="text-s pointer fw-bold">No</th>
                                        <th class="text-s pointer fw-bold">Client ID</th>
                                        <th class="text-s pointer fw-bold">Date</th>
                                        <th class="text-s pointer fw-bold">Title</th>
                                        <th class="text-s pointer fw-bold">Description</th>
                                        <th class="text-s pointer fw-bold">Created_at</th>
                                        <th class="text-s pointer fw-bold">Updated_at</th>
                                        <th class="text-s pointer fw-bold text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($documentation as $doc)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td> {{ $doc['client_id']}}</td>
                                        <td> {{ \Carbon\Carbon::parse($doc['documentation_request_date'])->format('Y-m-d') ?? '-' }}</td>
                                        <td> {{ $doc['documentation_title']?? '-' }}</td>
                                        <td> {{ $doc['documentation_description']?? '-' }}</td>
                                        <td> {{ $doc['updated_at']?? '-' }}</td>
                                        <td> {{ $doc['created_at']?? '-' }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('documentation.edit', $doc->id) }}" class="btn btn-primary rounded">Edit</a>
                                                <button type="button" class="btn btn-danger rounded" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$doc['id']}}">Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- modal delete --}}
                                    <div
                                        class="modal"
                                        id="exampleModal-{{$doc['id']}}"
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
                                                            <form action="{{route('documentation.delete', $doc['id'] )}}" method="POST">
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
<script>
    $('#documentation').DataTable({
    layout: {
        topStart: {
            buttons: [
                {
                    extend: 'excel',
                    filename: 'Documentation'
                }
            ]
        }
    }
});
</script>
@endsection

@section('script')

<!-- DataTables JS -->
<script src="{{ ('https://cdn.datatables.net/2.1.7/js/dataTables.js')}}"></script>
<script src="{{ ('https://cdn.datatables.net/buttons/3.1.2/js/dataTables.buttons.js')}}"></script>
<script src="{{ ('https://cdn.datatables.net/buttons/3.1.2/js/buttons.dataTables.js')}}"></script>
<script src="{{ ('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js')}}"></script>
<script src="{{ ('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js')}}"></script>
<script src="{{ ('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js')}}"></script>
<script src="{{ ('https://cdn.datatables.net/buttons/3.1.2/js/buttons.html5.min.js')}}"></script>
<script src="{{ ('https://cdn.datatables.net/buttons/3.1.2/js/buttons.print.min.js')}}"></script>
@endsection
