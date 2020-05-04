@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Result</div>

                    <div class="card-body">
                        <p>Your result is </p>
                        <h2>Your Got : {{$final_grade}}</h2>
                        <h4>Points : {{$count}}/40</h4>
                        <ol class="list-group">
                            @for ($i = 1; $i <=40 ; $i++)
                                <li class="list-group-item">{{$i}}.

                                @if ($origina_ans[$i]===$user_ans[$i])
                                        <div style="display: inline-block;color: green;">
                                            {{ucfirst($origina_ans[$i])}} :: {{$user_ans[$i]}}
                                        </div>
                                    @else

                                           <div style="text-decoration: line-through;display: inline-block;color: #ff0000;">
                                               {{ucfirst($origina_ans[$i])}} :: {{$user_ans[$i]}}
                                           </div>

                                @endif
                                </li>
                            @endfor
                        </ol>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection



