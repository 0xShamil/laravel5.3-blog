@extends('layouts.app')

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/page.css') }}">
@endsection

@section('title')
	Copyright - Droidtronix
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
                                <li class="active"><a href="#" class="pathway">Copyright</a></li>
                            </ol>
                            <h2>Copyright Policy</h2>
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
	<div id="sp-component" class="col-sm-12 col-md-12">
        <div class="sp-column ">
            <div id="system-message-container"></div>
            <div id="sp-page-builder" class="sp-page-builder">
                <div class="page-content">
                    <section class="sppb-section " style="margin:0px;padding:0px 0px;">
                        <div class="sppb-container">
                            <div class="sppb-row">
                                <div class="sppb-col-sm-12">
                                    <div class="sppb-addon-container " style="" data-sppb-wow-duration="300ms">
                                        <div class="sppb-addon sppb-addon-text-block sppb-text-left ">
                                            <div class="sppb-addon-content">
                                            	{!! $sets->blog_copyright !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
	<script src="{{ asset('js/page.js') }}"></script>
@endsection
