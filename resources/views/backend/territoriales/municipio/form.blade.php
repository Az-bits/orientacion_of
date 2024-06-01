<form id='form-main'>
    <div class="row mt-3 mb-2">
        <div class="col-12  col-sm-12 mt-3 mt-sm-0">
            <div class="input-group input-group-outline">
                <label for="municipio" class="form-label">Municipio</label>
                <input id="municipio" name="municipio" class="form-control" type="text" />
                <small>Error message</small>
            </div>
        </div>
        <div class="col-12 col-sm-6 mt-3 mt-sm-3">
            <div class="input-group input-group-outline" id="select-validation-id_departamento">
                <select class="form-control choices" name="id_departamento" id="id_departamento">
                    <option value="">Departamento</option>
                    @foreach ($data['departamentos'] as $item)
                        <option value="{{ $item->id_departamento }}">{{ $item->departamento }}</option>
                    @endforeach
                </select>
                <small class="select-error" error-name="id_departamento">Error message</small>
            </div>
        </div>
        <div class="col-12 col-sm-6 mt-3 mt-sm-3">
            <div class="input-group input-group-outline" id="select-validation-id_provincia">
                <select class="form-control choices" name="id_provincia" id="id_provincia">
                    <option value="">Provincias</option>
                </select>
                <small class="select-error" error-name="id_provincia">Error message</small>
            </div>
        </div>
    </div>
</form>
