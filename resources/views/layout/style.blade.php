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