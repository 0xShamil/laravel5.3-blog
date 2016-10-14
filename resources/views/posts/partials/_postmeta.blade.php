<meta property="og:description" content="{{ $post->teaser }}"/>
<meta name="keywords" content="{{ implode(', ', $post->tagNames()) }}">

<!-- Facebook -->
<meta property="og:title" content="{{ $post->title }} | Droidtronix"/>
<meta property="og:description" content="{{ $post->teaser }}"/>
<meta property="og:site_name" content="Droidtronix"/>
<meta property="og:type" content="article"/>
<meta property="og:url" content="http://www.droidtronix.com/post/{{ $post->slug }}" />

<!-- Twitter -->
<meta name="twitter:site" content="@droidtronix">
<meta name="twitter:title" content="{{ $post->title }} | Droidtronix">
<meta name="twitter:description" content="{{ $post->teaser }}">
<meta name="twitter:creator" content="Droidtronix">
<meta name="twitter:card" content="photo" />
<meta name="twitter:url" content="http://www.droidtronix.com/post/{{ $post->slug }}"/>

<meta property='og:image' content="http://www.droidtronix.com/uploads/{{ $post->image }}"/>
<meta name="twitter:image" content="http://www.droidtronix.com/uploads/{{ $post->image }}">

<link rel='canonical' href='http://www.droidtronix.com/post/{{ $post->slug }}'>
