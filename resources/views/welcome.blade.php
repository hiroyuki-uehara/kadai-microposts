@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-sm-4">
                @include('users.card', ['user' => Auth::user()])
            </aside>
            <div class="col-sm-8">
                    @if (Auth::id() === $user->id)
                        {!! Form::open(['route' => 'microposts.store']) !!}
                            <div class="form-group">
                                    {!! Form::textarea('content', old('content'), ['class' => 'form-control mb-1', 'rows'=> '2']) !!}
                                    {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                            </div>
                        {!! Form::close() !!}
                    @endif
                    @if (count($microposts) > 0)
                        @include('microposts.microposts', ['microposts' => $microposts])
                    @endif
            </div>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1 class="mb-6">Welcome to the Microposts</h1>
                <div class="mt-5">{!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}</div>
            </div>
        </div>
    @endif
@endsection