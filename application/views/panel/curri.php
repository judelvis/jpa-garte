<?php
/**
 * Created by PhpStorm.
 * User: judprog
 * Date: 06/05/15
 * Time: 09:03 AM
 */
?>
<div class="row">
    <div class="col-lg-12">
        <div class="box dark">
            <header>
                <div class="icons">
                    <i class="icon-edit"></i>
                </div>
                <h5>Registro</h5>
                <div class="toolbar">
                    <ul class="nav">
                        <li><a class="accordion-toggle minimize-box"
                               data-toggle="collapse" href="#div-1"> <i class="icon-chevron-up"></i>
                            </a></li>
                    </ul>
                </div>
            </header>
            <div id="div-1" class="accordion-body collapse in body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="autosize" class="control-label col-lg-2">Pais</label>
                        <div class="col-lg-2">
                             <input type="text" placeholder="Pais" class="form-control"
                                       name="pais" id="pais"  />

                        </div>
                        <label for="autosize" class="control-label col-lg-2">Estado</label>
                        <div class="col-lg-2">
                            <input type="text" placeholder="Estado" class="form-control"
                                   name="estado" id="estado"  />
                        </div>
                        <label for="autosize" class="control-label col-lg-2">Fecha</label>
                        <div class="col-lg-2">
                            <input type="text" placeholder="Fecha" class="form-control"
                                   name="fecha" id="fecha"  />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="autosize" class="control-label col-lg-2">Evento</label>
                        <div class="col-lg-2">
                            <input type="text" placeholder="Evento" class="form-control"
                                   name="evento" id="evento"  />
                        </div>
                        <label for="autosize" class="control-label col-lg-2">Lugar</label>
                        <div class="col-lg-6">
                            <input type="text" placeholder="Lugar" class="form-control"
                                   name="lugar" id="lugar"  />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="autosize" class="control-label col-lg-2">Evento I.</label>
                        <div class="col-lg-2">
                            <input type="text" placeholder="Evento I." class="form-control"
                                   name="evento_i" id="evento_i"  />
                        </div>
                        <label for="autosize" class="control-label col-lg-2">Lugar I.</label>
                        <div class="col-lg-6">
                            <input type="text" placeholder="Lugar I." class="form-control"
                                   name="lugar_i" id="lugar_i"  />
                        </div>
                    </div>


                    <div class="panel-body">
                        <button class="btn btn-primary" data-toggle="modal" onclick="registrar();"
                            >Registrar</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="modal" id="notificationModal" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Cargando</h4>
                        </div>
                        <div class="modal-body">
                            <div class="progress progress-striped active">
                                <div class="progress-bar" role="progressbar" aria-valuenow="100"
                                     aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                    <span class="sr-only">Cargando</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="box dark">
            <header>
                <div class="icons">
                    <i class="icon-edit"></i>
                </div>
                <h5>Curriculun</h5>
                <div class="toolbar">
                    <ul class="nav">
                        <li><a class="accordion-toggle minimize-box"
                               data-toggle="collapse" href="#reporte"> <i
                                    class="icon-chevron-up"></i>
                            </a></li>
                    </ul>
                </div>
            </header>
            <div id="reporte" class="accordion-body collapse in body"></div>
        </div>
    </div>
</div>