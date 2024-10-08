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
    <h4 class="text-primary align-middle mt-4 mb-0">Modify Documentation</h4>
    <br>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{route('documentation.update', $documentation['id'])}}" method="POST">
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
                                    Client ID <code>*</code>
                                </p>
                                </label>
                                <div class="col-10">
                                    <select 
                                    id="client_id" 
                                    name="client_id" 
                                    type="text" 
                                    class="form-control text-s select2"
                                >
                                    @foreach ($select as $item)
                                        <option value="{{ $item->client_code }}">{{ $item->client_code }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label class="col-2">
                                    <p class="mb-0 fw-semibold text-md w-20">
                                        Date <code>*</code>
                                    </p>
                                </label>
                                <div class="col-10">
                                    <input 
                                        type="text"
                                        id="documentation_request_date" 
                                        name="documentation_request_date" 
                                        class="form-control datepicker"
                                        value="{{ $documentation['documentation_request_date'] }}"
                                    >
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label class="col-2">
                                <p class="mb-0 fw-semibold text-md w-20">
                                    Title<code>*</code>
                                </p>
                                </label>
                                <div class="col-10">
                                <input
                                    id="documentation_title" 
                                    name="documentation_title"
                                    type="text"
                                    class="form-control text-s"
                                    value="{{ $documentation['documentation_title'] }}"
                                />
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label class="col-2">
                                <p class="mb-0 fw-semibold text-md w-20">
                                    Description <code>*</code>
                                </p>
                                </label>
                                <div class="col-10">
                                    <textarea 
                                    class="form-control" 
                                    name="documentation_description" 
                                    id="documentation_description"
                                    rows="5">{{ $documentation['documentation_description'] }}</textarea>
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


<script src="{{ asset('assets/modules/jquery.min.js')}}"></script>
<script src="{{ asset('assets/modules/popper.js')}}"></script>
<script src="{{ asset('assets/modules/tooltip.js')}}"></script>
<script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
<script src="{{ asset('assets/modules/moment.min.js')}}"></script>
<script src="{{ asset('assets/js/stisla.js')}}"></script>

<!-- JS Libraies -->
<script src="{{ asset('assets/modules/cleave-js/dist/cleave.min.js')}}"></script>
<script src="{{ asset('assets/modules/cleave-js/dist/addons/cleave-phone.us.js')}}"></script>
<script src="{{ asset('assets/modules/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script>
<script src="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ asset('assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{ asset('assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
<script src="{{ asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js')}}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/forms-advanced-forms.js')}}"></script>

<!-- Template JS File -->
<script src="{{ asset('assets/js/scripts.js')}}"></script>
<script src="{{ asset('assets/js/custom.js')}}"></script>

@endsection

@section('script')
<script src="{{ asset('https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js')}}" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js')}}" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="{{ asset('assets/modules/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script>
<script src="{{ asset('assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{ asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js')}}"></script>

{{-- form test --}}
<script src="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/forms-advanced-forms.js')}}"></script>
@endsection
