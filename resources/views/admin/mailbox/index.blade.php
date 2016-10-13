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
            <div class="col-md-10 ">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Inbox</h3>

                        <div class="box-tools pull-right">
                        <div class="has-feedback">
                        <input type="text" class="form-control input-sm" placeholder="Search Mail">
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                                <tbody>
                                    @if($messages->count())
                                        @foreach($messages as $msg)
                                            <tr>
                                                <td><input type="checkbox" value="{{ $msg->id }}"></td>
												<td class="mailbox-star">
													<i class="fa fa-star @if($msg->unread) text-yellow @endif"></i>
												</td>
                                                <td class="mailbox-name">
                                                    <a href="{{ route('admin.mailbox.mail', $msg->id) }}">{{ $msg->sender }}</a>
                                                </td>
                                                <td class="mailbox-subject">
                                                    {{ $msg->subject }}
                                                </td>
                                                <td class="mailbox-date">{{ $msg->created_at->diffForHumans() }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td>
                                                No Messages to see
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <!-- /.table -->
                        </div>
                        <!-- /.mail-box-messages -->
                    </div>

                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
