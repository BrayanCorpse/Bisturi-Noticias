@extends('admin.template.main')

@section('title', 'Reportes de Bisturí Nosticias por Google Analytics.')

@section('content')
<div class="row mt-4 b-row">
    @foreach ($reports as $report)
    <div class="col">
        <div class="card mt-3">
            <div class=" card-header">
                <span class="badge badge-info">{{ date('d-m-Y', strtotime($report->date)) }}</span>
                <small>{{ $report->title}}</small> 
            </div>
            <iframe class="analytics-pdf" src="https://docs.google.com/viewer?url={{ asset('storage'.'/'.'GoogleAnalytics'.'/'. $report->name ) }}&embedded=true" frameborder="0">
            </iframe>
        </div>
    </div>
    @endforeach    
</div>

<br>
{{ $reports->links() }}


@endsection
