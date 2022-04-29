@extends('shop')

@section('content')
	    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Acceuil</li>
            <li class="breadcrumb-item"><a href="#">Downers</a></li>
            <li class="breadcrumb-item"><a href="#">Uppers</a></li>
            <li class="breadcrumb-item"><a href="#">Trips</a></li>
            <li class="breadcrumb-item"><a href="#">Aphrodisiaques</a></li>
        </ol>
    </nav>
    <main role="main">


    <div class="py-3">
        <div class="container-fluid">
            <div class="row">
            	@foreach($produits as $produit)
                    <div class="col-md-3">
                        <div class="card mb-4 box-shadow">
                            <img src="{{asset('produits/'.$produit->photo_principale)}}" class="card-img-top img-fluid" alt="{{$produits->nom}}">
                            <div class="card-body">
                                <p class="card-text">{{$produits->nom}} <br>{{$produits->description}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price">{{ number_format($produits->prix_ht, 2)}}€</span>
                                    <a href="/produit/{{$produit->id}}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</main>
	
@endsection