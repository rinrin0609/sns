
$(function () {
  $('.modalopen').on('click', function () {
    var target = $(this).data('target');
    var modal = document.getElementById(target);
    $(modal).fadeIn();
    return false;
  });
});
$('.edit-img').on('click', function () {
  $('.js-modal').fadeOut();
  return false;
});

/*アコーディオンメニュー*/
$(function () {
  $('.nav-open').click(function () {
    $(this).toggleClass('active');
    $(this).next('nav').slideToggle();
  });
});
