<div class="form-modern">

    <div class="section-desc">
        Ensure your account is using a long, random password to stay secure.
    </div>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="mb-3">
            <label>Current Password</label>
            <input type="password" name="current_password"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label>New Password</label>
            <input type="password" name="password"
                class="form-control"
                required>
        </div>

        <div class="mb-4">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation"
                class="form-control"
                required>
        </div>

        <button type="submit" class="btn-modern">
            <i class="bi bi-shield-check me-1"></i>
            Update Password
        </button>

    </form>
</div>