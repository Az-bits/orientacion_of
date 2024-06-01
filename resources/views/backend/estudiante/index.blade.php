@extends('backend.app')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-lg-flex">
                    <div>
                        <h5 class="mb-0">Lista de Personas</h5>
                        <p class="text-sm mb-0">
                            Listado de personas registradas.
                        </p>
                    </div>
                    <div class="ms-auto my-auto mt-lg-0 mt-4">
                        <div class="ms-auto my-auto">
                            <button id="btn-new" type="button" class="btn bg-gradient-primary btn-sm mb-0" target="_blank"
                                data-bs-toggle="modal" data-bs-target="#modal-main">+&nbsp;
                                Nueva Persona</button>
                            {{-- <button type="button" class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal"
                                data-bs-target="#import">
                                Import
                            </button>
                            <div class="modal fade" id="import" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog mt-lg-10">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModalLabel">
                                                Import CSV
                                            </h5>
                                            <i class="material-icons ms-3">file_upload</i>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>You can browse your computer for a file.</p>
                                            <div class="input-group input-group-dynamic mb-3">
                                                <label class="form-label">Browse file...</label>
                                                <input type="email" class="form-control" onfocus="focused(this)"
                                                    onfocusout="defocused(this)" />
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value id="importCheck"
                                                    checked />
                                                <label class="custom-control-label" for="importCheck">I accept the terms and
                                                    conditions</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn bg-gradient-secondary btn-sm"
                                                data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="button" class="btn bg-gradient-primary btn-sm">
                                                Upload
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv"
                                type="button" name="button">
                                Export
                            </button> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pb-0" style='min-height: 25rem;'>
                <div class="az-spinner">
                    <div class="dot-spinner">
                        <div class="dot-spinner__dot"></div>
                        <div class="dot-spinner__dot"></div>
                        <div class="dot-spinner__dot"></div>
                        <div class="dot-spinner__dot"></div>
                        <div class="dot-spinner__dot"></div>
                        <div class="dot-spinner__dot"></div>
                        <div class="dot-spinner__dot"></div>
                        <div class="dot-spinner__dot"></div>
                    </div>
                </div>
                <div class="table-responsive az-table">
                    <table class="table table-flush az-table" style="width:100%" id="datatable">
                        <thead class="thead-light">
                            <tr>
                                <th>id</th>
                                <th>Cedula de identidad</th>
                                <th>Estudiante</th>
                                <th>celular</th>
                                <th>acción</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('backend.estudiante.modal')
@endsection
