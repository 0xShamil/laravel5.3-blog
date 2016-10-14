$(window).load(setTimeout(function(){
        swal({
            title: 'Enjoying our articles?',
            html:
               '<br>Why not find us on social media to stay updated.<br> <br>' +
               '<a href="https://www.facebook.com/droidtronix/" target="_blank">' +
               '<span class="fa-stack fa-lg">' +
                       '<i class="fa fa-circle fa-stack-2x"></i>' +
                       '<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>' +
                   '</span> </a>' +
               '<a href="https://twitter.com/droidtronix" target="_blank">' +
               '<span class="fa-stack fa-lg">' +
                       '<i class="fa fa-circle fa-stack-2x"></i>' +
                       '<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>' +
                   '</span> </a>',
            padding: 50,
            showCloseButton: false,
            showCancelButton: false,
            showConfirmButton: false,
        });
    }, popuptime));
