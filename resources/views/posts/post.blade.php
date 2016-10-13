@extends('layouts.app')

@section('title')
    {{ $post->title }} - Droidtronix
@endsection

@section('meta')
    @include('partials._meta')
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('vendor/prismjs/prism.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/prismjs/themes/prism-xonokai.css') }}">
@endsection

@section('pagetitle')
    <div id="sp-title" class="col-sm-12 col-md-12">
        <div class="sp-column ">
            <div class="sp-page-title">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8">
                            <ol class="breadcrumb">
                                <li><a href="/" class="pathway">Home</a></li>
                                <li><a href="/blog" class="pathway">Blog</a></li>
                                <li class="active"><a href="#" class="pathway">{{ $post->title }}</a></li>
                            </ol>
                            <h2>Article</h2>
                        </div>
                        <div class="col-sm-4">
                            @include('partials._search')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div id="sp-component" class="col-sm-8 col-md-8">
        <div class="sp-column ">
            <div id="system-message-container"></div>
            <article class="item item-page" itemscope itemtype="http://schema.org/Article">
                <meta itemprop="inLanguage" content="en-GB"/>
                <div class="entry-header">
                    <dl class="article-info">
                        <dt class="article-info-term"></dt>
                        <dd class="create">
                            <time datetime="2016-09-26T16:21:33+06:00" itemprop="dateCreated" data-toggle="tooltip" title="Created Date">
                            {{ $post->created_at->diffForHumans() }} </time>
                        </dd>
                        /
                        <dd class="category-name">
                            <a href="#" itemprop="genre" data-toggle="tooltip" title="Article Category">
                                {{ $post->category->name }}
                            </a>
                        </dd>
                    </dl>
                    <h2 itemprop="name">
                        {{ $post->title }}
                    </h2>
                </div>
                <div class="entry-image full-image">
                    <img src="/uploads/{{ $post->image }}" alt="" itemprop="image"/>
                </div>
                <div class="social-share">
                    <ul>
                        <li>
                            <a class="share-facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"><i class="fa fa-facebook"></i><span class="hidden-xs">&nbsp; Facebook</span></a>
                        </li>
                        <li>
                            <a class="share-twitter" target="_blank" href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}"><i class="fa fa-twitter"></i></i><span class="hidden-xs">&nbsp; Twitter</span></a>
                        </li>
                        <li>
                            <a class="share-google-plus" target="_blank" href="https://plus.google.com/share?url={{ urlencode(request()->fullUrl()) }}"><i class="fa fa-google-plus"></i></a>
                        </li>
                    </ul>
                </div>
                <div itemprop="articleBody" class="blog-post">
                    {!! $post->content !!}
                    <hr>
                    @if($post->existingTags())
                        <ul class="post-tags">
                            @foreach($post->tags as $posttag)
                                <li class="single-tag">
                                    <a class="tag-link" href="{{ route('tag.show', $posttag->slug) }}">{{ $posttag->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="article-author">
                    <div class="media">
                        <div class="pull-left">
                            <img src="{{ $post->user->hasAvatar() ? '/uploads/avatars/' . $post->user->avatar : '/img/user.png' }}" alt="{{ $post->user->username }}">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">
                                {{ $post->user->getNameorUsername() }}
                            </h4>
                            <div class="profile-description">
                                {{ $post->user->bio }}
                            </div>
                            <div class="profile-social">
                                <ul>
                                    <li><a target="_blank" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a target="_blank" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a target="_blank" href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
    <div id="sp-right" class="col-sm-4 col-md-4">
        @include('includes.sidebar')
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('vendor/prismjs/prism.js') }}"></script>
    <script>
        var popuptime = 2000;
        @include('partials._likeus')
    </script>
@endsection
