<script src="{{ asset('js/jquery.contact-buttons.js') }}"></script>
    <script>
        // Google Fonts
        WebFontConfig = {
          google: { families: [ 'Lato:400,700,300:latin' ] }
        };
        (function() {
          var wf = document.createElement('script');
          wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
          wf.type = 'text/javascript';
          wf.async = 'true';
          var s = document.getElementsByTagName('script')[0];
          s.parentNode.insertBefore(wf, s);
        })();

        // Initialize Share-Buttons
        $.contactButtons({
          effect  : 'slide-on-scroll',
          buttons : {
            'facebook':   { class: 'facebook', use: true, link: 'https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}', title: 'Share on Facebook' },
            'twitter':    { class: 'twitter',  use: true, link: 'https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}', title: 'Share on Twitter'},
            'google':     { class: 'gplus',    use: true, link: 'https://plus.google.com/share?url={{ urlencode(request()->fullUrl()) }}', title: 'Share on Google+' },
            'pinterest':   { class: 'pinterest', use: true, link: 'https://pinterest.com/pin/create/button/?{{
                                http_build_query([
                                    'url' => request()->fullUrl(),
                                    'media' => 'http://www.droidtronix.com/uploads/$post->image',
                                    'description' => $post->teaser
                                ])
                                }}', title: 'Share on Pinterest' 
                            },
            'reddit':     { class: 'reddit',    use: true, link: 'http://reddit.com/submit?url={{ urlencode(request()->fullUrl()) }}', title: 'Share on Reddit' },
            'linkedin':    { class: 'linkedin', use: true, link: 'http://www.linkedin.com/shareArticle?mini=true&amp;url{{ urlencode(request()->fullUrl()) }}', title: 'Share on LinkedIn' },
            'tumblr':    { class: 'tumblr', use: true, link: 'http://www.tumblr.com/share/link?url={{ urlencode(request()->fullUrl()) }}', title: 'Share on Tumblr' },
          }
        });
    </script>
    <script>

        var popupSize = {
            width: 780,
            height: 550
        };

        $(document).on('click', '#contact-buttons-bar > a', function(e){

            var
                verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
                horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

            var popup = window.open($(this).prop('href'), 'social',
                'width='+popupSize.width+',height='+popupSize.height+
                ',left='+verticalPos+',top='+horisontalPos+
                ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

            if (popup) {
                popup.focus();
                e.preventDefault();
            }

        });
    </script>