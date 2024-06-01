@extends('backend.app')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-lg-flex">
                    <div>
                        <h5 class="mb-0">Lista de Carreras</h5>
                        <p class="text-sm mb-0">
                            Listado de carreras registradas.
                        </p>
                    </div>
                    <div class="ms-auto my-auto mt-lg-0 mt-4">
                        <div class="ms-auto my-auto">
                            <button id="btn-new" type="button" class="btn bg-gradient-primary btn-sm mb-0" target="_blank"
                                data-bs-toggle="modal" data-bs-target="#modal-main">+&nbsp;
                                Nueva Carrera</button>
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
                                <th>Carrera</th>
                                <th>Area</th>
                                <th>Area UPEA</th>
                                <th>accion</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('backend.carreras-areas.carrera.modal')
@endsection
