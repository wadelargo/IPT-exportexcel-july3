@extends('layout')

@section('content')

<div class="d-flex justify-content-between gap-2 p-4" style="background-color: rgb(150, 200, 255);">
    <div style="text-align: right; border: 1px solid #ccc; padding: 10px; border-radius: 5px; display: flex; align-items: center;">
        <form action="{{ route('laptop.import') }}" method="POST" enctype="multipart/form-data" class="d-flex flex-column gap-2 shadow-sm p-3 bg-white rounded">
            @csrf
            <input type="file" name="csv_file" class="form-control">
            <button type="submit" class="btn btn-primary btn-sm mt-2">Import CSV</button>
        </form>

        <a href="{{ route('scanner') }}" class="btn btn-outline-secondary btn-sm d-flex align-items-center gap-2" style="margin-right: 5px;" aria-label="Scanner">
            <svg id="Layer_1" data-name="Layer 1" class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.61 122.88" style="width: 20px; height: 20px;">
                <title>scan</title>
                <path d="M23.38,0h13V11.15h-13a12.22,12.22,0,0,0-8.64,3.57l0,0a12.22,12.22,0,0,0-3.57,8.64V39.32H0V23.38A23.32,23.32,0,0,1,6.86,6.89l0,0A23.31,23.31,0,0,1,23.38,0ZM3.25,54.91H119.36a3.29,3.29,0,0,1,3.25,3.27V64.7A3.29,3.29,0,0,1,119.36,68H3.25A3.28,3.28,0,0,1,0,64.7V58.18a3.27,3.27,0,0,1,3.25-3.27ZM90.57,0h8.66a23.28,23.28,0,0,1,16.49,6.86v0a23.32,23.32,0,0,1,6.87,16.52V39.32H111.46V23.38a12.2,12.2,0,0,0-3.6-8.63v0a12.21,12.21,0,0,0-8.64-3.58H90.57V0Zm32,81.85V99.5a23.46,23.46,0,0,1-23.38,23.38H90.57V111.73h8.66A12.29,12.29,0,0,0,111.46,99.5V81.85Zm-86.23,41h-13A23.32,23.32,0,0,1,6.86,116l-.32-.35A23.28,23.28,0,0,1,0,99.5V81.85H11.15V99.5a12.25,12.25,0,0,0,3.35,8.41l.25.22a12.2,12.2,0,0,0,8.63,3.6h13v11.15Z"/>
            </svg>
        </a>
        <a href="/laptops/csv-all" target="_blank" class="btn btn-primary rounded-2" style="margin-right: 5px;" aria-label="Download CSV">CSV</a>
        <a href="/laptops/pdf" target="_blank" class="btn btn-primary rounded-2" style="margin-right: 5px;" aria-label="Download PDF">Export</a>
        <a href="{{ route('laptops.exportExcel') }}" class="btn btn-success rounded-2" style="margin-right: 5px;" aria-label="Export to Excel">Export to Excel</a> <!-- Added Export to Excel Button -->
    </div>
</div>





<div class="container mt-4">
    <div class="row">
        @foreach($laptops as $laptop)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{ asset($laptop->image) }}" alt="{{ $laptop->brand_name }}" class="img-fluid mb-2" style="max-height: 200px;">
                    {!! QrCode::size(100)->generate(Request::url() . '/laptops/' . $laptop->id) !!}
                    <h5 class="card-title">{{ $laptop->brand_name }}</h5>
                    <p class="card-text">{{ $laptop->description }}</p>
                    <p class="card-text">{{ $laptop->price }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
