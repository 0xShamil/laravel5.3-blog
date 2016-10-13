@extends('layouts.app')

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/page.css') }}">
@endsection

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
                                <li class="active"><a href="#" class="pathway">Contact</a></li>
                            </ol>
                            <h2>Contact Us</h2>
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
                    <section class="sppb-section " style="margin:0px;padding:0 0;">
                        <div class="sppb-container">
                            <div class="sppb-row">
                                <div class="sppb-col-sm-8">
                                    <div class="sppb-addon-container " style="">
                                        <div class="sppb-addon sppb-addon-ajax-contact-advanced ">
                                            <h2 class="sppb-addon-title" style="font-size:30px;line-height:30px;font-weight:300;">Drop Us A Line</h2>
                                            <p class="lead">Give us a shoutout or throw us your concerns</p>
                                            <div class="sppb-addon-content">
                                                <form class="sppb-ajaxt-contact-form-advanced" action="/submit" method="POST">
													{{ csrf_field() }}
                                                    <div class="sppb-form-group">
                                                        <input type="text" name="name" class="sppb-form-control" placeholder="Name" required>
                                                    </div>
                                                    <div class="sppb-form-group">
                                                        <input type="email" name="sent_from" class="sppb-form-control" placeholder="Email" required>
                                                    </div>
                                                    <div class="sppb-form-group">
                                                        <input type="text" name="subject" id="input-subject" class="sppb-form-control" placeholder="Subject">
                                                    </div>
                                                    <div class="sppb-form-group">
                                                        <textarea type="text" name="body" rows="5" class="sppb-form-control" placeholder="Message" required></textarea>
                                                    </div>

                                                    <button type="submit" class="sppb-btn sppb-btn-success sppb-btn-lg"><i class="fa"></i> Send Message</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sppb-col-sm-4">
                                    <div class="sppb-addon-container " style="">
                                        <div class="sppb-empty-space  sppb-hidden-sm sppb-hidden-sm sppb-hidden-xs clearfix" style="margin-bottom:50px;"></div>
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
