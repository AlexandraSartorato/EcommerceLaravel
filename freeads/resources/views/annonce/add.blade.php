@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Step 1 - Your Add</div>
                <div class="panel-body">
                    @if (session('confirmation-success'))
                        <div class="alert alert-success">
                            {{ session('confirmation-success') }}
                        </div>
                    @else
                        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{route('ad.store')}}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('titre') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Titre</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="titre"  required autofocus>

                                    @if ($errors->has('titre'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('titre') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('') ? ' has-error' : '' }}">
                                <label for="prix" class="col-md-4 control-label">Price</label>

                                <div class="col-md-6">
                                    <input type="number" name="prix" id="replyNumber" min="0" data-bind="value:replyNumber" />

                                    @if ($errors->has('prix'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('prix') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('') ? ' has-error' : '' }}">
                                <label for="taille" class="col-md-4 control-label">Size</label>

                                <div class="col-md-6">
                                    <select name="taille">
                                        <option value="">Choose</option>
                                        <option value="XS">XS</option>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="XXL">XXL</option>
                                    </select>
                                    @if ($errors->has('prix'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('prix') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('') ? ' has-error' : '' }}">
                                <label for="couleur" class="col-md-4 control-label">Couleur</label>
                                <div class="col-md-6">
                                    <select name="couleur">
                                        <option value="">Choose</option>
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
                                    @if ($errors->has('couleur'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('couleur') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('') ? ' has-error' : '' }}">
                                <label for="categorie" class="col-md-4 control-label">Categorie</label>
                                <div class="col-md-6">
                                    <select name="categorie" required>
                                        <option value="">Choose</option>
                                        <option value="Fashion">Fashion</option>
                                        <option value="Electronic">Electronic</option>
                                        <option value="Toys">Toys</option>
                                        <option value="House">House</option>
                                        <option value="Games">Video Games</option>
                                        <option value="Books">Books</option>
                                    </select>
                                    @if ($errors->has('categorie'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('categorie') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <textarea name="description"></textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <input type="hidden" name="note" value="0">

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
