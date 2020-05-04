@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <p>All Listening questions</p>
                        <hr>

                        @foreach($allquestion ?? '' as $column)
                            <ul>
                                <li>Listening Question {{$column->id}} ||
                                    <a href="{{route('listening.ans',$column->id)}}">Start</a>
                                </li>
                            </ul>


{{--                        <iframe width="850" height="400" src="https://www.youtube.com/embed/{{ $column->urls}}"--}}
{{--                                frameborder="0"--}}
{{--                                allow="accelerometer; encrypted-media;"--}}
{{--                                ></iframe>--}}

                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection



