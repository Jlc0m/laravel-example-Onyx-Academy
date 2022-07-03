@extends('./layouts/layout')

@section('title_page')
    Update News
@endsection


@section('main_content')

@foreach ($news as $new)
        <div class="container my-5">
            <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
                <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                    <h1 class="display-4 fw-bold lh-1">{{ $new->title }}</h1>
                    <hr class="col-lg-2 mi-2">
                    <h6>Author news - "{{ $new->author }}"</h6>
                    <hr class="col-lg-1 mi-0">
                    <h6>Date added - {{ $new->created_at }}</h6>
                    <hr class="col-lg-5 mi-1">
                    <p class="lead">{{ $new->description }}</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-lg-3">

                        @can('update-user_news', $new)
                            <a href="{{ route('news.edit', [$new->id]) }}" type="button"
                                class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">Edit</a>

                            <form action="{{ route('news.destroy', [$new->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-outline-danger btn-lg px-4">Delete</button>
                            </form>
                        @else
                        @endcan
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
                    <img class="rounded" src="https://picsum.photos/400/400" alt="" width="720"
                        height="400">
                </div>
            </div>
        </div>
    @endforeach

@endsection
