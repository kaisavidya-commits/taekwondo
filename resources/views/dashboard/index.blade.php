@extends('layout.app')

@section('title','Dashboard')

@section('content')

@if($role === 'super_admin')
    @include('dashboard.partials.super_admin')
@elseif($role === 'admin')
    @include('dashboard.partials.admin')
@elseif($role === 'pembina')
    @include('dashboard.partials.pembina')
@elseif($role === 'murid')
    @include('dashboard.partials.murid')
@endif

@endsection