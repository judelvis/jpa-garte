<?php
/**
 * Created by PhpStorm.
 * User: judelvis
 * Date: 10/05/15
 * Time: 03:00 PM
 */
?>
<section id="content">
    <div class="width-wrapper width-wrapper__inset1">
        <div class="wrapper1">
            <div class="container">
                <div class="row">
                    <div class="grid_3">
>                        <div class="wrapper2" style="padding-top: 50px;">
                        <?php
                        if ($lst == 0) {
                            echo '<div class="border-wrapper1 wrapper3"><div class="row"><h2><center>No existen publicaciones</center></h2></div></div>';
                        } else {
                            $i = 0;
                            $j=1;$band=0;
                            foreach ( $lst as $ls ) {
                                $tipoDatos=0;
                                if($tipo != 0)$tipoDatos=$ls->oidcat;
                                $tituloSerie = $ls->nombre;$desSerie = $ls->descrip;$tit = $ls->titulo;
                                if(isset($_SESSION['idioma']) && $_SESSION['idioma']=='_i'){
                                    $tituloSerie = $ls->nombre_i;$desSerie = $ls->descrip_i;$tit = $ls->titulo_i;
                                }
                                echo '
                                <div class="post1">
                                    <h4>'.$tituloSerie.'</h4>
                                    <a href="#primero"  onclick="muestra('.$ls->oidser.','.$tipoDatos.');">
                                    <img class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" src="' . __IMG__ . 'galeria/medio/' . $ls->imagen . '" alt=""/>
                                    </a>
                                    <p class="wow fadeIn" data-wow-duration="1s"
                                    data-wow-delay="0.2s">'.$tit.'.</p>
                                </div>

                                ';
                            }
                        }


                        ?>
                        </div>
                    </div>
                    <div class="grid_9">
                        <div class="wrapper2">
                            <div class="wrapper2"><center>
                                <img class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" src="<?php echo __IMG__ ?>portada.jpg" alt=""/>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>