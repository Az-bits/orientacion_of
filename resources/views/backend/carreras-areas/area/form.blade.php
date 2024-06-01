<form id='form-main'>
    <div class="row mt-3 mb-2">
        <div class="col-12 col-sm-12">
            <div class="input-group input-group-outline">
                <label for="nombre" class="form-label">Nombre de area</label>
                <input id="nombre" name="nombre" class="form-control" type="text" />
                <small>Error message</small>
            </div>
        </div>
        <div class="col-12 col-sm-12 mt-3">
            {{-- <label for="descripcion" class="form-label">Nombre de area</label> --}}
            <label class="form-control ms-0">Descripción</label>
            <div class="input-group input-group-outline">
                <textarea id="descripcion" name="descripcion" class="form-control" rows="5" placeholder="Descripción del area"
                    spellcheck="false"></textarea>
                <small>Error message</small>
            </div>
        </div>
    </div>
</form>
