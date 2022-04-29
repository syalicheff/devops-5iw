@extends('ecommerce')
@section('content')
  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach($produits as $produit)
        <div class="col">
          <div class="card shadow-sm">
            <img class="bd-placeholder-img card-img-top" src="{{asset('produits/'.$produit->photo_principale)}}" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text style="font-weight: bold; font-size: 35px;" x="50%" y="50%" fill="#eceeef" dy="1.3em">{{strToUpper($produit->nom)}}</text></img>

            <div class="card-body">
              <p class="card-text">{{$produit->description}}</p>
              <div class="d-flex justify-content-between align-items-center">
                  <span class="price">{{ number_format($produit->prix_ht, 2)}} €</span>
                  <a href="/produit/{{$produit->id}}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
              </div>
            </div>
          </div>
        </div>
          @endforeach
        </div>

        </div>
      </div>
@endsection