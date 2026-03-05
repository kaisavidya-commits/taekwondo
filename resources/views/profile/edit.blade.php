@extends('layout.app')

@section('title','Profile')

@section('content')

<style>

    .form-modern label {
        font-weight: 600;
        margin-bottom: 6px;
        color: #14133B;
    }

    .form-modern .form-control {
        border-radius: 14px;
        padding: 12px 16px;
        border: 1px solid #e0e0e0;
        transition: 0.3s;
        box-shadow: none;
    }

    .form-modern .form-control:focus {
        border-color: #6E0F18;
        box-shadow: 0 0 0 4px rgba(110,15,24,0.1);
    }

    .btn-modern {
        background: linear-gradient(135deg, #14133B, #6E0F18);
        border: none;
        border-radius: 14px;
        padding: 10px 22px;
        color: white;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.15);
    }

    .section-desc {
        font-size: 14px;
        color: #777;
        margin-bottom: 20px;
    }

    .profile-hero {
        background: linear-gradient(135deg, #14133B, #6E0F18);
        border-radius: 25px;
        position: relative;
        overflow: hidden;
    }

    .profile-hero::after {
        content: "";
        position: absolute;
        top: -40px;
        right: -40px;
        width: 200px;
        height: 200px;
        background: rgba(255,255,255,0.08);
        border-radius: 50%;
    }

    .avatar-modern {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        background: rgba(255,255,255,0.9);
        color: #14133B;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 34px;
        font-weight: bold;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    }

    .glass-card {
        border-radius: 25px;
        background: rgba(255,255,255,0.85);
        backdrop-filter: blur(12px);
        transition: 0.3s ease-in-out;
    }

    .glass-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    }

    .section-title {
        font-weight: 700;
        color: #14133B;
        letter-spacing: .5px;
    }

    .danger-card {
        border-radius: 25px;
        background: #fff5f5;
        transition: 0.3s;
    }

    .danger-card:hover {
        box-shadow: 0 10px 30px rgba(139,42,46,0.15);
    }

    .delete-modern {
        background: linear-gradient(135deg, #fff5f5, #ffecec);
        border-radius: 20px;
        padding: 25px;
        position: relative;
    }

    .delete-warning-box {
        background: #ffffff;
        border-radius: 15px;
        padding: 18px;
        border-left: 4px solid #dc3545;
        font-size: 14px;
        color: #555;
        margin-bottom: 20px;
    }

    .btn-delete-modern {
        background: linear-gradient(135deg, #8B2A2E, #dc3545);
        border: none;
        border-radius: 14px;
        padding: 10px 22px;
        color: white;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-delete-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(220,53,69,0.3);
    }

    .delete-title {
        font-weight: 700;
        color: #8B2A2E;
        margin-bottom: 8px;
    }

    .delete-subtitle {
        font-size: 14px;
        color: #777;
        margin-bottom: 20px;
    }

</style>

<div class="container-fluid py-4">

    <!-- PROFILE HERO -->
    <div class="profile-hero shadow-lg p-4 mb-5">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 position-relative">

            <div class="d-flex align-items-center gap-4 text-white">
                <div class="avatar-modern">
                    {{ strtoupper(substr(auth()->user()->name,0,1)) }}
                </div>

                <div>
                    <h3 class="fw-bold mb-1">{{ auth()->user()->name }}</h3>
                    <div style="opacity:.8">{{ auth()->user()->email }}</div>
                </div>
            </div>

            <div class="text-white text-end">
                <div style="opacity:.7">Role</div>
                <div class="fw-bold fs-5">Administrator</div>
            </div>

        </div>
    </div>


    <div class="row g-4">

        <!-- Informasi Profil -->
        <div class="col-lg-6">
            <div class="glass-card shadow-sm p-4 h-100">
                <h5 class="section-title mb-3">
                    <i class="bi bi-person-circle me-2"></i>
                    Informasi Profil
                </h5>
                <hr>
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <!-- Ubah Password -->
        <div class="col-lg-6">
            <div class="glass-card shadow-sm p-4 h-100">
                <h5 class="section-title mb-3">
                    <i class="bi bi-shield-lock me-2"></i>
                    Ubah Password
                </h5>
                <hr>
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <!-- Hapus Akun -->
        <div class="col-12">
            <div class="danger-card shadow-sm p-4">
                <h5 class="fw-bold mb-3 text-danger">
                    <i class="bi bi-trash3 me-2"></i>
                    Hapus Akun
                </h5>
                @include('profile.partials.delete-user-form')
            </div>
        </div>

    </div>

</div>

@endsection