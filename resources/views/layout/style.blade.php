
<style>
        :root {
            --sidebar-width: 260px;
            --primary-purple: #673ab7;
            --primary-blue: #2196f3;
            --bg-light: #f8f9fa;
            --text-muted: #6c757d;
        }

        body {
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: #f4f6f8;
            overflow-x: hidden;
        }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: #fff;
            border-right: 1px solid #e9ecef;
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
            color: #333;
        }

        .sidebar-brand i {
            color: var(--primary-blue);
            font-size: 1.8rem;
        }

        .nav-section {
            padding: 16px 24px 8px;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .nav-link {
            padding: 12px 24px;
            color: #495057;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s;
            border-radius: 0;
            margin: 2px 0;
        }

        .nav-link:hover, .nav-link.active {
            background-color: #f8f9fa;
            color: var(--primary-purple);
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
            background: #fff;
            border-radius: 12px;
            padding: 12px 20px;
            margin-bottom: 24px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.04);
        }

        .search-box {
            position: relative;
            max-width: 400px;
        }

        .search-box input {
            border-radius: 25px;
            padding-left: 40px;
            border: 1px solid #e9ecef;
            background: #f8f9fa;
        }

        .search-box i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
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
            background: linear-gradient(135deg, #7c4dff 0%, #651fff 100%);
        }

        .card-blue {
            background: linear-gradient(135deg, #448aff 0%, #2979ff 100%);
        }

        .card-light-blue {
            background: linear-gradient(135deg, #40c4ff 0%, #00b0ff 100%);
        }

        .card-icon {
            width: 48px;
            height: 48px;
            background: rgba(255,255,255,0.2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 16px;
        }

        .card-amount {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .card-label {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .trend-icon {
            position: absolute;
            top: 24px;
            right: 24px;
            width: 32px;
            height: 32px;
            background: rgba(255,255,255,0.2);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .mini-chart {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 150px;
            height: 80px;
            opacity: 0.3;
        }

        /* Stats Card */
        .stats-card {
            background: #fff;
            border-radius: 16px;
            padding: 24px;
            border: none;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }

        .growth-chart {
            height: 300px;
        }

        /* Popular Stocks */
        .stock-card {
            background: linear-gradient(135deg, #f3e5f5 0%, #e1bee7 100%);
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 16px;
        }

        .stock-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .stock-item:last-child {
            border-bottom: none;
        }

        .stock-name {
            font-weight: 600;
            color: #333;
        }

        .stock-profit {
            font-size: 0.85rem;
        }

        .profit-positive {
            color: #4caf50;
        }

        .profit-negative {
            color: #f44336;
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

        .btn-group-custom .btn {
            border-radius: 20px;
            padding: 6px 16px;
            font-size: 0.85rem;
        }

        .dropdown-custom {
            border-radius: 8px;
            border: 1px solid #e9ecef;
        }

        .floating-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: var(--primary-purple);
            color: white;
            border: none;
            box-shadow: 0 4px 12px rgba(103, 58, 183, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            cursor: pointer;
            z-index: 999;
        }
    </style>