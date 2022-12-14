@extends("layouts.blog")
@section("title")
    Hyper App Labs
@endsection

@section("header")
    <!-- Header -->
    <header class="header text-center text-white"
            style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
        <div class="container">

            <div class="row">
                <div class="col-md-8 mx-auto">

                    <h1>Welcome to Hyper App Labs</h1>
                    <p class="lead-2 opacity-90 mt-6">
                        Read and get updates on software development.
                    </p>

                </div>
            </div>

        </div>
    </header><!-- /.header -->
@endsection

@section("content")
    <!-- Main Content -->
    <main class="main-content">
        <div class="section bg-gray">
            <div class="container">
                <div class="row">


                    <div class="col-md-8 col-xl-9">
                        <div class="row gap-y">
                            @foreach($posts as $post)
                                @if($post)
                                    <div class="col-md-6">
                                        <div class="card border hover-shadow-6 mb-6 d-block">
                                            <img class="card-img-top" src="{{ asset("storage/{$post->image}") }}"
                                                 alt="post image cap">
                                            <div class="p-6 text-center">
                                                <p>
                                                    <a class="small-5 text-lighter text-uppercase ls-2 fw-400"
                                                       href="">
                                                        {{ $post->category->name }}
                                                    </a>
                                                </p>
                                                <h5 class="mb-0">
                                                    <a class="text-dark" href="{{ route("blog-post.show", $post->id) }}">
                                                        {{ \Illuminate\Support\Str::limit($post->title, 35) }}
                                                    </a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    No Posts
                                @endif
                            @endforeach
                        </div>
                    </div>


                    <div class="col-md-4 col-xl-3">
                        <div class="sidebar px-4 py-md-0">
                            <h6 class="sidebar-title">Search</h6>
                            <form class="input-group" target="#" method="GET">
                                <input type="text" class="form-control" name="client-search" placeholder="Search">
                            </form>
                            <hr/>
                            <h6 class="sidebar-title">About</h6>
                            <p class="small-3">
                                <img src="{{ asset("img/bio.jpg") }}" alt="bio">
                                {{ $bio->bio }}
                            </p>
                            <hr/>
                            <h6 class="sidebar-title">Categories</h6>
                            <div class="row link-color-default fs-14 lh-24">
                                @foreach($categories as $category)
                                    <div class="col-6"><a href="#">
                                            {{ $category->name }}
                                        </a></div>
                                @endforeach
                            </div>
                            <hr>
                            <h6 class="sidebar-title">Top posts</h6>
                            <a class="media text-default align-items-center mb-5" href="blog-single.html">
                                <img class="rounded w-65px mr-4" src="../assets/img/thumb/4.jpg">
                                <p class="media-body small-2 lh-4 mb-0">Thank to Maryam for joining our team</p>
                            </a>
                            <hr>
                            <h6 class="sidebar-title">Tags</h6>
                            <div class="gap-multiline-items-1">
                                @foreach($tags as $tag)
                                    <a class="badge badge-secondary" href="#">
                                        {{ $tag->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
