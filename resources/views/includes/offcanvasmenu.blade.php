<div class="offcanvas-menu">
    <a href="#" class="close-offcanvas"><i class="fa fa-remove"></i></a>
    <div class="offcanvas-inner">
        <div class="sp-module ">
            <h3 class="sp-module-title">Droidtronix</h3>
            <div class="sp-module-content">
                <ul class="nav menu">
                    <li><a href="/">Home</a></li>
                    <li class="deeper parent">
                        <a href="#">Categories</a>
                        <span class="offcanvas-menu-toggler collapsed" data-toggle="collapse" data-target="#collapse-menu-105" aria-expanded="false" aria-controls="collapse-menu-105"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></span>
                        <ul class="collapse" id="collapse-menu-105">
                            @if($cats->count())
                                @foreach($cats as $cat)
                                    <li class="deeper">
                                        <a href="{{ route('category.show', $cat->slug) }}"> {{ $cat->name }} </a>
                                    </li>
                                @endforeach
                            @else
                                <li class="deeper">
                                    <a href="#">No Categories yet</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                    <li class="item-111"><a href="#">Blog</a></li>
                    <li class="item-106"><a href="#">Tutorials</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas-overlay"></div>
