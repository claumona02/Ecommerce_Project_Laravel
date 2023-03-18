@extends('layoutcos')
@section('title', 'Products')
@section('content')
 <div class="container products">
 <p class="btn-holder"><a href="{{ url('/') }}"
class="btn btn-warning btn-block text-center" role="button">Magazin</a> </p>
@if (Auth::user()->name=='admin')
<p class="btn-holder"><a href="{{ url('tasks') }}"
class="btn btn-danger  text-center" role="button">Editare Produse</a> </p>
@endif
 <div class="row">
 @foreach($products as $product)
 <div class="col-xs-18 col-sm-6 col-md-3">
 <div class="thumbnail">
 <img src="{{ $product->photo }}" width="250" height="250">
 <div class="caption">
 <h4>{{ $product->name }}</h4>
 <p>{{ \Illuminate\Support\Str::limit(strtolower($product->description),50) }}</p>
 <p><strong>Pret: </strong> {{ $product->price }} RON</p>
 <p class="btn-holder"><a href="{{ url('add-to-cart/'.$product->id) }}"
class="btn btn-warning btn-block text-center" role="button">Adauga in cos</a> </p>
 </div>
 </div>
 </div>
 @endforeach
 </div><!-- End row -->
 </div>
@endsection
