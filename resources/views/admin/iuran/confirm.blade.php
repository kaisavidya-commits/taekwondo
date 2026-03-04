@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Konfirmasi Pembayaran</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Murid</th>
                <th>Unit</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($iurans as $iuran)
            <tr>
                <td>{{ $iuran->murid->name }}</td>
                <td>{{ $iuran->unit }}</td>
                <td>{{ $iuran->harga ?? '-' }}</td>
                <td>{{ $iuran->status ?? 'Belum Lunas' }}</td>
                <td>
                    @if($iuran->status != 'Lunas')
                        <form action="{{ route('admin.iuran.confirm', $iuran->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Konfirmasi</button>
                        </form>
                    @else
                        <span class="badge bg-success">Sudah Lunas</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection