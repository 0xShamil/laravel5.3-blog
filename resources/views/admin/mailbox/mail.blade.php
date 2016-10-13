@extends('admin.layouts.default')

@section('content-header')
	<section class="content-header">
        <h1>
            Mailbox
            <small>13 new messages</small>
        </h1>
	</section>
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-9">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                    <div class="mailbox-read-info">
                    <h3>{{ $msg->subject }}</h3>
                    <h5>From: {{ $msg->sent_from }}
                    <span class="mailbox-read-time pull-right">{{ $msg->created_at->diffForHumans() }}</span></h5>
                    </div>
                    <!-- /.mailbox-read-info -->
                    <div class="mailbox-controls with-border text-center">
                        <div class="btn-group">
                            <a href="#" type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </div>
                    </div>
                    <!-- /.mailbox-controls -->
                    <div class="mailbox-read-message">
                        {!! $msg->body !!}
                    </div>
                    <!-- /.mailbox-read-message -->
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <div class="pull-right">
                            <a href="#" type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</a>
                        </div>

                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /. box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection
