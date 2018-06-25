@extends('page.index')
@section('title')

@endsection
@section('content')
    <style>
        .body{
            min-height: 600px;
        }
    </style>
    <div class="bg-dark dk" id="wrap">

        <!-- /#top -->
    @include('include.leftMenu')
    <!-- /#left -->
        <div id="content">
            <div class="outer">
                <div class="inner bg-light lter">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="box">
                                <header>
                                    <h5>User list</h5>

                                </header>
                                <ul id="ticketList">
                                    @foreach($ticket as $value)
                                        <li class="ticketList" title="{{ $value->id  }}">{{ $value->name  }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- /.col-lg-4 -->
                        <div class="col-lg-8">
                            <div class="box">
                                <header>
                                    <h5>Paragraph</h5>
                                    <div class="toolbar">

                                    </div>
                                </header>

                                    @foreach($ticket as $value)

                                    <div class="body"  id="{{  $value->id }}"  style="display: none">
                                        <header>
                                            <h5>{{  $value->name }}</h5>
                                            <div class="toolbar">

                                            </div>
                                        </header>
                                        <div class="col-md-12">
                                            <div class="col-md-6">

                                                <div class="col-md-6">
                                                    Performer: {{  $value->performer }}
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                            <div class="col-md-6">
                                            @if($value->role === "hight")
                                                 level:   <span class="label label-warning">{{  $value->role }}</span>
                                                @elseif($value->role == 'medium')
                                                    level:  <span class="label label-default">{{  $value->role }}</span>
                                                @else
                                                    level:  <span class="label label-info">{{  $value->role }}</span>
                                                @endif
                                            </div>
                                                <div class="col-md-6" >
                                                    DeadLine :{{  $value->date }}
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="height: 200px;border: 1px solid black">
                                                <header>
                                                    <h5>Description</h5>
                                                    <div class="toolbar">

                                                    </div>
                                                </header>
                                                {{  $value->description }}
                                            </div>
                                            <footer class="ticket__footer">
                                                @if(!empty($comments))
                                                    <div >
                                                    @foreach($comments as $comment)
                                                        @if($comment->ticket_id == $value->id)

                                                               <p> {{$comment->comment }} </p><p style="    font-size: 10px;">{{$comment->user_name }} {{$comment->	created_at }}</p><br>



                                                        @endif
                                                    @endforeach
                                                    </div>
                                                @endif
                                                <form action="{{ route('addComment') }}" method="post">
                                                    <div class="form-group">
                                                        <label for="text2" class="control-label col-lg-4">Comment</label>
                                                        <input type="hidden" value="{{ $value->id }}" name="ticketId">
                                                        <div class="col-lg-8">
                                                    <textarea name="comment" id="text2"
                                                              class="form-control"></textarea>
                                                        </div>
                                                        <input type="hidden" name="_token" value="{{  Session::token() }}">
                                                        <button class="btn btn-lg btn-primary btn-block" type="submit">Comment
                                                        </button>

                                                    </div>
                                                </form>
                                            </footer>
                                        </div>

                                    </div>
                                    @endforeach

                            </div>
                        </div>
                        <!-- /.col-lg-8 -->
                    </div>
                    <!-- /.row -->


                </div>
                <!-- /.inner -->
            </div>
            <!-- /.outer -->
        </div>
        <!-- /#content -->

    </div>
    <script>
        $('.ticketList').on('click', function (event) {

            var ticketId = $(event.target).attr('title')
            $('#' + ticketId).css('display', 'block')
        })
    </script>
@endsection