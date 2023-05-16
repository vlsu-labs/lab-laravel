@extends('layout.app')
@section('title', 'Products')
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>
   @foreach($products as $product)
   <div class="col-xs-18 col-sm-6 col-md-3">
     <div class="thumbnail">
       <img src="{{ $product->photo }}" width="500" height="300">
       <div class="caption">
         <h4>{{ $product->name }}</h4>
         <p>{{ \Illuminate\Support\Str::limit(strtolower($product->description), 50) }}</p>
         <p><strong>Price: </strong> {{ $product->price }}$</p>
        </div>
     </div>
   </div>
   @endforeach
 </div>

@endsection