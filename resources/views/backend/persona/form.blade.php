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
        <div class="col-12 col-sm-3 mt-3 mt-sm-0">
            <div class="input-group input-group-outline">
                <label for="complemento" class="form-label">Complemento <span class="text-muted">
                        (si tiene)
                    </span> </label>
                <input id="complemento" name="complemento" class="form-control" type="text" />
                <small>Error message</small>
            </div>
        </div>
        <div class="col-12 col-sm-3 mt-3 mt-sm-0">
            {{-- <label class="form-control ms-0">Expedido</label> --}}
            {{-- <input class="form-control" type="text" /> --}}
            <div class="input-group input-group-outline" id="select-validation-expedido">
                <select class="form-control choices" name="expedido" id="expedido">
                    <option value="">Expedido</option>
                    <option value="LP">La Paz</option>
                    <option value="CBBA">Cochabamba</option>
                    <option value="SC">Santa Cruz</option>
                    <option value="OR">Oruro</option>
                    <option value="PT">Potosí</option>
                    <option value="CH">Chuquisaca</option>
                    <option value="TJ">Tarija</option>
                    <option value="PA">Pando</option>
                    <option value="BN">Beni</option>
                </select>
                {{-- <small id="error-expedido"></small> --}}
                <small class="select-error fs-7" error-name="expedido">Error message</small>
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
                <label for="paterno" class="form-label">Paterno</label>
                <input id="paterno" name="paterno" class="form-control" type="text" />
                <small>Error message</small>
            </div>
        </div>
        <div class="col-12 col-sm-4 mt-5 mt-sm-0">
            <div class="input-group input-group-outline">
                <label for="materno" class="form-label">Materno<span class="text-muted">
                    </span> </label>
                <input id="materno" name="materno" class="form-control" type="text" />
                <small>Error message</small>
            </div>
        </div>
    </div>
    <div class="row mt-4 mt-sm-4">
        <div class="col-12 col-sm-4">
            <div class="input-group input-group-outline is-filled">
                <label for="fecha_nac" class="form-label">Fecha Nacimiento</label>
                <input id="fecha_nac" name="fecha_nac" class="form-control" type="date" />
                <small>Error message</small>
            </div>
        </div>
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
    </div>
    <div class="row mt-4">
        <div class="col-12 col-sm-12">
            <div class="input-group input-group-outline">
                <label for="correo" class="form-label">Correo</label>
                <input id="correo" name="correo" class="form-control" type="text" />
                <small>Error message</small>
            </div>
        </div>
    </div>
</form>
