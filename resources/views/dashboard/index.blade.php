@extends('layout.app')

@section('title','Dashboard Admin Taekwondo')

@section('content')

<div class="container-fluid">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- HEADER -->
    <div class="mb-4">
        <h3 class="fw-bold">Dashboard Taekwondo</h3>
        <p class="text-muted">Ringkasan sistem manajemen dojo hari ini</p>
    </div>

    <!-- ================= SUMMARY ================= -->
    <div class="row g-4">

        <div class="col-lg-3 col-md-6">
            <div class="dashboard-card card-purple">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="card-label">Total Murid</div>
                        <div class="card-amount">120</div>
                    </div>
                    <div class="card-icon">
                        <i class="bi bi-people"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="dashboard-card card-blue">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="card-label">Total Pembina</div>
                        <div class="card-amount">5</div>
                    </div>
                    <div class="card-icon">
                        <i class="bi bi-person-badge"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="dashboard-card card-light-blue">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="card-label">Total Event</div>
                        <div class="card-amount">4</div>
                    </div>
                    <div class="card-icon">
                        <i class="bi bi-calendar-event"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="dashboard-card card-blue">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="card-label">Iuran Bulan Ini</div>
                        <div class="card-amount">Rp 3.500.000</div>
                    </div>
                    <div class="card-icon">
                        <i class="bi bi-cash-coin"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- ================= CONTENT SECTION ================= -->
    <div class="row mt-5 g-4">

        <!-- EVENT -->
        <div class="col-lg-6">
            <div class="stats-card h-100">
                <h5 class="fw-semibold mb-3">Event Mendatang</h5>
                <div class="d-flex justify-content-between border-bottom py-2">
                    <span>Kejuaraan Antar Dojo</span>
                    <small class="text-muted">25 Juni 2026</small>
                </div>
                <div class="d-flex justify-content-between py-2">
                    <span>Ujian Kenaikan Sabuk</span>
                    <small class="text-muted">10 Juli 2026</small>
                </div>
            </div>
        </div>

        <!-- MURID BELUM BAYAR -->
        <div class="col-lg-6">
            <div class="stats-card h-100">
                <h5 class="fw-semibold mb-3">Murid Belum Bayar</h5>
                <div class="d-flex justify-content-between border-bottom py-2">
                    <span>Ahmad</span>
                    <small class="text-danger">Belum Lunas</small>
                </div>
                <div class="d-flex justify-content-between border-bottom py-2">
                    <span>Siti</span>
                    <small class="text-danger">Belum Lunas</small>
                </div>
                <div class="d-flex justify-content-between py-2">
                    <span>Rizky</span>
                    <small class="text-danger">Belum Lunas</small>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection