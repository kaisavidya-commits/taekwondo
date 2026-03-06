update profil

<div class="form-modern">

    <div class="section-desc">
        Update your account's profile information and email address.
    </div>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" 
                class="form-control"
                value="{{ old('name', auth()->user()->name) }}"
                required>
        </div>

        <div class="mb-4">
            <label>Email</label>
            <input type="email" name="email"
                class="form-control"
                value="{{ old('email', auth()->user()->email) }}"
                required>
        </div>

        <button type="submit" class="btn-modern">
            <i class="bi bi-check-circle me-1"></i>
            Save Changes
        </button>

    </form>
</div>