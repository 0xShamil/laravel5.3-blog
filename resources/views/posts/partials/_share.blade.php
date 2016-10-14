<ul>
    <li>
        <a class="share-facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"><i class="fa fa-facebook-f"></i></a>
    </li>
    <li>
        <a class="share-twitter" target="_blank" href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}"><i class="fa fa-twitter"></i></a>
    </li>
    <li>
        <a class="share-google-plus" target="_blank" href="https://plus.google.com/share?url={{ urlencode(request()->fullUrl()) }}"><i class="fa fa-google-plus"></i></a>
    </li>
    <li>
        <a class="share-reddit" target="_blank" href="http://reddit.com/submit?url={{ urlencode(request()->fullUrl()) }}"><i class="fa fa-reddit-alien"></i></a>
    </li>
    <li>
        <a class="share-linkedin" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url{{ urlencode(request()->fullUrl()) }}"><i class="fa fa-linkedin"></i></a>
    </li>
    <li>
        <a class="share-tumblr" target="_blank" href="http://www.tumblr.com/share/link?url={{ urlencode(request()->fullUrl()) }}"><i class="fa fa-tumblr"></i></a>
    </li>
    <li>
        <a class="share-pinterest" target="_blank" href="https://pinterest.com/pin/create/button/?{{
                http_build_query([
                    'url' => request()->fullUrl(),
                    'media' => 'http://www.droidtronix.com/uploads/$post->image',
                    'description' => $post->teaser
                ])
            }}"><i class="fa fa-pinterest-p"></i>
        </a>
    </li>
    <li>
        <a class="share-stumbleupon" target="_blank" href="https://www.stumbleupon.com/submit?url={{ urlencode(request()->fullUrl()) }}&title={{ $post->title }}"><i class="fa fa-stumbleupon"></i></a>
    </li>
</ul>
