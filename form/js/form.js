/*global $, alert, console */

$(function(){
  "use strict";
  $('.name ').blur(function(){
    if ($(this).val().length < 3){
      $(this).css('border', 'ipx solid #F00');
      $(this).parent().find('.nameAlert').fadeIn(100);
    }else {
      $(this).css('border', 'ipx solid #080');

      $(this).parent().find('.nameAlert').fadeOut(100);
    }
  });

  $('.id').blur(function(){
    if ($(this).val().length != 14){
      $(this).css('border', 'ipx solid #F00');
      $(this).parent().find('.idAlert').fadeIn(100);

    }else {
      $(this).css('border', 'ipx solid #080');

      $(this).parent().find('.idAlert').fadeOut(100);
    }

  });

  $('.phone ').blur(function(){
    if ($(this).val().length  != 11){
      $(this).css('border', 'ipx solid #F00');
      $(this).parent().find('.phoneAlert').fadeIn(100);

    }else {
      $(this).css('border', 'ipx solid #080');

      $(this).parent().find('.phoneAlert').fadeOut(100);
    }

  });

  $('.mail ').blur(function(){
    if ($(this).val().length == 0){
      $(this).css('border', 'ipx solid #F00');
      $(this).parent().find('.mailAlert').fadeIn(100);

    }else {
      $(this).css('border', 'ipx solid #080');

      $(this).parent().find('.mailAlert').fadeOut(100);
    }

  });
  $('.center ').blur(function(){
    if ($(this).val().length == 0){
      $(this).css('border', 'ipx solid #F00');
      $(this).parent().find('.centerAlert').fadeIn(100);

    }else {
      $(this).css('border', 'ipx solid #080');

      $(this).parent().find('.centerAlert').fadeOut(100);
    }

  });
  $('.specialization').blur(function(){
    if ($(this).val().length == 0){
      $(this).css('border', 'ipx solid #F00');
      $(this).parent().find('.specAlert').fadeIn(100);

    }else {
      $(this).css('border', 'ipx solid #080');

      $(this).parent().find('.specAlert').fadeOut(100);
    }

  });


});
