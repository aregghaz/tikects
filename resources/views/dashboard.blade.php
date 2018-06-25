@extends('page.index')
@section('title')

@endsection
@section('content')

    <div class="bg-dark dk" id="wrap">

        <!-- /#top -->
    @include('include.leftMenu')
    <!-- /#left -->
        <div id="content">
            <div class="outer">
                <div class="inner bg-light lter">
                    <div class="row">
                        @if(!empty($tickets))
                            @foreach($tickets as $ticket)
                                <article class="ticket">
                                    <header class="ticket__wrapper">
                                        <div class="ticket__header">
                                            {{ $ticket->name }}
                                        </div>
                                    </header>
                                    <div class="ticket__divider">
                                        <div class="ticket__notch"></div>
                                        <div class="ticket__notch ticket__notch--right"></div>
                                    </div>
                                    <div class="ticket__body">
                                        <section class="ticket__section">
                                            <h3>Name: {{ $ticket->name }}</h3>
                                            <p>Deadline: {{ $ticket->date }}</p>
                                            <input type="hidden" value="{{ $ticket->performer }}">
                                            <input type="text" id="text2"
                                                   class="form-control" name="performer"
                                                   value="{{ $ticket->performer }}" data-role="tagsinput"
                                                   placeholder="Performer "/>
                                        </section>
                                        <section class="ticket__section">
                                            <h2>Description</h2>
                                            <p> {{ $ticket->description }}</p>

                                        </section>
                                        <section class="ticket__section">
                                            <h3>Payment Method</h3>
                                            <p> {{ $ticket->created_at->format('Y-m-d ') }}</p>

                                        </section>
                                    </div>
                                    <footer class="ticket__footer">
                                        @if(!empty($comments))
                                            @foreach($comments as $comment)
                                                @if($comment->ticket_id == $ticket->id)
                                                    <p> {{$comment->comment }}</p><br>
                                                    <hr>
                                                @endif
                                            @endforeach
                                        @endif
                                        <form action="{{ route('addComment') }}" method="post">
                                            <div class="form-group">
                                                <label for="text2" class="control-label col-lg-4">Comment</label>
                                                <input type="hidden" value="{{ $ticket->id }}" name="ticketId">
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
                                </article>
                            @endforeach
                        @endif
                    </div>
                    <hr>


                </div>
                <!-- /.inner -->
            </div>
            <!-- /.outer -->
        </div>
        <!-- /#content -->



@endsection