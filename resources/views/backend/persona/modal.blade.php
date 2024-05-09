{{-- <div class="modal-dialog modal-lg modal-dialog-centered" role="document"> --}}
<div class="modal fade" id="modal-main" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-capitalize" id="modal-title">Nueva Persona</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pt-1">
                @include('backend.persona.form')
            </div>
            <div class="modal-footer">
                <button id="btn-cancel" type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal"><i
                        class="material-icons">close</i> Cancelar</button>
                <button id="btn-submit" type="button" class="btn bg-gradient-primary "><i
                        class="material-icons">done</i> Guardar</button>
            </div>
        </div>
    </div>
</div>


{{-- <div class="modal fade" id="modal-main" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog mt-lg-10">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">
                    Import CSV
                </h5>
                <i class="material-icons ms-3">file_upload</i>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>You can browse your computer for a file.</p>
                <div class="input-group input-group-dynamic mb-3">
                    <label class="form-label">Browse file...</label>
                    <input type="email" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" />
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value id="importCheck" checked />
                    <label class="custom-control-label" for="importCheck">I accept the terms and
                        conditions</label>
                </div>
                @include('backend.persona.form')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary btn-sm" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn bg-gradient-primary btn-sm">
                    Upload
                </button>
            </div>
        </div>
    </div>
</div> --}}
<!-- Modal -->
