@extends('layouts.app')
@section('content')
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="{{route('ad.index')}}">Ads</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('ad.show',\Auth::id())}}">My Ads list</a>
            </li>
        </ul>
        <div class="panel-group">
            @foreach($annonces as $annonce)
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3>{{$annonce->titre}}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-5">
                                @foreach($annonce->photos as $photo)
                                    <img src="{{asset('storage/'.$photo->photographie)}}" height="200" widht="100">
                                @endforeach
                            </div>
                            <div class="col-md-7">
                                <p>Description:{{$annonce->description}}</p>
                                <h3 class="text-info"><strong>Price:{{$annonce->prix}}</strong><i class="fas fa-euro-sign"></i></h3>
                                <p class="text-info">Published:{{$annonce->created_at->diffForHumans()}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                            <i class="fab fa-amazon-pay fa-2x"></i>
                            <i class="fab fa-amazon fa-2x"></i>
                            <i class="fab fa-stripe fa-2x"></i>
                            <div class="pull-right">
                                <ul class="nav nav-pills">
                                <li><form method="post" action="{{ route('ad.delete', $annonce->id)}}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                    </form>
                                </li>
                                    <li><a href="{{route('ad.edit', $annonce->id) }}" class="btn btn-primary">Edit</a></li>
                                </ul>
                            </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection