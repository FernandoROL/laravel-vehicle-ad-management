@if(session('toast'))
<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="liveToast" class="toast align-items-center text-white {{ session('toast.color') }}" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000" data-bs-autohide="true">
        <div class="toast-header">
            <strong class="me-auto">{{ session('toast.title') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ session('toast.message') }}
        </div>
    </div>
</div>
@endif

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var toastEl = document.getElementById('liveToast');
        if (toastEl) {
            var toast = new bootstrap.Toast(toastEl);
            toast.show();
        }
    });
</script>
