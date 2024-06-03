{{-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css"> --}}

<form id='form-main'>
    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <div class="input-group input-group-outline">
                <label for="ci" class="form-label">Cedula de identidad</label>
                <input id="ci" name="ci" class="form-control" type="text" />
                <small>Error message</small>
            </div>
        </div>
    </div>
    <div class="row mt-4 mt-sm-4">
        <div class="col-12 col-sm-4">
            <div class="input-group input-group-outline">
                <label for="nombre" class="form-label">Nombres</label>
                <input id="nombre" name="nombre" class="form-control" type="text" />
                <small>Error message</small>
            </div>
        </div>
        <div class="col-12 col-sm-4  mt-5 mt-sm-0">
            <div class="input-group input-group-outline">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input id="apellidos" name="apellidos" class="form-control" type="text" />
                <small>Error message</small>
            </div>
        </div>
        <div class="col-12 col-sm-4 mt-5 mt-sm-0">
            <div class="input-group input-group-outline">
                <label for="edad" class="form-label">Edad<span class="text-muted">
                    </span> </label>
                <input id="edad" name="edad" class="form-control" type="text" />
                <small>Error message</small>
            </div>
        </div>
    </div>
    <div class="row mt-4 mt-sm-4">
        <div class="col-12 col-sm-4 mt-3 mt-sm-0">
            <div class="input-group input-group-outline">
                <label for="celular" class="form-label">Celular</label>
                <input id="celular" name="celular" class="form-control" type="text" maxlength="8"
                    minlength="8" />
                <small>Error message</small>
            </div>
        </div>
        <div class="col-12 col-sm-4 mt-3 mt-sm-0">
            <div class="input-group input-group-outline" id="select-validation-genero">
                <select class="form-control choices" name="genero" id="genero">
                    <option value="">Género</option>
                    <option value="F">Femenino</option>
                    <option value="M">Masculino</option>
                </select>
                <small class="select-error" error-name="genero">Error message</small>
            </div>
        </div>
        <div class="col-12 col-sm-4 mt-3 mt-sm-0">
            <div class="input-group input-group-outline" id="select-validation-id_colegio">
                <select class="form-control choices" name="id_colegio" id="id_colegio">
                    <option value="">Colegio</option>
                    @foreach ($data['colegios'] as $item)
                        <option value="{{ $item->id_colegio }}">{{ $item->colegio }}</option>
                    @endforeach
                </select>
                <small class="select-error" error-name="id_colegio">Error message</small>
            </div>
        </div>
    </div>
</form>
