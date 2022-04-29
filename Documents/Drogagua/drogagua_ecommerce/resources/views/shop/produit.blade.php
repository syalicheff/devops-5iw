@extends('shop')
@section('content')
<br>
	<main role="main">


        <div class="container">


            <div class="row justify-content-between">
                <div class="col-6">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="{{asset('produits/'.$produit->photo_principale)}}" alt="Card image cap">
                    </div>
                </div>
                <div class="col-6">
                    <h1 class="jumbotron-heading">{{strToUpper($produit->nom)}}</h1>
                    <h5>{{ number_format($produit->prix_ht, 2)}} €</h5>
                    <p class="lead text-muted">{{$produit->description}}</p>
                    <hr>
                    <p>
                        <a href="#" class="btn btn-cart my-2 btn-block"><i class="fas fa-shopping-cart"></i> Ajouter au Tonneau</a>
                    </p>

                </div>
                
            </div>
        </div>


    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <h3>Vous aimerez aussi :</h3>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img src="{{asset('produits/x.jpg')}}" class="card-img-top img-fluid" alt="Responsive image">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img src="{{asset('produits/ad.jpg')}}" class="card-img-top img-fluid" alt="Responsive image">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img src="{{asset('produits/y.jpg')}}" class="card-img-top img-fluid" alt="Responsive image">
                    </div>
                </div>


            </div>
        </div>
    </div>

</main>
@endsection