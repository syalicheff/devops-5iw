<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('img/favicon_drugs.png')}}">

    <title>Drogagua</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/drugs.css')}}" rel="stylesheet">
    <link href="{{asset('css/collectiondrugs.css')}}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0b4caedf44.js" crossorigin="anonymous"></script>

</head>

<body>

@include('layouts.header')

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Droga quoi ? Bah drogagua</h1>
        <p class="lead text-muted">La drogue, c'est de l'eau ? Ah bon ? Je vous souhaite donc la bienvenue à DROGAGUA, site de vente de drogue en ligne, ici, on en a pour toutes les défonces, des douleurs ? BAM des sédatifs de qualité , une envie de voyager vers Namek ou de même rejoindre le monde de Oui-Oui, let's go avec nos magnifiques TRIPS, pour les grands droguer, on ne vous oublie pas, de la drogue bien dure bien mortelle sur le long terme ahah. PS : oui papi, je sais que tu es là, tu vas rendre mami heureuse avec nos petits produits aphrodisiaque t'inquiète...</p>
      </div>
    </div>
  </section>
  @yield('content')

</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#" class="fa-solid fa-bounce" style="text-decoration: none; color: black;">Back to top</a>
    </p>
    <p class="mb-0 fa-solid fa-bounce"><a href="/" style="text-decoration: none; color: black;">Visit the homepage</a>
  </div>
</footer>


    <script src="{{asset('js/bootstrap.bundle.min.js')}}" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      
  </body>
</html>