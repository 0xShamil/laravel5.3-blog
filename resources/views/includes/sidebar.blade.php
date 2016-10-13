<div class="sp-column class2">

    <div class="sp-module ">
        <h3 class="sp-module-title">Categories</h3>
        <div class="sp-module-content">
            <div class="categories-module">
                @if($cats->count())
                    <ul class="stripped-list">
                        @foreach($cats as $cat)
                            <li>
                                <a href="{{ route('category.show', $cat->slug) }}">
                                    {{ $cat->name }} <span>({{ $cat->posts->count() }})</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    NO Categories Listed Yet
                @endif
            </div>
        </div>
    </div>

    <div class="sp-module ">
        <h3 class="sp-module-title">Most Popular</h3>
        <div class="sp-module-content">
            @if($popularPosts->count())
                <ul class="mostread stripped-list ">
                    @foreach($popularPosts as $pop)
                        <li>
                            <span class="created-on">{{ $pop->created_at->diffForHumans() }}</span>
                            <a href="{{ route('post.show', $pop->slug) }}">
                                {{ $pop->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                No Posts yet
            @endif
        </div>
    </div>

    <div class="sp-module ">
        <h3 class="sp-module-title">Tags Cloud</h3>
        <div class="sp-module-content">
            @if($tags->count())
                <ul class="post-tags">
                    @foreach($tags as $tag)
                        <li class="single-tag">
                            <a class="tag-link" href="{{ route('tag.show', $tag) }}">{{ $tag }}</a>
                        </li>
                    @endforeach
                </ul>
            @else
                No Tags yet
            @endif            
        </div>
    </div>
</div>