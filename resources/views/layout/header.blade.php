<div class="top-navbar d-flex justify-content-between align-items-center">

    <!-- Title -->
    <h5 class="mb-0">@yield('title')</h5>

    <!-- Right Menu -->
    <div class="d-flex align-items-center gap-3">

        <!-- Notification -->
        <button class="btn btn-light position-relative">
            <i class="bi bi-bell"></i>
            <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
        </button>

        <!-- User Dropdown -->
        <div class="dropdown">

            <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle"></i>
                {{ Auth::user()->name ?? 'Admin' }}
            </button>

            <ul class="dropdown-menu dropdown-menu-end">

                <li>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        Profile
                    </a>
                </li>

                <li><hr class="dropdown-divider"></li>

                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item">
                            Logout
                        </button>
                    </form>
                </li>

            </ul>

        </div>

    </div>

</div>