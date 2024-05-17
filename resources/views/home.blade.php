@extends('layouts.app')

@section('content')

<div class="container mt-4">
  @foreach ($categories as $category)
      <a href="{{ url("/products?category=" . $category->id) }}" class="btn">{{ $category->name}}</a>
  @endforeach
</div>

<br>

<div id="carouselExampleSlidesOnly" class="carousel slide mt-4" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="...">
      </div>
    </div>
</div>

<div class="container mx-5 mt-5">
  <h2>Bienvenue sur ESGI Commerce - Votre destination pour le divertissement numérique !</h2>
  <p>Chez ESGI Commerce, nous sommes passionnés par le monde du jeu et de la technologie. Nous croyons fermement que le divertissement numérique est plus qu'un simple passe-temps, c'est une expérience qui transporte les joueurs dans des mondes extraordinaires, les défie avec des énigmes complexes et leur permet de se connecter avec des communautés du monde entier.</p>
  <br>
  <p>Que vous soyez un gamer chevronné, un amateur de jeux occasionnel ou un passionné de technologie en quête des dernières innovations, vous trouverez tout ce dont vous avez besoin chez nous. Nous offrons une vaste sélection de consoles de jeu de dernière génération, des titres de jeux les plus attendus aux classiques intemporels, ainsi qu'une gamme de PC gaming puissants pour répondre à tous vos besoins.</p>

  <h2>Découvrez notre collection :</h2>
  <p>Consoles de jeu: Plongez dans l'action avec les dernières consoles de jeu des plus grandes marques comme PlayStation, Xbox et Nintendo. Vivez des aventures épiques, des combats intenses et des courses palpitantes avec des graphismes époustouflants et un gameplay immersif.</p>
  <p><strong>Jeux:</strong> Explorez notre bibliothèque de jeux pour tous les genres et toutes les plateformes. Que vous soyez fan de RPG, de jeux de tir, de jeux de sport ou de jeux de stratégie, vous trouverez votre bonheur parmi notre sélection de titres populaires et de nouveautés à découvrir.</p>
  <p><strong>PC gaming:</strong> Équipez-vous d'un PC gaming performant pour vivre une expérience de jeu ultime. Nos PC gaming sont conçus pour offrir des performances exceptionnelles, des graphismes époustouflants et une fiabilité à toute épreuve, vous permettant de jouer à vos jeux préférés avec fluidité et précision.</p>
</div>

<div class="container mt-5">
    <h2>Promotions</h2>
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Produit en Promotion</h5>
            <p class="card-text">Description du produit en promotion.</p>
            <a href="#" class="btn btn-primary">Voir le Produit</a>
          </div>
        </div>
      </div>
      <!-- Ajoutez plus de cartes pour d'autres promotions -->
    </div>
</div>

<div class="container mt-5">
    <h2>Offres Spéciales</h2>
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Offre Spéciale</h5>
            <p class="card-text">Description de l'offre spéciale.</p>
            <a href="#" class="btn btn-primary">Voir l'Offre</a>
          </div>
        </div>
      </div>
      <!-- Ajoutez plus de cartes pour d'autres offres spéciales -->
    </div>
  </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection
