@extends('layout.app')

@section('title','Data Event')

@section('content')

<div class="container-fluid">

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold mb-1">
            <i class="fa-solid fa-calendar-days me-2"></i>
            Manajemen Event
        </h3>
        <small class="text-muted">Kelola agenda kegiatan</small>
    </div>

    <a href="{{ route('events.create') }}" 
       class="btn btn-primary px-4 rounded-3">
        <i class="fa-solid fa-plus"></i> Tambah Event
    </a>
</div>


<div class="row">

@foreach($events as $event)

<div class="col-md-4 mb-4">

<div class="card shadow-sm border-0 rounded-4 h-100">

<div class="card-body">

<h5 class="fw-bold mb-3">
<i class="fa-solid fa-ticket me-2"></i>
{{ $event->judul }}
</h5>

<p class="mb-2 text-muted">
<i class="fa-solid fa-calendar me-2"></i>
{{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}
</p>

<p class="mb-3 text-muted">
<i class="fa-solid fa-location-dot me-2"></i>
{{ $event->lokasi }}
</p>

@if($event->peserta_count >= $event->kuota)
<span class="badge bg-danger">
<i class="fa-solid fa-circle-xmark"></i> Kuota Penuh
</span>
@else
<span class="badge bg-success">
<i class="fa-solid fa-circle-check"></i> Kuota Tersedia
</span>
@endif

</div>


<div class="card-footer bg-white border-0 d-flex justify-content-between">

<a href="{{ route('events.edit',$event->id) }}"
   class="btn btn-sm btn-warning">
   <i class="fa-solid fa-pen"></i>
</a>

<form action="{{ route('events.destroy',$event->id) }}"
      method="POST"
      onsubmit="return confirm('Yakin hapus event?')">

@csrf
@method('DELETE')

<button class="btn btn-sm btn-danger">
<i class="fa-solid fa-trash"></i>
</button>

</form>

</div>

</div>

</div>

@endforeach

</div>

</div>

@endsection