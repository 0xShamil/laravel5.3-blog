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
                                            	<p><i>droidtronix.com</i> fully complies with the Digital Millennium Copyrigh Act (<strong>DMCA</strong>) and European Union Copyright Directive (<strong>EUCD</strong>). </p>

    											<p>If you have information about any copyrighted material owned by you which is located on <i>droidtronix.com</i> and you want us to remove it, please, take the following simple steps:

											    <p>- Send us an email to <strong>support@droidtronix.com</strong> with the Subject "<strong>Copyright abuse</strong>"</p>
											    <p>- Provide the exact link to the droidtronix.com web-page which contains the copyrighted material owned by you.
											    <p>- Send us an email from a verifiable email address (e.g. yourname@domain.com or yourname@yourcompany.com) </p>

											    <p>That’s all. Once we receive your links, we try to solve the problem as quickly as possible.</p>
											    <p>We usually try to resolve the matter within 48 hours.</p>
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
