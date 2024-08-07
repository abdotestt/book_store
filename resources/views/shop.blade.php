@extends('default')
@section("main")



  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Our Shop</h3>
          <span class="breadcrumb"><a href="#">Home</a> > Our Shop</span>
        </div>
      </div>
    </div>
  </div>

  <div class="section trending">
    <div class="container">
    
      <div class="row trending-box">
        @foreach ($cartItems as $book)
        
       
        <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 adv">
          <div class="item">
            <div class="thumb">
              <a href="product-details.html"><img src="assets/images/trending-01.jpg" alt=""></a>
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
    
    </div>
  </div>
@endsection