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
    <h4 class="text-primary mt-4 mb-0 align-middle">Prohukum</h4>
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
                
                    <div class="border-gray-subtle border rounded-2 overflow-hidden">
                        <div class="table-container">
                            <table class="table table-hover align-middle mb-0 bg-white">
                                <thead class="table-active">
                                    <tr>
                                        <th class="w-15 text-s pointer fw-bold text-center">No</th>
                                        <th class="w-15 text-s pointer fw-bold text-center">Client Code</th>
                                        <th class="w-15 text-s pointer fw-bold text-center">Client Name</th>
                                        <th class="w-15 text-s pointer fw-bold text-center">Prohukum Database IP</th>
                                        <th class="w-15 text-s pointer fw-bold text-center">Prohukum Database Port</th>
                                        <th class="w-15 text-s pointer fw-bold text-center">Prohukum Database User</th>
                                        <th class="w-15 text-s pointer fw-bold text-center">Prohukum Database Name</th>
                                        <th class="w-25 text-s pointer fw-bold text-center">Prohukum Database Password</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($prohukum as $PH)
                                    <tr class="clickable-row" data-url="{{ route('prohukum.switch_connection') }}?client_code={{ $PH['client_code'] }}">
                                        <td class="w-15">{{ $no++ }}</td>
                                        <td class="w-15"> {{ $PH['client_code'] }}</td>
                                        <td class="w-15"> {{ $PH['client_name'] }}</td>
                                        <td class="w-15"> {{ $PH['prohukum_database_ip']?? '-' }}</td>
                                        <td class="w-15"> {{ $PH['prohukum_database_port']?? '-' }}</td>
                                        <td class="w-15"> {{ $PH['prohukum_database_user']?? '-' }}</td>
                                        <td class="w-15"> {{ $PH['prohukum_database_password']?? '-' }}</td>
                                        <td class="w-25"> {{ $PH['prohukum_database_name']?? '-' }}</td>
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
