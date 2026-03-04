@php $role = auth()->user()->role; @endphp

<nav class="sidebar">

    <div class="sidebar-brand">
        <i class="bi bi-flower1"></i>
        TAEKWONDO
    </div>

    <!-- Dashboard (SEMUA ROLE) -->
    <div class="nav-section">Dashboard</div>
    <a href="/admin/dashboard" class="nav-link">
        <i class="bi bi-speedometer2"></i> Dashboard
    </a>

    <!-- ================= MANAGEMEN ================= -->

    @if(in_array($role, ['super_admin','admin','pembina']))
    <div class="nav-section">Manajemen</div>
    @endif

    @if($role === 'super_admin')
    <a href="/admin/admin" class="nav-link">
        <i class="bi bi-person-gear"></i> Admin
    </a>
    @endif

    @if(in_array($role, ['super_admin','admin']))
    <a href="/admin/pembina" class="nav-link">
        <i class="bi bi-person-badge"></i> Pembina
    </a>
    @endif

    @if(in_array($role, ['super_admin','admin','pembina']))
    <a href="/admin/murid" class="nav-link">
        <i class="bi bi-people"></i> Murid
    </a>
    @endif


    <!-- ================= PENDAFTARAN ================= -->

    @if(in_array($role, ['super_admin','admin']))
    <div class="nav-section">Pendaftaran</div>

    <a href="/admin/pendaftar" class="nav-link">
        <i class="bi bi-person-plus"></i> Pendaftar
    </a>
    @endif


    <!-- ================= KEGIATAN ================= -->

    <div class="nav-section">Kegiatan</div>

    @if(in_array($role, ['super_admin','admin','pembina','murid']))
    <a href="/admin/event" class="nav-link">
        <i class="bi bi-calendar-event"></i> Event
    </a>

    <a href="/admin/galeri" class="nav-link">
        <i class="bi bi-images"></i> Galeri
    </a>
    @endif


    <!-- ================= KEUANGAN ================= -->

    @if(in_array($role, ['super_admin','admin']))
    <div class="nav-section">Keuangan</div>

    <a href="/admin/iuran" class="nav-link">
        <i class="bi bi-cash"></i> Iuran
    </a>
    @endif

</nav>