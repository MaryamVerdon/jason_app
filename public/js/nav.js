$(document).ready(function(){
    $(window).scroll(function(){
        var scroll = $(window).scrollTop();
        if (scroll > 300) {
          $("nav").css("background-color" , "white" );
          $("nav .navbar-brand").css("color", "black");
          $(".navbar-nav .nav-link").css("color", "black");
          
          
        }
  
        else{
            $("nav").css("background-color" , "transparent");  	
            $("nav .navbar-brand").css("color", "white");
          $(".navbar-nav .nav-link").css("color", "white");
        }
    })
  })