// create tabs...
(function($,scope)
{

  function hideShowTabs()
  {
    var target = $('.tab-header .active a').attr('href');
    $('.tab-content .tab').hide();
    $(target).show();
  }

  $(document).ready(function()
  {
    // EVENT LISTENER
    $('.tab-header a').click(function(evt)
    {
      evt.preventDefault();
      $('.tab-header li').removeClass('active');
      $(this).parent().addClass('active');
      hideShowTabs();
    });

    hideShowTabs();
  });
})(jQuery,window);
