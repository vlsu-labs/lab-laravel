@extends('layout.app')
@section('title', 'Products')
@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
            <a class="btn btn-info" href="{{ url('card/') }}"> Card</a>
            </div>
        </div>
    </div>
 <div class="row">
   @foreach($products as $product)
   <div class="col-xs-18 col-sm-6 col-md-3">
     <div class="thumbnail">
       <img src="{{ $product->photo }}" width="500" height="300">
       <div class="caption">
         <h4>{{ $product->name }}</h4>
         <p>{{ \Illuminate\Support\Str::limit(strtolower($product->description), 50) }}</p>
         <p><strong>Price: </strong> {{ $product->price }}$</p>
         <p class="btn-holder"><a href="{{ url('card/add/'.$product->id) }}" class="btn btn-warning btn-block text-center">Add to cart</a> </p>
         <p class="btn-holder">
            <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Shows</a>
          </p>
          <p class="btn-holder">
            <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
          </p>
          <p class="btn-holder">
            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </p>
        </div>
     </div>
   </div>
   @endforeach
 </div>

@endsection
