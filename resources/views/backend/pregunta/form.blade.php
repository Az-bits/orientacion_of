<form id='form-main'>
    <div class="row mt-3 mb-2">
        <div class="col-12 col-sm-12">
            <label class="form-control ms-0" style="color: #e91e63">Pregunta</label>
            <div class="input-group input-group-outline">
                <textarea id="pregunta" name="pregunta" class="form-control" rows="5" placeholder="Descripción del area"
                    spellcheck="false"></textarea>
                <small>Error message</small>
            </div>
        </div>
        <div class="col-12 col-sm-6 mt-3 mb-4">
            <div class="input-group input-group-outline" id="select-validation-id_test">
                <select class="form-control choices" name="id_test" id="id_test">
                    <option value="">Test</option>
                    @foreach ($data['tests'] as $item)
                        <option value="{{ $item->id_test }}">{{ $item->test }}</option>
                    @endforeach
                </select>
                <small class="select-error" error-name="id_test">Error message</small>
            </div>
        </div>
        <div class="col-12 col-sm-6 mt-3 mb-4">
            <div class="input-group input-group-outline" id="select-validation-id_area">
                <select class="form-control choices" name="id_area" id="id_area">
                    <option value="">Area</option>
                    @foreach ($data['areas'] as $item)
                        <option value="{{ $item->id_area }}">{{ $item->nombre }}</option>
                    @endforeach
                </select>
                <small class="select-error" error-name="id_area">Error message</small>
            </div>
        </div>
</form>
