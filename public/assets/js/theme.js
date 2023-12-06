const getStoredTheme = () => localStorage.getItem('theme')

var themeLocal = localStorage.getItem('theme');

if (themeLocal != undefined) {
     $('html').attr('data-bs-theme', themeLocal);
    if (themeLocal === 'dark') {
        $('.btn-set-theme i').removeClass('fa-moon');
        $('.btn-set-theme i').addClass('fa-sun');
    }else{
        $('.btn-set-theme i').addClass('fa-moon');
        $('.btn-set-theme i').removeClass('fa-sun');
    }
}

$('.btn-set-theme').on('click', function(){
      // Check what is the current theme and get the opposite one
      var targetTheme = $('html').attr('data-bs-theme') === 'dark' ? 'light' : 'dark';

      // Set the attribute 'data-bs-theme' to the targetTheme
      $('html').attr('data-bs-theme', targetTheme);
  
      // Save the targetTheme to the localstorage
      localStorage.setItem('theme', targetTheme);

    if (targetTheme === 'dark') {
        $('.btn-set-theme i').removeClass('fa-moon');
        $('.btn-set-theme i').addClass('fa-sun');
    }else{
        $('.btn-set-theme i').addClass('fa-moon');
        $('.btn-set-theme i').removeClass('fa-sun');
    }
})


    
	// open in fullscreen
	// $('.btn-set-fullscreen').click(function() {
	// 	$('body').fullscreen();
	// 	return false;
	// });
	// exit fullscreen
	



