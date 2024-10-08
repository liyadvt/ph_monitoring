@extends('component.sidebar')

@section('content')
<style>
    .icons{
        padding-right: 5px;
    }

    /* highcharts */
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 310px;
        max-width: 800px;
        margin: 1em auto;
    }

    #container {
        height: 500px;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 600px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }


</style>

<div class="title m-2">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="text-primary mt-4 mb-2">Journal {{ $client_name }} </h4>

        <a href="{{ route('proaccounting.edit') }}" class="btn btn-primary rounded">
            <i class="fa-solid fa-pen"></i>
        </a>        
    </div>    

    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="align-middle text-primary m-3 mt-0 text-uppercase">Last Date</h6>
                    <p class="text-center fw-semibold fs-6">{{$last_date}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="align-middle text-primary m-3 mt-0 text-uppercase">Total Journal</h6>
                    <p class="text-center fw-semibold fs-6">{{$total_journal}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="align-middle text-primary m-3 mt-0 text-uppercase">total amount</h6>
                    <p class="text-center fw-semibold fs-6">{{$total_amount}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form>
                <div class="container mt-2">
                    <h6 class="align-middle m-3 mt-0 text-uppercase text-primary">Chart {{ $client_name }} </h6>

                        <figure class="highcharts-figure">
                            <div id="container"></div>
                        </figure>
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

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

{{-- highcharts --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: ' ',
            },
            xAxis: {
                categories: @json($categories),
                crosshair: true,
                accessibility: {
                    description: 'Journal Dates'
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah Journal'
                }
            },
            tooltip: {
                valueSuffix: ' journals'
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [
                {
                    name: 'Manual',
                    data: @json($journal_manual)
                },
                {
                    name: 'Prohukum',
                    data: @json($journal_prohukum)
                }
            ]
        });
    });
</script>


@endsection
