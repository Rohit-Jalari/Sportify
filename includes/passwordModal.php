<div class="modal fade" id="passwordModalToggle">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="min-height: 24rem;min-width: 19.6rem;">
            <div class="modal-header">
                <h4 class="modal-title fw-bold"
                    style="width:100%;display:flex; justify-content:center;align-items:center;" id="modalToggleLabel"
                    style="font-size: 1.5rem;">Authenticate</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body text-white">
                <h6 class="mb-5" style="line-height:1.3rem;display:flex;justify-content:center;align-items:center;">Please verify using the code sent to your Mail</h6>
                <div class="mb-3 Input">
                    
                    <label for="email" class="form-label">Enter Code</label>
                    <input type="text" class="form-control" id="modalCode" name="code" placeholder="Enter your Code">
                    <small></small>
                </div>
                <button class="btn btn-primary d-grid w-100" id="verify">Verify</button>
            </div>
        </div>
    </div>
</div>