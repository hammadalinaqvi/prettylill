@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="col-md-6 panel-heading" style="height: 57px;">
                        <h4>Products Listing</h4>
                    </div>
                    <div class="col-md-6 panel-heading">
                        <a class="btn btn-info pull-right" href="{{route('home')}}">Upload Products</a>
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Discontinued</th>
                                <th>Stock</th>
                                <th>Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($products->count()>0)
                                @foreach($products  as $product)
                                    <tr>
                                        <td>{{$product->code}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->description}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>
                                            @if($product->discontinued === 1)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </td>
                                        <td>{{$product->stock}}</td>
                                        <td>{{$product->created_at}}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">No products available</td>
                                </tr>
                            @endif

                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
