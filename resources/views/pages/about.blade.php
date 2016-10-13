@extends('layouts.app')

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/page.css') }}">
@endsection

@endsection

@section('title')
	About Us - Droidtronix
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
                                <li class="active"><a href="#" class="pathway">About Us</a></li>
                            </ol>
                            <h2>About Us</h2>
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
	                <section class="sppb-section " style="margin:0px;padding:100px 0px;background-color:#ffffff;">
	                    <div class="sppb-container">
	                        <div class="sppb-section-title sppb-text-center">
	                            <h1 class="sppb-title-heading" style="font-size:36px;line-height: 36px;font-weight:300;margin-bottom:20px;">About Droidtronix</h1>
	                        </div>
	                        <div class="sppb-row">
	                            <div class="sppb-col-sm-12">
	                                <div class="sppb-addon-container " style="" data-sppb-wow-duration="300ms">
	                                    <div class="sppb-addon sppb-addon-text-block sppb-text-center ">
	                                        <div class="sppb-addon-content">
	                                        	<p> Droidtronix is an online site that aspires to provide it's readers with the latest updates on the technology world. We write on a variety of topics ranging from Linux Servers to Windows desktops OS and mobile devices. Sometimes we also engage in appreciating the beauty of Art and Literature.</p>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </section>
	                <section class="sppb-section " style="margin:70px 0;">
	                    <div class="sppb-container">
	                        <div class="sppb-section-title sppb-text-center">
	                            <h1 class="sppb-title-heading" style="font-size:36px;line-height: 36px;font-weight:300;">Meet The Team</h1>
	                            <p class="sppb-title-subheading" style="font-size:px;">We are a team of nerds, dedicated to Free and Open Source Technologies</p>
	                        </div>
	                        <div class="sppb-row">
	                            <div class="sppb-col-sm-12">
	                                <div class="sppb-addon-container " style="">
	                                    <div class="sppb-empty-space  clearfix" style="margin-bottom:50px;"></div>
	                                    <section class="sppb-section " style="">
	                                        <div class="sppb-container-inner">
	                                            <div class="sppb-row">
	                                                <div class="sppb-col-sm-4">
	                                                    <div class="sppb-addon-container " style="">
	                                                        <div class="sppb-addon sppb-addon-persion sppb-text-center ">
	                                                            <div class="sppb-addon-content">
	                                                                <div class="sppb-person-image"><img class="sppb-img-responsive" src="/img/shamil.jpg" alt="">
	                                                                </div>
	                                                                <div class="sppb-person-information"><span class="sppb-person-name">Shamil Choudhury</span><span class="sppb-person-designation">Administrator</span>
	                                                                </div>
	                                                            </div>
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                                <div class="sppb-col-sm-4">
	                                                    <div class="sppb-addon-container " style="">
	                                                        <div class="sppb-addon sppb-addon-persion sppb-text-center ">
	                                                            <div class="sppb-addon-content">
	                                                                <div class="sppb-person-image"><img class="sppb-img-responsive" src="/img/izzaz.jpg" alt="">
	                                                                </div>
	                                                                <div class="sppb-person-information"><span class="sppb-person-name">Izzaz A Barbhuiya</span><span class="sppb-person-designation">Editor</span>
	                                                                </div>
	                                                            </div>
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                                <div class="sppb-col-sm-4">
	                                                    <div class="sppb-addon-container " style="">
	                                                        <div class="sppb-addon sppb-addon-persion sppb-text-center ">
	                                                            <div class="sppb-addon-content">
	                                                                <div class="sppb-person-image"><img class="sppb-img-responsive" src="/img/sam.jpg" alt="">
	                                                                </div>
	                                                                <div class="sppb-person-information"><span class="sppb-person-name">Samujjwal Paitya</span><span class="sppb-person-designation">Author</span>
	                                                                </div>
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
	                </section>
	            </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
	<script src="{{ asset('js/page.js') }}"></script>
@endsection
