@extends('layouts.app')

@section('title')
    Droidtronix - Open Source Hub
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
                                <li class="active"><a href="#" class="pathway">Blog</a></li>
                            </ol>
                            <h2>Posts in: {{ $category->name }}</h2>
                        </div>
                        <div class="col-sm-4">
                            <form class="form-product-search" action="#" method="get">
                                <input class="input-product-search" name="search" type="text" placeholder="Search this blog" value=""><i class="sb-icon-search"></i>
                            </form>
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
            <div class="blog" itemscope itemtype="http://schema.org/Blog">
                @if($posts->count())
                    @foreach($posts as $post)
                        <div class="items-row row clearfix">
                            <div class="col-sm-12">
                                <article class="item column-1" itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">
                                    <div class="entry-header">
                                        <dl class="article-info">
                                            <dt class="article-info-term"></dt>
                                            <dd class="create">
                                                <time datetime="2016-09-26T16:21:33+06:00" itemprop="dateCreated" data-toggle="tooltip" title="Created Date">
                                                    {{ $post->created_at->diffForHumans() }} 
                                                </time>
                                            </dd>
                                            /
                                            <dd class="category-name">
                                                <a href="#" itemprop="genre" data-toggle="tooltip" title="Article Category">{{ $post->category->name }}</a> 
                                            </dd>
                                        </dl>
                                        <h2 itemprop="name">
                                            <a href="{{ route('post.show', $post->slug) }}" itemprop="url">
                                                {{ $post->title }}
                                            </a>
                                        </h2>
                                    </div>
                                    <div class="entry-image intro-image">
                                        <a href="{{ route('post.show', $post->slug) }}">
                                            <img src="/uploads/{{ $post->image }}" alt="" itemprop="thumbnailUrl"/>
                                        </a>
                                    </div>
                                    <p>{!! $post->teaser !!}</p>
                                    <div class="kmt-readon">
                                        <span class="kmt-readmore aligned-right">
                                            <a href="{{ route('post.show', $post->slug) }}" title="{{ $post->title }}">Read More</a>
                                        </span>
                                    </div>
                                </article>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="items-row row clearfix">
                        <div class="col-sm-12">
                            <p>No posts to see</p>
                        </div>
                    </div>
                @endif
                <div class="pagination-wrapper">
                    <ul class="pagination">
                       {{ $posts->render() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="sp-right" class="col-sm-4 col-md-4">
        @include('includes.sidebar')
    </div>
@endsection