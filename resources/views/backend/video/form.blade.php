{{-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css"> --}}

<form id='form-main'>
    <div class="row mt-4 mt-sm-4">
        <div class="col-12 col-sm-6 preview-video">
            <div class="input-group input-group-outline h-100">
                <div id='image-video' class="w-100">
                    <img class='az-image-video w-100' src="{{ asset('assets/images/video.png') }}" alt=""
                        data-toggle="tooltip" title="Ingrese un Enlace de video">
                </div>
                <div id='iframe-video' class="w-100" style='display: none'>
                    <iframe class='az-iframe-video w-100 h-100' id="iframe-id" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6  mt-0 mt-sm-0">
            <div class="row">
                <div class="col-12 col-sm-12  mt-5 mt-sm-0">
                    <div class="input-group input-group-outline">
                        <label for="titulo" class="form-label">titulo</label>
                        <input id="titulo" name="titulo" class="form-control" type="text" />
                        <small>Error message</small>
                    </div>
                </div>
                <div class="col-12 col-sm-12  mt-5 mt-sm-3">
                    <div class="input-group input-group-outline">
                        <label for="enlace" class="form-label">Enlace del video</label>
                        <input id="enlace" name="enlace" class="form-control" type="text" />
                        <small>Error message</small>
                    </div>
                </div>
                <div class="col-12 col-sm-12 mt-3 mt-sm-3">
                    <p class="text-warning text-sm">Seleccione solo uno entre carrera, area o video tutorial</p>
                </div>
                <div class="col-12 col-sm-12 mt-3 mt-sm-0">
                    <label class="form-control ms-0">Carrera</label>
                    <div class="input-group input-group-outline" id="select-validation-id_carrera">
                        <select class="form-control choices" name="id_carrera" id="id_carrera">
                            <option value="">[SELECCIONE]</option>
                            @foreach ($data['carreras'] as $item)
                                <option value="{{ $item->id_carrera }}">{{ $item->carrera }}</option>
                            @endforeach
                        </select>
                        <small class="select-error" error-name="id_carrera">Error message</small>
                    </div>
                </div>
                <div class="col-12 col-sm-12 mt-3 mt-sm-0">
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
                <div class="col-12 col-sm-12 mt-3 mt-sm-3">
                    <div class="form-check px-0">
                        <input class="form-check-input" type="checkbox" value="T" id="tipo" name="tipo">
                        <label class="custom-control-label" for="tipo">Video Tutorial</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const urlInput = document.getElementById('enlace');
            urlInput.addEventListener('change', function() {
                const url = urlInput.value.trim();
                // Validación básica (se puede extender para comprobaciones adicionales)
                if (!url.startsWith('https://www.youtube.com/watch?v=')) {
                    document.getElementById('image-video').style.display = 'block';
                    document.getElementById('iframe-video').style.display = 'none';
                    alert('Error al ingresar el enlace!, vuelva a intentarlo.');
                    return;
                }
                // Extraer ID del video
                const videoId = new URL(url).searchParams.get('v');
                // Crear iframe con consideraciones de seguridad (evitando atributos innecesarios)
                const iframe = document.getElementById('iframe-id');
                iframe.src = `https://www.youtube.com/embed/${videoId}`;
                document.getElementById('image-video').style.display = 'none';
                document.getElementById('iframe-video').style.display = 'block';
            });
        });
    </script>
</form>
