@extends('layouts.app')
@section('content')
    <div class="container">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="https://images-na.ssl-images-amazon.com/images/G/01/kindle/merch/2018/TPR/EasterKET/VX-1587-TPR_AKET_GW-Hero-Desktop-3000x600-2X._CB500848118_.jpg" class="pic"  alt="fashion">
                    <div class="carousel-caption">
                        <h3>Discoveries electronic</h3>
                    </div>
                </div>
                <div class="item">
                    <img src="https://images-na.ssl-images-amazon.com/images/G/01/kindle/merch/2018/SPOT/Gateway/2PACK/VX-1561-2pk_ESP_GW-Hero-Desktop-3000x600_b1X._CB502700792_.jpg"  alt="fashion" class="pic">
                    <div class="carousel-caption">
                        <h3>Discoveries</h3>
                        <p>Not expensive</p>
                    </div>
                </div>
                <div class="item">
                    <img src="https://images-na.ssl-images-amazon.com/images/G/01/AMAZON_FASHION/2018/MISC/HERO_W_C_SpringDresses_2x._CB499272331_.jpg" class="pic" alt="fashion">
                    <div class="carousel-caption">
                        <h3>Discoveries</h3>
                        <p>Not expensive</p>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="sr-only">Next</span>
            </a>
        </div>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="{{route('ad.index')}}">Ads</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('ad.show',\Auth::id())}}">My Ads list</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('ad.create')}}">Add a new ad</a>
            </li>
        </ul>
    </div>
    <div class="container">
        <div class="col-md-3">
            <form method="post" action="{{url('search')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <select class="form-control" name="categorie">
                        <option value="">Category</option>
                        <option value="Fashion">Fashion</option>
                        <option value="Electronic">Electronic</option>
                        <option value="Toys">Toys</option>
                        <option value="House">House</option>
                        <option value="Games">Video Games</option>
                        <option value="Books">Books</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" name="taille">
                        <option value="">Size</option>
                        <option value="XS">XS</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="XXL">XXL</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" name="couleur">
                        <option value="">Color</option>
                        <option value="vert">Green</option>
                        <option value="red">Red</option>
                        <option value="blue">Bleu</option>
                        <option value="orange">Orange</option>
                        <option value="brown">Brown</option>
                        <option value="magenta">Magenta</option>
                        <option value="pink">Pink</option>
                        <option value="black">Black</option>
                        <option value="white">White</option>
                        <option value="grey">Grey</option>
                    </select>
                </div>
                <div class="list-inline">
                    <label for="min-price" class="col-md-2 control-label">Min price</label>
                    <input class="col-md-4" type="number" name="min_price">
                    <label for="min-price" class="col-md-2 control-label">Max price</label>
                    <input class="col-md-4" type="number" name="max_price">
                </div>
                <select class="form-control" name="city">
                    <option value="">City</option>
                    <option value="bourg">Bour-en-Bresse (01)</option>
                    <option value="laon">Laon (02)</option>
                    <option value="moulins">Moulins (03)</option>
                    <option value="digne">Digne (04)</option>
                    <option value="gap">Gap (05)</option>
                    <option value="nice">Nice (06)</option>
                    <option value="privas">Privas (07)</option>
                    <option value="charleville">Charleville-Mézières (08)</option>
                    <option value="foix">Foix (09)</option>
                    <option value="troyes">Troyes (10)</option>
                    <option value="carcassonne">Carcassonne (11)</option>
                    <option value="rodez">Rodez (12)</option>
                    <option value="marseille">Marseille (13)</option>
                    <option value="caen">Caen (14)</option>
                    <option value="aurillac">Aurilac (15)</option>
                    <option value="angouleme">Angoulême (16)</option>
                    <option value="larochelle">La Rochelle (17)</option>
                    <option value="bourges">Bourges (18)</option>
                    <option value="tulle">Tulle (19)</option>
                    <option value="ajaccio">Ajaccio (2A)</option>
                    <option value="bastia">Bastia (2B)</option>
                    <option value="dijon">Dijon (21)</option>
                    <option value="saintbrieuc">Saint-Brieuc (22)</option>
                    <option value="gueret">Guéret (23)</option>
                    <option value="perigueux">Périgueux (24)</option>
                    <option value="besancon">Besançon (25)</option>
                    <option value="lille">Valence (26)</option>
                    <option value="evreux">Evreux (27)</option>
                    <option value="chartres">Chartres (28)</option>
                    <option value="quimper">Quimper (29)</option>
                    <option value="nimes">Nîmes (30)</option>
                    <option value="toulouse">Toulouse (31)</option>
                    <option value="auch">Auch (32)</option>
                    <option value="bordeaux">Bordeaux (33)</option>
                    <option value="montpellier">Montpellier (34)</option>
                    <option value="rennes">Rennes (35)</option>
                    <option value="chateauroux">chateauroux (36)</option>
                    <option value="tours">Tours (37)</option>
                    <option value="grenoble">Grenoble (38)</option>
                    <option value="lons">Lons-le-Saunier (39)</option>
                    <option value="montdemarsan">Mont-de-Marsan (40)</option>
                    <option value="blois">Blois (41)</option>
                    <option value="saintetienne">Saint-Etienne (42)</option>
                    <option value="lepuyenvelay">Le Puy-en-Velay (43)</option>
                    <option value="nantes">Nantes (44)</option>
                    <option value="orleans">Orléans (45)</option>
                    <option value="cahors">Cahors (46)</option>
                    <option value="agen">Agen (47)</option>
                    <option value="mende">Mende (48)</option>
                    <option value="angers">Angers (49)</option>
                    <option value="saintlo">Saint-Lô (50)</option>
                    <option value="chalons">Châlons-en-Champagne (51)</option>
                    <option value="chaumont">Chaumont (52)</option>
                    <option value="laval">Laval (53)</option>
                    <option value="nancy">Nancy (54)</option>
                    <option value="barleduc">Bar-le-Duc (55)</option>
                    <option value="vannes">Vannes (56)</option>
                    <option value="metz">Metz (57)</option>
                    <option value="nevers">Nevers (58)</option>
                    <option value="lille">Lille (59)</option>
                    <option value="beauvais">Beauvais (60)</option>
                    <option value="alencon">Alençon (61)</option>
                    <option value="arras">Arras (62)</option>
                    <option value="clermont">Clermont-Ferrand (63)</option>
                    <option value="pau">Pau (64)</option>
                    <option value="tarbes">Tarbes (65)</option>
                    <option value="perpignan">Perpignan (66)</option>
                    <option value="strasbourg">Strasbourg (67)</option>
                    <option value="colmar">Colmar (68)</option>
                    <option value="lyon">Lyon (69)</option>
                    <option value="vesoul">Vesoul (70)</option>
                    <option value="macon">Mâcon (71)</option>
                    <option value="lemans">Le Mans (72)</option>
                    <option value="chambery">Chambéry (73)</option>
                    <option value="annecy">Annecy (74)</option>
                    <option value="paris">Paris (75)</option>
                    <option value="rouen">Rouen (76)</option>
                    <option value="melun">Melun (77)</option>
                    <option value="versailles">Versailles (78)</option>
                    <option value="niort">Niort (79)</option>
                    <option value="amiens">Amiens (80)</option>
                    <option value="albi">Albi (81)</option>
                    <option value="montauban">Montauban (82)</option>
                    <option value="toulon">Toulon (83)</option>
                    <option value="avignon">Avignon (84)</option>
                    <option value="larochesuryon">La-Roche-sur-Yon (85)</option>
                    <option value="poitiers">Poitiers (86)</option>
                    <option value="limoges">Limoges (87)</option>
                    <option value="epinal">Epinal (88)</option>
                    <option value="auxerre">Auxerre (89)</option>
                    <option value="belfort">Belfort (90)</option>
                    <option value="evry">Evry (91)</option>
                    <option value="nanterre">Nanterre (92)</option>
                    <option value="bobigny">Bobigny (93)</option>
                    <option value="creteil">Créteil (94)</option>
                    <option value="pontoise">Pontoise (95)</option>
                </select>
                <button class="btn btn-primary" type="submit">Filter</button>
            </form>
        </div>
    <div class="col-md-9">
        <div class="panel-group">
            @if(isset($details))
    @foreach($details as $annonce)
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3>{{$annonce->titre}}</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
                                <img src="{{asset('storage/' . $annonce->photographie)}}" height="120" widht="100">-
                        </div>
                    <div class="col-md-7">
                        <div class="rate"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                        </div>
                    <p><i class="fas fa-tags"></i>Categorie :{{$annonce->categorie}}</p>
                        <p>Description :{{$annonce->description}}</p>
                    <h3 class="text-info"><strong>Price :{{$annonce->prix}}</strong><i class="fas fa-euro-sign"></i></h3>
                        {{ Carbon\Carbon::parse($annonce->created_at)->format('Y-m-d') }}
                    </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <i class="fab fa-amazon-pay fa-2x"></i>
                    <i class="fab fa-amazon fa-2x"></i>
                    <i class="fab fa-stripe fa-2x"></i>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
    </div>
@endsection