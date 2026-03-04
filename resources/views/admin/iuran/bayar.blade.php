@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bayar Tagihan</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Unit</th>
                <th>Harga</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($iurans as $iuran)
            @if($iuran->murid->id === auth()->id())
            <tr>
                <td>{{ $iuran->unit }}</td>
                <td>{{ $iuran->harga ?? '-' }}</td>
                <td>{{ $iuran->keterangan ?? '-' }}</td>
                <td>{{ $iuran->status ?? 'Belum Bayar' }}</td>
                <td>
                    @if($iuran->status != 'Lunas')
                        <form action="{{ route('murid.iuran.bayar', $iuran->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-sm">Bayar</button>
                        </form>
                    @else
                        <span class="badge bg-success">Sudah Bayar</span>
                    @endif
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection