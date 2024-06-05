@extends("default")
@section("main")


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a new Book</div>

                <div class="card-body">
                <form action="{{ route('books.update', ['book' => $book->id]) }}" method="POST">
                    @csrf
        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" value="{{$book->title}}" name="title" required>
                        </div>

                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control" id="author" value="{{$book->author}}" name="author" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" value="{{$book->description}}" name="description" rows="3" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="genre">Genre</label>
                            <input type="text" class="form-control" id="genre" value="{{$book->genre}}" name="genre" required>
                        </div>

                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" class="form-control" id="category" value="{{$book->category}}" name="category" required>
                        </div>

                        <div class="form-group">
                            <label for="cover">Cover URL</label>
                            <input type="text" class="form-control" id="cover" value="{{$book->cover}}" name="cover">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection