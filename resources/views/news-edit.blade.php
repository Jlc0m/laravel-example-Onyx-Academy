@extends('./layouts/layout')

@section('title_page')
    Update News
@endsection


@section('main_content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif

<form method="POST" action="{{route('news.update', $news->id)}}">
    @csrf
    @method('PUT')

<div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
      <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">

        <div class="mb-3">
            <label class="col-form-label">Title</label>
            <input type="text" value="{{$news->title}}" class="form-control" name="title">
          </div>

        <hr class="col-lg-2 mi-2">

        <div class="mb-3">
            <label class="col-form-label">Author name</label>
            <input type="text" value="{{ $news->author }}" class="form-control" name="author">
        </div>

        <hr class="col-lg-1 mi-0">

        <h6 class="text-small">Date added - {{$news->created_at}}</h6>

        <hr class="col-lg-5 mi-0">

        <div class="mb-3">
        <label for="message-text" class="col-form-label">Description</label>
        <textarea class="form-control rounded-3" name="description" id="" cols="50" rows="10">
            {{$news->description}}
        </textarea>
        <input class="form-control invisible" value="{{ Auth::user()->id }}" name="user_id">
        </div>
        
        <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-lg-3">

          @can ('update-user_news', $news)
          <button type="submit" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">Edit</button>
          @else
          
          @endcan

        </div>
      </div>
      <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
          <img class="rounded" src="https://picsum.photos/400/400" alt="" width="720" height="400">
      </div>
    </div>
  </div>
</form>

  
  
@endsection

