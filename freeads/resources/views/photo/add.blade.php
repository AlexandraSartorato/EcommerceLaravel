@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Step 2 - Your　photos</div>
                <div class="panel-body">
                    @if (session('confirmation-success'))
                        <div class="alert alert-success">
                            {{ session('confirmation-success') }}
                        </div>
                    @else
                        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{route('photo.store', $annonce->id)}}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('photographie') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Photographie</label>

                                <div class="col-md-6">
                                    <input type="file" name="photographie[]" id="fileToUpload" multiple/>
                                    @if ($errors->has('photographie'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('photographie') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

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
