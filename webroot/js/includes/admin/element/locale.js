// create tabs...
(function($,scope){

  function hideShowLanguagesInputs( lng )
  {
    $('.locale-'+lng).parent().show();
    for( var i in languages )
    {
      if( languages[i] != lng )
      {
        $('.locale-'+languages[i]).parent().hide();
      }
    }
  }

  $(document).ready(function()
  {
    hideShowLanguagesInputs( language );
    $('#locale-selector-ul a').click(function(evt)
    {
      evt.preventDefault();
      var lng = $(this).html();
      $('#locale-selector-ul li').removeClass('active');
      $(this).parent().addClass('active');
      hideShowLanguagesInputs( lng );
    });
  });
})(jQuery,window);
