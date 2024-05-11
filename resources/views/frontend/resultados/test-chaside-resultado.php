<?php $this->load->view('frontend/cuestionarios/template/test-header') ?>
<div class="wrapper position-relative overflow-hidden">
    <div class="container-md-fluid p-3 p-lg-0">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>AREA</th>
                        <th>AREAS Y CARRERAS EXISTENTES EN LA UPEA</th>
                        <th>RECOMENDACIONES PARA TEST DE APTITUDES DIFERENTES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $listar = $this->Modelo_resultado->M_lista_resultado($idest);
                    $con = 1;
                    foreach ($listar as $value) { ?>
                        <tr>
                            <td><?php echo $value->nombre_area; ?></td>
                            <td>
                                <ul class="list-1">
                                    <?php foreach ($this->Modelo_resultado->M_lista_areasExistentes($value->idarea_pregunta) as $areas) : ?>
                                        <li>
                                            <?php echo $areas->nombre_areaexistente ?>
                                            <ul class="list-2">
                                                <?php foreach ($this->Modelo_resultado->M_lista_carrerasExistentes($areas->id_area_existente) as $carrera) : ?>
                                                    <li><?php echo $carrera->nombre_carrera ?></li>
                                                <?php endforeach ?>
                                            </ul>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                            </td>
                            <td>
                                <!-- <pre>
                              <?php print_r($this->Modelo_resultado->M_lista_areaDat($value->id_area_existente)) ?>
                            </pre> -->
                                <ol class="list-1">
                                    <?php foreach ($this->Modelo_resultado->M_lista_areaDat($value->id_area_existente) as $tipodat) {
                                        switch ($tipodat->id_dat_tipo) {
                                            case 1:
                                    ?>
                                                <li>
                                                    <a href="<?php echo base_url(Hasher::make(2553, '1', $idest)) ?>" target="_blank" class="btn-dat"><?= $tipodat->test ?></a>
                                                </li>
                                            <?php break;
                                            case 2: ?>
                                                <li>
                                                    <a href="<?php echo base_url(Hasher::make(2553, '2', $idest)) ?>" target="_blank" class="btn-dat"><?= $tipodat->test ?></a>
                                                </li>
                                            <?php break;
                                            case 3: ?>
                                                <li>
                                                    <a href="<?php echo base_url(Hasher::make(2553, '3', $idest)) ?>" target="_blank" class="btn-dat"><?= $tipodat->test ?></a>
                                                </li>
                                            <?php break;
                                            case 4: ?>
                                                <li>
                                                    <a href="<?php echo base_url(Hasher::make(2553, '4', $idest)) ?>" target="_blank" class="btn-dat"><?= $tipodat->test ?></a>
                                                </li>
                                            <?php break;
                                            case 5: ?>
                                                <li>
                                                    <a href="<?php echo base_url(Hasher::make(2553, '5', $idest)) ?>" target="_blank" class="btn-dat"><?= $tipodat->test ?></a>
                                                </li>
                                            <?php break;
                                            case 6: ?>
                                                <li>
                                                    <a href="<?php echo base_url(Hasher::make(2553, '6', $idest)) ?>" target="_blank" class="btn-dat"><?= $tipodat->test ?></a>
                                                </li>
                                            <?php break;
                                            case 7: ?>
                                                <li>
                                                    <a href="<?php echo base_url(Hasher::make(2553, '7', $idest)) ?>" target="_blank" class="btn-dat"><?= $tipodat->test ?></a>
                                                </li>
                                            <?php break;
                                            case 8: ?>
                                                <li>
                                                    <a href="<?php echo base_url(Hasher::make(2553, '8', $idest)) ?>" target="_blank" class="btn-dat"><?= $tipodat->test ?></a>
                                                </li>
                                            <?php break;
                                            default: ?>
                                    <?php break;
                                        }
                                    } ?>
                                </ol>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $this->load->view('frontend/cuestionarios/template/test-footer') ?>