@extends('layouts.app')

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/page.css') }}">
@endsection

@section('title')
	Privacy Policy - Droidtronix
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
                                <li class="active"><a href="#" class="pathway">Privacy</a></li>
                            </ol>
                            <h2>Privacy Policy</h2>
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
            <div id="system-message-container">
            </div>
            <div id="sp-page-builder" class="sp-page-builder">
                <div class="page-content">
                    <section class="sppb-section " style="margin:0px;padding:0px 0px">
                        <div class="sppb-container">
                            <div class="sppb-row">
                                <div class="sppb-col-sm-12">
                                    <div class="sppb-addon-container " style="" data-sppb-wow-duration="300ms">
                                        <div class="sppb-addon sppb-addon-text-block sppb-text-left ">
                                            <h3 class="sppb-addon-title" style="margin-top:0px;">Introduction</h3>
                                            <div class="sppb-addon-content">
                                            	We at droidtronix.com take your privacy very seriously. We do not collect any personal information about our users except information which is necessary for administrative purposes.

                                            	We do not sell, share or disclose any of your personal information with any third parties.

												We may use third-party advertising or other services to make droidtronix.com better. These services may use some information about your activity on this site in order to provide you with better services. Even in this case your personal information is not shared

												droidtronix.com may use cookies to store some information to improve the quality of our service. Cookies are stored on your computer and can be deleted by you or you can prevent the storage of cookies.
                                            </div>
                                        </div>
                                        <div class="sppb-empty-space  clearfix" style="margin-bottom:30px;"></div>
                                        <div class="sppb-addon sppb-addon-text-block sppb-text-left ">
                                            <h3 class="sppb-addon-title" style="margin-top:0px;">Disclaimer</h3>
                                            <div class="sppb-addon-content">
                                            	droidtronix.com may update this privacy policy at any time without additional notification. All changes will be published on this page.
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
