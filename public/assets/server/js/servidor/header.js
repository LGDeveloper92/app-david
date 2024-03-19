

$(".header-reporte").on('click', function(){
    

  $("#modalReporte").addClass("md-show");
  $(".md-show").css("visibility","visible");
  $(".md-overlay").css('opacity','1')
  $(".md-overlay").css('visibility','visible')
  $('#bodymodal').html('<div class="loader-block"><svg id="loader2" viewBox="0 0 100 100"><circle id="circle-loader2" cx="50" cy="50" r="45"></circle></svg></div>')
  
})




$("#btnmodelclosemodalReporte").on('click', function(){
     $(".md-overlay").css('opacity','0');
     $(".md-overlay").css('visibility','hidden');
     $("#modalReporte").removeClass("md-show");
     $(".md-show").css("visibility","hidden");
     $(".md-modal").css("visibility","hidden");
     $("#bodymodal").html(""); 
  })

  $(".md-overlay").on('click', function(){
    $(".md-overlay").css('opacity','0')
    $(".md-overlay").css('visibility','hidden')
    $("#modalReporte").removeClass("md-show");
    $(".md-show").css("visibility","hidden");
    $(".md-modal").css("visibility","hidden");
    $("#bodymodal").html(""); 
  })








