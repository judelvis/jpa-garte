<?php echo '<div class="slider-wrapper"><div id="camera_wrap" class="camera_wrap camera_olive_skin">';
foreach ( $slider as $ls ) {
	echo '<div data-thumb="' . __IMG__ . 'galeria/miniatura/' . $ls->imagen . '" data-src="' . __IMG__ . 'galeria/' . $ls->imagen . '">';
    if($ls -> enlace != '') echo '<iframe src="http://www.youtube.com/embed/'.$ls->enlace.'" width="100%" height="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
    echo'<div class="camera_caption fadeFromBottom">
                    <a href="' .site_url("principal/galeria2/".$ls -> oid). '">' .$ls -> titulo. '</a>
                </div>
		</div>
		';
}
echo '</div>
	<div class="clearfix"></div>
</div>';
?>