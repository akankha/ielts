@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Listening Question no {{$questions->id}}</div>
                    <div class="card-body">
                        <div class="iframe-container">
                            <iframe width="850" height="400" src="https://www.youtube.com/embed/{{ $questions->urls}}"
                                    frameborder="0"
                                    allow="accelerometer; encrypted-media;"
                            ></iframe>
                        </div>

                        <form class="form-inline" method="POST" action="/listeningans">
                            @csrf
                            <input type="hidden" value="{{ $questions->id}}" name="listening_question_id">
                            <label for="urls">Write your Answer</label>
                            <div class="row">
                                @foreach(range(0,39) as $x)
                                    <div class="col-3">
                                        <label for="{{$x}}"> {{$x+1}}.
                                            <input class="m-1 " type="text" name="ans[]" value="{{old('ans.'.$x)}}">
                                        </label>
                                    </div>
                                @endforeach

                            </div>
                            <div class="col-12 float-right mt-3">
                                <input class="btn-primary" type="submit" name="submit">
                            </div>
                        </form>
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection



