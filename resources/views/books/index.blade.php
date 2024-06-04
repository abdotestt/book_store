@extends('default')
@section("main")



  <!-- <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Our Shop</h3>
          <span class="breadcrumb"><a href="#">Home</a> > Our Shop</span>
        </div>
      </div>
    </div>
  </div> -->

  <div class="section trending">
    <div class="container">
    <form action="{{ route('books.search') }}" method="GET">
      <input type="text" name="query" placeholder="Search by title or author">
      <button type="submit">Search</button>
    </form>
      <ul class="trending-filter">
        <li>
          <a class="is_active" href="#!" data-filter="*">Show All</a>
        </li>
        <li>
          <a href="#!" data-filter=".adv">Adventure</a>
        </li>
        <li>
          <a href="#!" data-filter=".str">Strategy</a>
        </li>
        <li>
          <a href="#!" data-filter=".rac">Racing</a>
        </li>
      </ul>
      <div class="row trending-box">
        @foreach ($books as $book)
          <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 adv">
            <div class="item">
              <div class="thumb">
                <a href="product-details.html"><img src="../assets/images/{{$book->cover}}" alt=""></a>
                <span class="price"><em>$36</em>$24</span>
              </div>
              <div class="down-content">
                <span class="category">{{$book->category}}</span>
                <h4>{{$book->title}}</h4>
                <a href="product-details.html"><i class="fa fa-shopping-bag"></i></a>
              </div>
            </div>
          </div>
        @endforeach
        
        
      </div>
      <div class="row">
        <div class="col-lg-12">
          <ul class="pagination">
          <li><a href="#"> &lt; </a></li>
            <li><a href="#">1</a></li>
            <li><a class="is_active" href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#"> &gt; </a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection