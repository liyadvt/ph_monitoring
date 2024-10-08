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
    <h4 class="text-primary mt-4 mb-0 align-middle">Proaccounting</h4>
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
{{-- 
                    <div class="d-flex justify-content-between mb-3">
                        <div class="d-flex w-50">
                            <a class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Setup New Connection</a>
                        </div>
                    </div> --}}
                
                    <div class="border-gray-subtle border rounded-2 overflow-hidden">
                        <div class="table-container">
                            <table class="table table-hover align-middle mb-0 bg-white">
                                <thead class="table-active">
                                    <tr>
                                        <th class="text-s pointer fw-bold">No</th>
                                        <th class="text-s pointer fw-bold">Client Code</th>
                                        <th class="text-s pointer fw-bold">Client Name</th>
                                        <th class="text-s pointer fw-bold">Last Journal Date</th>
                                        <th class="text-s pointer fw-bold">Total Journal</th>
                                        <th class="text-s pointer fw-bold">Total Journal Manual</th>
                                        <th class="text-s pointer fw-bold">Total Journal Prohukum</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($proaccounting as $PA)
                                    <tr class="clickable-row" data-url="{{ route('proaccounting.switch_connection') }}?client_code={{ $PA['client_code'] }}">
                                        <td>{{ $no++ }}</td>
                                        <td> {{ $PA['client_code'] }}</td>
                                        <td> {{ $PA['client_name'] }}</td>
                                        <td> {{ $last_date }}</td>
                                        <td> {{ $total_journal}}</td>
                                        <td> {{ $total_journal_manual }}</td>
                                        <td> {{ $total_journal_prohukum }}</td>
                                    </tr>
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
    document.querySelectorAll('.clickable-row').forEach(row => {
        row.addEventListener('click', function() {
            window.location.href = this.dataset.url;
        });
    });
</script>

@endsection
