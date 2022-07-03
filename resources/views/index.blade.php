<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News</title>
    <script src="/app/js/bootstrap.js"></script>
    <link href="/app/css/bootstrap.css" rel="stylesheet">
</head>

<body class="container">

    <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">

        <form method="GET" action="{{ route('search-news') }}"
            class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 d-flex">
            <input name="query" type="text" class="form-control" placeholder="Search news..." aria-label="Search">
            <button type="submit" class="btn btn-outline-primary me-2">Search</button>
        </form>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="/" class="nav-link px-2 link-secondary">All News</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Features</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Pricing</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">About</a></li>
        </ul>


        <div class="col-md-3">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block text-end">
                    @auth

                        <button type="button" class="btn btn-outline-primary me-2" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Add News</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add News</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <form class="text-start" method="POST" action="{{ route('news.store') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Author name</label>
                                                <input type="text" value="{{ Auth::user()->name }}"
                                                    class="form-control" name="author" id="recipient-name">
                                            </div>

                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Title</label>
                                                <input type="text" class="form-control" name="title"
                                                    id="recipient-name">
                                            </div>

                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label">Description</label>
                                                <textarea class="form-control" name="description" id="message-text"></textarea>
                                            </div>
                                            <input class="form-control invisible" value="{{ Auth::user()->id }}"
                                                name="user_id">

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Send news</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form type="button" class="btn btn-primary" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    @else
                        <a href="{{ route('login') }}" type="button" class="btn btn-outline-primary me-2">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" type="button" class="btn btn-primary">Sign-up</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </header>

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
            {{ session('status') }}
        </div>
    @endif

    <div id="carouselExampleCaptions" class="carousel slide shadow-lg" data-bs-ride="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner rounded-3 shadow-lg">
            <div class="carousel-item active">
                <img src="https://picsum.photos/640/200" class="d-block w-100" alt="">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Lorem, ipsum dolor.</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, adipisci!</p>
                </div>
            </div>
            <div class="carousel-item rounded-3 shadow-lg">
                <img src="https://www.stevensegallery.com/640/200" class="d-block w-100" alt="">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Lorem ipsum dolor sit.</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium id possimus maiores.</p>
                </div>
            </div>
            <div class="carousel-item rounded-3 shadow-lg">
                <img src="https://placebear.com/640/200" class="d-block w-100" alt="">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Lorem, ipsum dolor.</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo?</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

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

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-danger btn-lg px-4" data-bs-toggle="modal"
                                data-bs-target="#exampleModalDelete">
                                Delete
                            </button>

                            <div class="modal" id="exampleModalDelete" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Deleting news</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this post?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('news.destroy', [$new->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-outline-danger px-4">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

    @extends('./layouts/footer')

</body>

</html>
