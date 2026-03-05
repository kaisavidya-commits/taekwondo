@extends('layout.app')

@section('content')

<div class="container">

<h3 class="fw-bold mb-4">Event Taekwondo</h3>

<div class="row">

@foreach($events as $event)

<div class="col-md-4 mb-4">

<div class="card shadow border-0 rounded-4 h-100">

<div class="card-body">

<h5 class="fw-bold">
{{ $event->judul }}
</h5>

<p class="text-muted small">
{{ $event->deskripsi }}
</p>

<p>

<i class="fa fa-calendar"></i>
{{ $event->tanggal }}

</p>

<p>

<i class="fa fa-map-marker-alt"></i>
{{ $event->lokasi }}

</p>

<p>

<i class="fa fa-users"></i>
{{ $event->peserta_count }}/{{ $event->kuota }}

</p>


@if(\Carbon\Carbon::parse($event->tanggal)->isPast())

<button class="btn btn-secondary w-100" disabled>

Event Selesai

</button>


@elseif($event->peserta_count >= $event->kuota)

<button class="btn btn-danger w-100" disabled>

Kuota Penuh

</button>


@elseif($event->peserta->contains(auth()->id()))

<button class="btn btn-success w-100" disabled>

Sudah Daftar

</button>


@else

<form action="{{ route('event.daftar',$event->id) }}" method="POST">

@csrf

<button class="btn btn-primary w-100">

Daftar Event

</button>

</form>

@endif

@if($event->link_pendaftaran)

<a href="{{ $event->link_pendaftaran }}"
target="_blank"
class="btn btn-outline-primary w-100 mt-2">

Link Pendaftaran

</a>

@endif

</div>

</div>

</div>

@endforeach

</div>

</div>

@endsection