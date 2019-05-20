@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="col-md-12 panel-heading">
                    <div class="col-md-8"><h4>Upload CSV File for Product</h4></div>
                    <div class="col-md-4"><a class="btn btn-info pull-right" href="{{route('products-list')}}">Products Listing</a></div>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{route('products-store')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}


                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Upload File</label>

                            <div class="col-md-6">
                                <input type="file" name="products_csv">

                                @if ($errors->has('products_csv'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('products_csv') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
