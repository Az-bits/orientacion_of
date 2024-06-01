<form id='form-main'>
    {{-- <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" /> --}}
    <link href="{{ asset('material-dashboard/assets/fileupload/filepond.css') }}" rel="stylesheet" />
    <link href="{{ asset('material-dashboard/assets/fileupload/filepond-plugin-image-preview.css') }}" rel="stylesheet" />
    <style>
        .filepond {
            /* width: 400px; */
            /* Ancho deseado */
            height: 100%;
            /* Alto deseado */
            /* Estilo del borde */
            /* display: flex; */
            /* /* justify-content: center;
            align-items: center;
            flex-direction: column; */
            /* margin: 50px auto; */

            /* Margen para centrar el contenedor */
        }

        .filepond--drop-label {
            height: 100%;
        }
    </style>
    <div class="row">
        <div class="col-12 col-md-6">
            <input type="file" class="filepond" accept="image/*" />
        </div>
        <div class="col-12 col-md-6 mt-3">
            <div class="row mt-3 mb-2">
                <div class="col-12 col-sm-12">
                    <div class="input-group input-group-outline">
                        <label for="carrera" class="form-label">Carrera</label>
                        <input id="carrera" name="carrera" class="form-control" type="text" />
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
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 mt-3 mt-sm-3">
            <label class="form-control ms-0">Area</label>
            <div class="input-group input-group-outline" id="select-validation-id_area">
                <select class="form-control choices" name="id_area" id="id_area">
                    <option value="">[SELECCIONE]</option>
                    @foreach ($data['areas'] as $item)
                        <option value="{{ $item->id_area }}">{{ $item->nombre }}</option>
                    @endforeach
                </select>
                <small class="select-error" error-name="id_area">Error message</small>
            </div>
        </div>
        <div class="col-12 col-sm-6 mt-3 mt-sm-3">
            <label class="form-control ms-0">Area UPEA</label>
            <div class="input-group input-group-outline" id="select-validation-id_area_existente">
                <select class="form-control choices" name="id_area_existente" id="id_area_existente">
                    <option value="">[SELECCIONE]</option>
                    @foreach ($data['areas_upea'] as $item)
                        <option value="{{ $item->id_area_existente }}">{{ $item->nombre }}</option>
                    @endforeach
                </select>
                <small class="select-error" error-name="id_area_existente">Error message</small>
            </div>
        </div>
    </div>
    <div class="row mt-3 mb-2">
        <div class="col-12 col-sm-12 mt-3">
            <div class="input-group input-group-outline">
                <label for="link" class="form-label">Link Pagina </label>
                <input id="link" name="link" class="form-control" type="text" />
                <small>Error message</small>
            </div>
        </div>
        <div class="col-12 col-sm-12 mt-3">
            <div class="input-group input-group-outline">
                <label for="celular" class="form-label">Celular Referencia </label>
                <input id="celular" name="celular" class="form-control" type="text" />
                <small>Error message</small>
            </div>
        </div>
        <div class="col-12 col-sm-12 mt-3">
            <div class="input-group input-group-outline">
                <label for="direccion" class="form-label">Dirección</label>
                <input id="direccion" name="direccion" class="form-control" type="text" />
                <small>Error message</small>
            </div>
        </div>
    </div>
    <script src="{{ asset('material-dashboard/assets/fileupload/filepond-plugin-image-preview.js') }}"></script>
    <script src="{{ asset('material-dashboard/assets/fileupload/filepond.js') }}"></script>
    <script>
        // Inicializar FilePond
        FilePond.registerPlugin(FilePondPluginImagePreview);
        const inputElement = document.querySelector('input[type="file"]');
        const pond = FilePond.create(inputElement);

        // function loadImageFromURL(url) {
        //     fetch(url)
        //         .then(response => response.blob())
        //         .then(blob => {
        //             const file = new File([blob], 'marketing-online-que-es-caracteristicas-y-ejemplos.png', {
        //                 type: 'image/png'
        //             });
        //             pond.addFile(file);
        //         })
        //         .catch(error => console.error('Error al cargar la imagen:', error));
        // }

        // // URL de la imagen
        // const imageUrl = 'https://marketingblanco.com/imagenes/marketing-online-que-es-caracteristicas-y-ejemplos.png';

        // // Cargar imagen desde URL
        // loadImageFromURL(imageUrl);
    </script>
</form>
