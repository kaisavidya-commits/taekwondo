<style>
    :root {
        --sidebar-width: 260px;

        --navy-dark: #14133B;
        --blue-gray: #555C84;
        --maroon: #8B2A2E;
        --burgundy: #6E0F18;
        --light-gray: #B7B8C7;
        --dark-gray: #8A8C95;
        --soft-bg: #F4F5FA;
    }

    body {
        font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        background-color: var(--soft-bg);
        overflow-x: hidden;
    }

    /* Sidebar */
    .sidebar {
        width: var(--sidebar-width);
        height: 100vh;
        position: fixed;
        left: 0;
        top: 0;
        background: var(--navy-dark);
        border-right: 1px solid var(--blue-gray);
        z-index: 1000;
        overflow-y: auto;
        padding: 20px 0;
    }

    .sidebar-brand {
        padding: 0 24px 20px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 700;
        font-size: 1.5rem;
        color: white;
    }

    .sidebar-brand i {
        color: var(--maroon);
        font-size: 1.8rem;
    }

    .nav-section {
        padding: 16px 24px 8px;
        font-size: 0.75rem;
        font-weight: 600;
        color: var(--light-gray);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .nav-link {
        padding: 12px 24px;
        color: var(--light-gray);
        display: flex;
        align-items: center;
        gap: 12px;
        transition: all 0.3s;
        margin: 2px 0;
    }

    .nav-link:hover,
    .nav-link.active {
        background-color: var(--burgundy);
        color: white;
    }

    .nav-link i {
        font-size: 1.1rem;
        width: 24px;
        text-align: center;
    }

    /* Main Content */
    .main-content {
        margin-left: var(--sidebar-width);
        padding: 20px 30px;
    }

    /* Top Navbar */
    .top-navbar {
        background: white;
        border-radius: 12px;
        padding: 12px 20px;
        margin-bottom: 24px;
        box-shadow: 0 2px 6px rgba(20, 19, 59, 0.08);
    }

    .search-box input {
        border-radius: 25px;
        padding-left: 40px;
        border: 1px solid var(--light-gray);
        background: var(--soft-bg);
    }

    .search-box i {
        color: var(--dark-gray);
    }

    /* Cards */
    .dashboard-card {
        border-radius: 16px;
        border: none;
        padding: 24px;
        color: white;
        position: relative;
        overflow: hidden;
        height: 100%;
    }

    .card-purple {
        background: linear-gradient(135deg, var(--navy-dark) 0%, var(--blue-gray) 100%);
    }

    .card-blue {
        background: linear-gradient(135deg, var(--maroon) 0%, var(--burgundy) 100%);
    }

    .card-light-blue {
        background: linear-gradient(135deg, var(--blue-gray) 0%, var(--navy-dark) 100%);
    }

    .card-icon {
        width: 48px;
        height: 48px;
        background: rgba(255,255,255,0.15);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 16px;
    }

    .trend-icon {
        position: absolute;
        top: 24px;
        right: 24px;
        width: 32px;
        height: 32px;
        background: rgba(255,255,255,0.15);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Stats Card */
    .stats-card {
        background: white;
        border-radius: 16px;
        padding: 24px;
        border: none;
        box-shadow: 0 2px 8px rgba(20, 19, 59, 0.06);
    }

    /* Stock / List Card */
    .stock-card {
        background: var(--soft-bg);
        border-radius: 16px;
        padding: 20px;
        margin-bottom: 16px;
    }

    .stock-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid var(--light-gray);
    }

    .stock-name {
        font-weight: 600;
        color: var(--navy-dark);
    }

    .profit-positive {
        color: var(--maroon);
    }

    .profit-negative {
        color: var(--dark-gray);
    }

    /* Floating Button */
    .floating-btn {
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background: var(--maroon);
        color: white;
        border: none;
        box-shadow: 0 4px 12px rgba(139, 42, 46, 0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        cursor: pointer;
        z-index: 999;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .sidebar {
            transform: translateX(-100%);
        }
        .main-content {
            margin-left: 0;
        }
    }

    
</style>

<style>

/* ===== HEADER SECTION ===== */
.page-header h3 {
    color: var(--navy-dark);
    font-weight: 700;
}

.page-header small {
    color: var(--dark-gray);
}

/* Tombol Tambah */
.btn-primary {
    background: linear-gradient(135deg, var(--maroon), var(--burgundy));
    border: none;
    border-radius: 12px;
    padding: 8px 18px;
    font-weight: 500;
    transition: 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(139, 42, 46, 0.3);
}

/* ===== CARD TABLE ===== */
.card {
    border-radius: 18px !important;
    overflow: hidden;
}

.card-body {
    background: white;
}

/* ===== SEARCH BOX ===== */
.input-group-text {
    border-radius: 12px 0 0 12px !important;
}

#searchInput {
    border-radius: 0 12px 12px 0 !important;
    transition: 0.3s;
}

#searchInput:focus {
    border-color: var(--maroon);
    box-shadow: 0 0 0 3px rgba(139, 42, 46, 0.1);
}

/* ===== TABLE STYLE ===== */
.table thead {
    background: linear-gradient(135deg, var(--navy-dark), var(--blue-gray));
    color: white;
}

.table thead th {
    border: none;
    font-weight: 600;
    font-size: 14px;
    padding: 14px;
}

.table tbody tr {
    transition: 0.25s ease;
}

.table tbody tr:hover {
    background-color: rgba(85, 92, 132, 0.08);
    transform: scale(1.01);
}

.table td {
    padding: 14px;
    vertical-align: middle;
}

/* ===== BADGE STYLE ===== */
.badge-date {
    background: rgba(20, 19, 59, 0.08);
    color: var(--navy-dark);
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
}

/* ===== BUTTON HAPUS ===== */
.btn-outline-danger {
    border-radius: 20px;
    transition: 0.3s ease;
}

.btn-outline-danger:hover {
    background: var(--maroon);
    border-color: var(--maroon);
    color: white;
    transform: translateY(-1px);
}

/* ===== EMPTY STATE ===== */
.empty-state {
    padding: 40px 0;
    color: var(--dark-gray);
    font-style: italic;
}

/* ===== ALERT ===== */
.alert-success {
    border-radius: 14px;
    background: linear-gradient(135deg, #e6f4ea, #f1fbf4);
    border: 1px solid #c3e6cb;
    color: #2f6b3f;
}

</style>

<style>

/* ===== HEADER ===== */
.page-header h3 {
    color: var(--navy-dark);
    font-weight: 700;
}

/* ===== CARD ===== */
.admin-card {
    border-radius: 20px;
    overflow: hidden;
}

/* ===== SEARCH ===== */
.search-box input {
    border-radius: 0 14px 14px 0 !important;
}

.search-box .input-group-text {
    border-radius: 14px 0 0 14px !important;
}

#searchInput:focus {
    border-color: var(--maroon);
    box-shadow: 0 0 0 3px rgba(139,42,46,0.1);
}

/* ===== TABLE ===== */
.admin-table thead {
    background: linear-gradient(135deg, var(--navy-dark), var(--blue-gray));
    color: white;
}

.admin-table thead th {
    border: none;
    padding: 14px;
    font-weight: 600;
}

.admin-table tbody tr {
    transition: 0.25s ease;
}

.admin-table tbody tr:hover {
    background-color: rgba(85, 92, 132, 0.08);
    transform: scale(1.01);
}

.admin-table td {
    padding: 14px;
}

/* ===== DATE BADGE ===== */
.badge-date {
    background: rgba(20,19,59,0.08);
    color: var(--navy-dark);
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
}

/* ===== BUTTON ===== */
.btn-primary {
    background: linear-gradient(135deg, var(--maroon), var(--burgundy));
    border: none;
    border-radius: 12px;
    padding: 8px 18px;
    font-weight: 500;
    transition: 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(139, 42, 46, 0.3);
}

.btn-outline-danger:hover {
    background: var(--maroon);
    border-color: var(--maroon);
    color: white;
}

/* ===== EMPTY STATE ===== */
.empty-state {
    padding: 40px 0;
    color: var(--dark-gray);
    font-style: italic;
}

</style>