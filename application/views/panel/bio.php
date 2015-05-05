<?php
/**
 * Created by PhpStorm.
 * User: judprog
 * Date: 05/05/15
 * Time: 09:06 AM
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
                        <label for="autosize" class="control-label col-lg-2">Biografia Español</label>
                        <div class="col-lg-10">
                            <textarea id="bio" name="bio" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="autosize" class="control-label col-lg-2">Biografia Ingles</label>
                        <div class="col-lg-10">
                            <textarea id="bio_i" name="bio_i" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="autosize" class="control-label col-lg-2">Fecha</label>
                        <div class="col-lg-2">
                            <input type="text" placeholder="Fecha" class="form-control"
                                   name="fecha" id="fecha"  />
                        </div>
                        <div class="col-lg-2"><a href="#" class="btn btn-primary btn-lg" onclick="Registrar();">Registrar</a></div>
                    </div>


                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="box dark">
            <header>
                <div class="icons">
                    <i class="icon-edit"></i>
                </div>
                <h5>Categorias Registradas</h5>
                <div class="toolbar">
                    <ul class="nav">
                        <li><a class="accordion-toggle minimize-box"
                               data-toggle="collapse" href="#reporte"> <i class="icon-chevron-up"></i>
                            </a></li>
                    </ul>
                </div>
            </header>
            <div id="reporte" class="accordion-body collapse in body">

            </div>
        </div>
    </div>
</div>