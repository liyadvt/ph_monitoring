@extends('component.sidebar')

@section('content')
<style>
    .icons{
        padding-right: 5px;
    }
</style>

<div class="title m-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="text-primary mt-4 mb-2">hii</h4>    
    </div>    



    <div class="card shadow-sm">
        <div class="card-body">
            <form>
                <div class="container mt-2">
                   
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
