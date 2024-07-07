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
    <!-- resources/views/search.blade.php -->
    <!-- <div class="main-banner">-->
      <div class="container"> 
        <div class="row">
          <div class="col-lg-6 align-self-center">
            <div class="caption header-text">
              <div class="search-input text-center mb-3">
                  <form action="{{ route('books.search') }}" class="mf" method="POST">
                  @csrf
                      <input type="text" class="minp" placeholder="Type Author or Title" id="searchText" name="query" />
                      <button type="submit" class="btnn">Search Now</button>
                  </form>
              </div>
            </div>
          </div>
       </div> 
      </div>
     <!-- </div> -->

    @if(Auth::check() && Auth::user()->isAdmin())
    <div class="main-button">
        <a href="{{ route('books.create') }}">Add Book</a>
    </div>
@endif
    
      <!-- <ul class="trending-filter">
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
      </ul> -->
      <div class="row trending-box">
        @foreach ($books as $book)
          <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 adv">
            <div class="item">
              <div class="thumb">
                <a href="product-details.html"><img src="../assets/images/{{$book->cover}}" alt=""></a>
                <span class="price"><em>$36</em>$24</span>
              </div>
              <b class="down-content">
                <span class="category">{{$book->category}}</span>
                <h4 class="ml-3">{{$book->title}}</h4>
                <a href="{{ route('books.show', $book->id) }}"><i class="fa fa-shopping-bag"></i></a><br>
              
              
              </b>
              @if(Auth::check() && Auth::user()->isAdmin())
              <div class="mb-3">
                  <a href="{{ route('books.edit', ['book' => $book]) }}"  style="border-radius:20px;margin-left:20px">Update</a>
                  <form action="{{ route('books.destroy', ['book' => $book->id]) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" style="border-radius:20px;background-color:red;margin-left:20px">Delete</button>
                  </form>             
                </div>
              @endif
             
             
            </div>
          </div>
        @endforeach
        
        
      </div>
      <!-- <div class="row">
        <div class="col-lg-12">
          <ul class="pagination">
          <li><a href="#"> &lt; </a></li>
            <li><a href="#">1</a></li>
            <li><a class="is_active" href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#"> &gt; </a></li>
          </ul>
        </div>
      </div> -->
    </div>
  </div>
@endsection