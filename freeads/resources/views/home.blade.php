@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="panel-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if(isset($annonces))
                        @foreach($annonces as $annonce)
                            <p>{{$annonce->titre}}</p>
                             @endforeach

                        @endif
                    You are logged in!
                            @if(Auth::id())
                                <a href="{{route('ad.index')}}" class="btn btn-primary">Enter the room</a>
                                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
