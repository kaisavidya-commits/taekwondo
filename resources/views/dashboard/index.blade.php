@extends('layout.app')

@section('title','Dashboard Admin')

@section('content')

<div class="row g-4">

<div class="col-md-4">
<div class="dashboard-card card-purple">
<div class="card-amount">120</div>
<div class="card-label">Total Siswa</div>
</div>
</div>

<div class="col-md-4">
<div class="dashboard-card card-blue">
<div class="card-amount">32</div>
<div class="card-label">Total Pendaftar</div>
</div>
</div>

<div class="col-md-4">
<div class="dashboard-card card-light-blue">
<div class="card-amount">Rp 75.000</div>
<div class="card-label">Iuran Bulanan</div>
</div>
</div>

</div>

@endsection