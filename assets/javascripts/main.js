$(function(){
  $("#edit-post-button").on('click', function(){
    $(".show-post-edit-area").removeClass("hidden-form");
  });
  $(".edit-comment-button").on('click', function(){
    $(this).parent().next("div.show-post-edit-comment-area").removeClass("hidden-form");
  });
});