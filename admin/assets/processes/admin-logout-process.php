<form method="POST">
    <div class="settings ps-2 pt-5">
        <div class="logout p-3" id="btn4" data-bs-toggle="modal" data-bs-target="#logoutModal">
            <i class="fa-solid fa-right-from-bracket logout-icon pe-1"></i>
            <span class="nav-text-side text-start ps-3 ps-sm-3">Log out</span>
        </div>

        <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true"
            data-bs-theme="dark">
            <div class="modal-dialog  modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title  w-100 text-center fs-4" id="confirmationLogout">Log out Account
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        Are you sure you want to log out?
                    </div>
                    <div class="container d-flex justify-content-end my-3">
                        <button type="button" class="btn-logout-denied text-center mx-2" data-bs-dismiss="modal"
                            name="btnDenied">No</button>
                        <button type="submit" class="btn-logout-confirmed text-center" name="btnConfirmed">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>