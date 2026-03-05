<div class="delete-modern">

    <div class="delete-title">
        <i class="bi bi-exclamation-triangle-fill me-2"></i>
        Delete Account
    </div>

    <div class="delete-subtitle">
        This action is permanent and cannot be undone.
    </div>

    <div class="delete-warning-box">
        Once your account is deleted, all of its resources and data will be permanently removed.
        Before deleting your account, please download any data or information that you wish to retain.
    </div>

    <form method="post" action="{{ route('profile.destroy') }}">
        @csrf
        @method('delete')

        <button type="submit" class="btn-delete-modern">
            <i class="bi bi-trash3-fill me-1"></i>
            Permanently Delete Account
        </button>
    </form>

</div>