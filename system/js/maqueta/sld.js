$(document).ready(function() {
	$('#camera_wrap').camera({
		loader : true,
		loaderColor: '#eeeeee',
		autoAdvance: true,
		pagination : false,
		minHeight : '',
		thumbnails : true,
		height : '52.8735632183908%',
		caption : true,
		navigation : true,
		fx : 'random',
		onLoaded : function() {
			$('.slider-wrapper')[0].style.height = 'auto';
		}
	});
	
});