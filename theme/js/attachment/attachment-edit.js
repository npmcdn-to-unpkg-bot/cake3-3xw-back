(function($, scope){


  var init = function()
  {

    $('#tagsinput').tagsinput({confirmKeys: [32]});
    for( var i in tags )
    {
      $('#tagsinput').tagsinput('add', tags[i].name);
    }

    console.log($("#tagsinput").val());
  };

  $(document).ready(init);

})($, window);
