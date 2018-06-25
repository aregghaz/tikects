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
                        <div class="col-lg-4">
                            <div class="box">
                                <header>
                                    <h5>User list</h5>

                                </header>
                                <ul>
                                    @foreach($users as $value)
                                        <li title="{{ $value->id }}">{{ $value->name }}<i class="glyphicon glyphicon-plus"></i></li>
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
                                <div class="body">
                                    <form class="form-horizontal" method="post" action="{{ route('newTicket') }}">

                                        <div class="form-group">
                                            <label for="text1" class="control-label col-lg-4">Ticket Name</label>

                                            <div class="col-lg-8">
                                                <input type="text" id="text1" name="name" placeholder="name"
                                                       class="form-control">
                                            </div>
                                        </div>

                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="limiter" class="control-label col-lg-4">Description</label>

                                            <div class="col-lg-8">
                                                <textarea id="limiter" class="form-control"
                                                          name="description"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text2" class="control-label col-lg-4">Dead line</label>

                                            <div class="col-lg-8">
                                                <input type="date" id="text2" value=""
                                                       class="form-control" name="date"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text2" class="control-label col-lg-4">Performer</label>

                                            <div class="col-lg-8">
                                                <input type="text" id="text2" value=""
                                                       class="form-control" name="performer" data-role="tagsinput"
                                                       placeholder="Add tags"/>
                                                <input type="hidden"  id="performer" name="performer">
                                                <input type="hidden"  id="userId" name="userId">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="users" class="control-label col-lg-4">Select Level</label>
                                            <div class="col-lg-8">
                                                <select name="level" id="users">

                                                    <option value="default">default</option>
                                                    <option value="hight">hight</option>
                                                    <option value="medium">medium</option>
                                                    <option value="low">low</option>

                                                </select>
                                            </div>
                                        </div>

                                        <input type="hidden" name="_token" value="{{  Session::token() }}">
                                        <button class="btn btn-default" type="submit">Create</button>
                                    </form>
                                </div>
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
        $('.glyphicon-plus').on('click', function (event) {

            console.log($(event.target.parentNode).text())
            if($('#performer').val()){
                var performer = $('#performer').val() +',';
                $('#performer').val( performer+ $(event.target.parentNode).text())
            }else {
                $('#performer').val($(event.target.parentNode).text() )
            }
            if($('#userId').val()){
                var performer2 = $('#userId').val() +',';
                $('#userId').val( performer2+ $(event.target.parentNode).attr('title'))
            }else {
                $('#userId').val($(event.target.parentNode).attr('title') )
            }

            $('.bootstrap-tagsinput').append('<span class="tag label label-info">' + $(event.target.parentNode).text() + '<span data-role="remove"></span></span>')

        })
    </script>
@endsection