$(document).ready(function() {

    //Stiky header

    $(window).scroll(function() {

        if ($(this).scrollTop() > 1) {

            $('header').addClass("sticky");
        } else {

            $('header').removeClass("sticky");
        }


    });


    // Owl carousel 


    //tooltip 

    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })

    $('.navbar-toggle').click(function(){

        if($('#navbar').hasClass('navbar-active'))
        {
            $('#navbar').removeClass('navbar-active')
        }
        else
        {
             $('#navbar').addClass('navbar-active')
        }


    })



});
