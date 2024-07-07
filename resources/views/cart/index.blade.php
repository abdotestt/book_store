@extends('default')
@section('main')
<div class="main-banner">
    <div class="container">
      <div class="row">
                    <div class="">


            <div class="text-center">
            <h1 class="text-center mb-3"
                    style="
                        font-family: Arial, sans-serif;
                        color: #fff;
                        text-shadow: 0 1px 0 #ccc,
                                    0 2px 0 #c9c9c9,
                                    0 3px 0 #bbb,
                                    0 4px 0 #b9b9b9,
                                    0 5px 0 #aaa,
                                    0 6px 1px rgba(0,0,0,.1),
                                    0 0 5px rgba(0,0,0,.1),
                                    0 1px 3px rgba(0,0,0,.3),
                                    0 3px 5px rgba(0,0,0,.2),
                                    0 5px 10px rgba(0,0,0,.25),
                                    0 10px 10px rgba(0,0,0,.2),
                                    0 20px 20px rgba(0,0,0,.15);
                        animation: float 3s ease-in-out infinite;
                        background: linear-gradient(45deg, #ff6b6b, #f0e130);
                        padding: 20px;
                        border-radius: 10px;
                        display: inline-block;
                    ">
                    {{ $user->name }}'s Cart
                </h1></div>
                @if($user->carts->isEmpty())
                    <p>No books in the cart.</p>
                @else

                <table class="table table-bordered ">
                    <tr>
                        <th>Title of book </th>
                        <th>author</th>
                        <th>quantity</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($user->carts as $cart)
                    <tr>
                        <td>{{ $cart->book->title }}</td>
                        <td>{{ $cart->book->author }}</td>
                        <td>{{ $cart->qte }}</td>
                        <td>
                            <a href="{{ route('carts.edit', $cart->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('carts.destroy', $cart->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
                @endif
        </div>
        
      </div>
    </div>
  </div>


@endsection