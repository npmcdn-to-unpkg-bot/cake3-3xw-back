var filterButtonEffect = function(){

  $('.index-filter-header .custom-btn').click(function(){
    if(!$(this).hasClass('active')){
      $(this).addClass('active');
      $(this).find('.first-title').addClass('hidden');
      $(this).find('.second-title').removeClass('hidden');
      $('.index-filter-content').removeClass('slide-up end').addClass('slide-down');
      $('.index-filter-content').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        $(this).addClass('end');
      });
      $(this).find('img').addClass('rotate-in').removeClass('rotate-out');
      $(this).find('img').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){

        $(this).addClass('end');
      });
    }else{
      $(this).removeClass('active');
      $(this).find('.first-title').removeClass('hidden');
      $(this).find('.second-title').addClass('hidden');
      $('.index-filter-content').removeClass('slide-down').addClass('slide-up');
      $('.index-filter-content').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',function(){
        $(this).removeClass('end');
      });
      $(this).find('img').addClass('rotate-out').removeClass('rotate-in');
      $(this).find('img').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        $(this).removeClass('end');
      });
    }
  });
};

var changeListStyle = function(){
  $('.list-change a:not(.index-change-map)').click(function(e){
    e.preventDefault();
    var type = $(this).attr('data-styler');
    if(!$('.index-blocks').hasClass(type)){
      if(type === 'list'){
        $('.index-blocks').removeClass().addClass('col-sm-7 index-blocks '+type);
        $('.sidebar').removeClass('hidden');
        $('.sidebar').addClass('show-sidebar');
        $('.sidebar').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
          $('.sidebar').removeClass('hidden');
        });
        $('.index-blocks .row').isotope('reloadItems').isotope();
      }else{
        //$('.index-blocks').removeClass().addClass('col-sm-12 index-blocks '+type);
        $('.sidebar').removeClass('show-sidebar').addClass('hide-sidebar');
        $('.sidebar').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
          $('.sidebar').removeClass('hide-sidebar').addClass('hidden');
          $('.index-blocks').removeClass().addClass('col-sm-12 index-blocks '+type);
          $('.index-blocks .row').isotope('reloadItems').isotope();
        });
      }
    }
  });
};

var fullListItem = function(){
  $('.index-item.highlight').click(function(e){
    e.stopPropagation();
    var title = $(this).find('>p');
    var content = $(this).find('.index-item-content');
    if(!$(this).hasClass('full')){
      $(this).addClass('full');
      title.addClass('hidden');
      content.removeClass('hidden');
    }
  });
  $('.index-item-content-close').click(function(e){
    e.stopPropagation();
    var item = $(this).parent().parent();
    var title = item.find('>p');
    var content = item.find('.index-item-content');
    item.removeClass('full');
    title.removeClass('hidden');
    content.addClass('hidden');
  });
};


$(window).ready(function(){
  filterButtonEffect();
  changeListStyle();
  fullListItem();
});
