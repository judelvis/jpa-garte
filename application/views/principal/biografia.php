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
                    <div class="grid_6">
                        <div class="heading1 wow fadeIn" data-wow-duration="1s"
                             data-wow-delay="0.1s" id='tb'>
                            <h2>
                                Bografia
                            </h2>
                        </div>
                        <?php
                        if ($lst == 0) {
                            echo '<div class="border-wrapper1 wrapper3"><div class="row"><h2><center>No existen publicaciones</center></h2></div></div>';
                        } else {
                            $i = 0;
                            $j=1;$band=0;
                            foreach ( $lst as $ls ) {
                                echo '
                                <div class="banner1">
                                    <p class="wow fadeIn" data-wow-duration="1s"
                                    data-wow-delay="0.2s">'.$ls->biografia.'.</p>
                                </div>

                                ';
                            }
                        }

                        ?>

                    </div>
                    <div class="grid_6">
                        <div class="wrapper2">
                            <div class="heading1 wow fadeIn" data-wow-duration="1s"
                                 data-wow-delay="0.1s" id='tb'>
                                <h2>
                                    Curriculo
                                </h2>
                            </div>
                            <?php
                            if ($lst == 0) {
                                echo '<div class="border-wrapper1 wrapper3"><div class="row"><h2><center>No existen publicaciones</center></h2></div></div>';
                            } else {
                                $i = 0;
                                $j=1;
                                foreach ( $lst2 as $ls2 ) {
                                    $i ++;
                                    echo '
                                        <div class="post1">
								        	<p class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
								        		'.$ls2->fecha.'<br>'.$ls2->lug.'<h4>'.$ls2->even.'.</h4>'.$ls2->estado.'-'.$ls2->pais.'.
								        	</p>
								        </div>
                                    ';
                                }
                                echo '</div></div>';
                                $npag = count($lst)/__PAG__;
                                if(($npag)>1 ){
                                    echo'<nav><ul class="pagination pagination-lg" id="paginador">';
                                    $tam =ceil($npag);
                                    for($i=1;$i<=$tam;$i++){
                                        echo'<li><a href="#tb" onclick="pagina('.$i.')">'.$i.'</a></li>';
                                    }
                                    echo '</ul>	</nav>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>