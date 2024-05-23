@extends('backend.app')
@section('content')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Baremo</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 az-vertical">
                                        Percentil
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 az-vertical">
                                        Calculo
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 az-vertical">
                                        Científica
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 az-vertical">
                                        Diseño
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 az-vertical">
                                        Tecnología
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 az-vertical">
                                        Geoastronómica
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 az-vertical">
                                        Naturalista
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 az-vertical">
                                        Sanitaria
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 az-vertical">
                                        Asistencial
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 az-vertical">
                                        Jurídica
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 az-vertical">
                                        Económica
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 az-vertical">
                                        Comunicacional
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 az-vertical">
                                        Humanística
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 az-vertical">
                                        Artística
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 az-vertical">
                                        Musical
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 az-vertical">
                                        Lingüística
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- <tr>
                  <td>
                    <div class="d-flex px-3 py-1">
                      <div>
                        <img
                          src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/ecommerce/black-mug.jpg"
                          class="avatar me-3"
                          alt="image"
                        />
                      </div>
                      <div
                        class="d-flex flex-column justify-content-center"
                      >
                        <h6 class="mb-0 text-sm">
                          Business Kit (Mug + Notebook)
                        </h6>
                        <p
                          class="text-sm font-weight-normal text-secondary mb-0"
                        >
                          <span class="text-success">12.821</span> orders
                        </p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-sm font-weight-normal mb-0">$80.250</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <p class="text-sm font-weight-normal mb-0">$4.200</p>
                  </td>
                  <td class="align-middle text-end">
                    <div
                      class="d-flex px-3 py-1 justify-content-center align-items-center"
                    >
                      <p class="text-sm font-weight-normal mb-0">40</p>
                      <i
                        class="ni ni-bold-down text-sm ms-1 text-success"
                      ></i>
                    </div>
                  </td>
                </tr> --}}
                                @foreach ($data['baremo'] as $item)
                                    <tr>
                                        <td>
                                            <p class="text-sm font-weight-normal mb-0 text-center">{{ $item->percentil }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-normal mb-0 text-center">{{ $item->calculo }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-normal mb-0 text-center">{{ $item->cientifica }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-normal mb-0 text-center">{{ $item->diseño }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-normal mb-0 text-center">{{ $item->tecnologia }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-normal mb-0 text-center">{{ $item->gastronomia }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-normal mb-0 text-center">{{ $item->naturalista }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-normal mb-0 text-center">{{ $item->sanitaria }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-normal mb-0 text-center">{{ $item->asistencial }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-normal mb-0 text-center">{{ $item->juridica }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-normal mb-0 text-center">{{ $item->economica }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-normal mb-0 text-center">
                                                {{ $item->comunicacional }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-normal mb-0 text-center">{{ $item->humanistica }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-normal mb-0 text-center">{{ $item->artistica }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-normal mb-0 text-center">{{ $item->musical }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-normal mb-0 text-center">{{ $item->linguistica }}
                                            </p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
