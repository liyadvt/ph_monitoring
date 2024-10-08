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
    <h4 class="text-primary align-middle mt-4 mb-0">Modify Setting Proaccounting</h4>
    <br>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{route('proaccounting.update')}}" method="POST">
                @csrf
                @method('PATCH')
                
                @if(Session::get('success')) 
                <div class="alert alert-success"> {{Session::get('success')}}</div>
                @endif
                @if(Session::get('deleted')) 
                <div class="alert alert-danger"> {{Session::get('deleted')}}</div>
                @endif

                <div class="container">
                    <div class="col-md-12 mt-4">
                        <div class="w-100">

                            @foreach ($setting as $settings)
                                <div class="row mt-3">
                                    <label class="col-2">
                                        <p class="mb-0 fw-semibold text-md w-20">{{ str_replace('_', ' ', $settings->key) }}</p>
                                    </label>
                                    
                                    <div class="col-10">
                                        <input
                                            name="setting[{{ $loop->index }}][key]" type="hidden" value="{{ $settings->key }}" />
                                        <input
                                            name="setting[{{ $loop->index }}][value]"
                                            type="text"
                                            class="form-control text-s"
                                            value="{{ $settings->value }}"
                                        />
                                    </div>
                                </div>
                            @endforeach

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
