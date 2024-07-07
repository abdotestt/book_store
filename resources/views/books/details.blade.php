@extends('default')

@section("main")
  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>{{$book->title}}</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="single-product section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="left-image">
            <img src="../assets/images/{{$book->cover}}" alt="">
          </div>
        </div>
        <div class="col-lg-6 align-self-center">
          <h4>{{$book->title}}</h4>
          <span class="price"><em>$28</em> $22</span>
          <p>{{$book->description}}</p>
          
          <!-- Assurez-vous que l'identifiant de l'utilisateur est correctement passé -->
          <form action="{{route('carts.store')}}" method="post">
            @csrf
            <input type="hidden" name="bookid" value="{{ $book->id }}">
            <input type="number" name="quantity" class="form-control" id="quantity" aria-describedby="quantity" placeholder="1" min="1" value="1">
            <button type="submit"><i class="fa fa-shopping-bag"></i> ADD TO CART</button>
          </form>

          <ul>
            <li><span>Title</span> {{$book->title}}</li>
            <li><span>Genre</span> {{$book->genre}}</li>
            <li><span>Categorie</span> {{$book->category}}</li>
          </ul>
        </div>
        <div class="col-lg-12">
          <div class="sep"></div>
        </div>
      </div>
    </div>
  </div>
@endsection
