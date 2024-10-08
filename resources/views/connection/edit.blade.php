@extends('component.sidebar')

@section('content')
<style>
    .w-15{
        width: 15%;
    }
    .w-25{
        width: 25%;
    }
    a{
        text-decoration: none;
    }
    .icons{
        padding-right: 5px;
    }
</style>

<div class="title">
    <h4 class="text-primary align-middle mt-4 mb-0">Modify Connection</h4>
    <br>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{route('connection.update', $connection['id'])}}" method="POST">
                @csrf
                @method('PATCH')
                
                @if($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="container">
                    <div class="col-md-12 mt-4">
                        <div class="w-100">
                            <div class="row mt-3">
                                <label class="col-2">
                                <p class="mb-0 fw-semibold text-md w-20">
                                    Client Code <code>*</code>
                                </p>
                                </label>
                                <div class="col-10">
                                <input
                                    id="client_code" 
                                    name="client_code"
                                    type="text"
                                    class="form-control text-s"
                                    value="{{ $connection['client_code'] }}"
                                />
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label class="col-2">
                                <p class="mb-0 fw-semibold text-md w-20">
                                    Client Name <code>*</code>
                                </p>
                                </label>
                                <div class="col-10">
                                <input
                                    id="client_name" 
                                    name="client_name"
                                    type="text"
                                    class="form-control text-s"
                                    value="{{ $connection['client_name'] }}"
                                />
                                </div>
                            </div>

                            {{-- prohukum --}}
                            <div class="row mt-3">
                                <label class="col-2">
                                <p class="mb-0 fw-semibold text-md w-20">
                                    Prohukum Database IP<code>*</code>
                                </p>
                                </label>
                                <div class="col-10">
                                <input
                                    id="prohukum_database_ip" 
                                    name="prohukum_database_ip"
                                    type="text"
                                    class="form-control text-s"
                                    value="{{ $connection['prohukum_database_ip'] }}"
                                />
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label class="col-2">
                                <p class="mb-0 fw-semibold text-md w-20">
                                    Prohukum Database Port <code>*</code>
                                </p>
                                </label>
                                <div class="col-10">
                                <input
                                    id="prohukum_database_port" 
                                    name="prohukum_database_port"
                                    type="text"
                                    class="form-control text-s"
                                    value="{{ $connection['prohukum_database_port'] }}"
                                />
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label class="col-2">
                                <p class="mb-0 fw-semibold text-md w-20">
                                    Prohukum Database User <code>*</code>
                                </p>
                                </label>
                                <div class="col-10">
                                <input
                                    id="prohukum_database_user" 
                                    name="prohukum_database_user"
                                    type="text"
                                    class="form-control text-s"
                                    value="{{ $connection['prohukum_database_user'] }}"
                                />
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label class="col-2">
                                <p class="mb-0 fw-semibold text-md w-20">
                                    Prohukum Database Name <code>*</code>
                                </p>
                                </label>
                                <div class="col-10">
                                <input
                                    id="prohukum_database_name" 
                                    name="prohukum_database_name"
                                    type="text"
                                    class="form-control text-s"
                                    value="{{ $connection['prohukum_database_password'] }}"
                                />
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label class="col-2">
                                <p class="mb-0 fw-semibold text-md w-20">
                                    Prohukum Database Password <code>*</code>
                                </p>
                                </label>
                                <div class="col-10">
                                <input
                                    id="prohukum_database_password" 
                                    name="prohukum_database_password"
                                    type="password"
                                    class="form-control text-s"
                                    value="{{ $connection['prohukum_database_name'] }}"
                                />
                                </div>
                            </div>

                            {{-- proaccounting --}}
                            <div class="row mt-3">
                                <label class="col-2">
                                <p class="mb-0 fw-semibold text-md w-20">
                                    Proaccounting Database IP
                                </p>
                                </label>
                                <div class="col-10">
                                <input
                                    id="proaccounting_database_ip" 
                                    name="proaccounting_database_ip"
                                    type="text"
                                    class="form-control text-s"
                                    value="{{ $connection['proaccounting_database_ip'] }}"
                                />
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label class="col-2">
                                <p class="mb-0 fw-semibold text-md w-20">
                                    Proaccounting Database Port 
                                </p>
                                </label>
                                <div class="col-10">
                                <input
                                    id="proaccounting_database_port" 
                                    name="proaccounting_database_port"
                                    type="text"
                                    class="form-control text-s"
                                    value="{{ $connection['proaccounting_database_port'] }}"
                                />
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label class="col-2">
                                <p class="mb-0 fw-semibold text-md w-20">
                                    Proaccounting Database User 
                                </p>
                                </label>
                                <div class="col-10">
                                <input
                                    id="proaccounting_database_user" 
                                    name="proaccounting_database_user"
                                    type="text"
                                    class="form-control text-s"
                                    value="{{ $connection['proaccounting_database_user'] }}"
                                />
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label class="col-2">
                                <p class="mb-0 fw-semibold text-md w-20">
                                    Proaccounting Database Name 
                                </p>
                                </label>
                                <div class="col-10">
                                <input
                                    id="proaccounting_database_name" 
                                    name="proaccounting_database_name"
                                    type="text"
                                    class="form-control text-s"
                                    value="{{ $connection['proaccounting_database_password'] }}"
                                />
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label class="col-2">
                                <p class="mb-0 fw-semibold text-md w-20">
                                    Proaccounting Database Password 
                                </p>
                                </label>
                                <div class="col-10">
                                <input
                                    id="proaccounting_database_password" 
                                    name="proaccounting_database_password"
                                    type="password"
                                    class="form-control text-s"
                                    value="{{ $connection['proaccounting_database_name'] }}"
                                />
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-3 pt-3">
                                <button
                                    type="submit"
                                    class="btn-primary btn rounded-2 pjsregular"
                                >
                                Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
