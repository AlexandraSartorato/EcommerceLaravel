@extends('layouts.app')
@section('content')
    <style>

    </style>
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#">Ads</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">My Ads list</a>
            </li>
        </ul>
        <div class="col-md-3">
            <form method="post" action="{{route('rate.store', $annonce->id)}}">
                {{ csrf_field() }}
                    <div class="rating">
                        <input type="radio" id="star5" name="note" value="5" /><label for="star5" title="top">5 stars</label>
                        <input type="radio" id="star4" name="note" value="4" /><label for="star4" title="excellent">4 stars</label>
                        <input type="radio" id="star3" name="note" value="3" /><label for="star3" title="medium">3 stars</label>
                        <input type="radio" id="star2" name="note" value="2" /><label for="star2" title="quite">2 stars</label>
                        <input type="radio" id="star1" name="note" value="1" /><label for="star1" title="sad">1 star</label>
                    </div>
                <button type="submit" class="btn btn-primary">Vote</button>
            </form>
        </div>
        <div class="col-md-9">
        <div class="panel-group">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3>{{$annonce->titre}}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-5">
                                @foreach($annonce->photos as $photo)
                                    <img src="{{asset('storage/'.$photo->photographie)}}" height="100" widht="100">
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
                            </div>
                    </div>
                </div>
        </div>
    </div>
    </div>
@endsection