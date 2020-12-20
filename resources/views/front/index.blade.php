@extends('front.layout')
    @section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
             @foreach($posts as $post)
                    <div class="case">
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-xl-8 d-flex">
                                <a href="{{route('posts.show', $post->id)}}" class="img w-100 mb-3 mb-md-0 img-thumbnail" style="background-image: url({{asset('images/posts/'.$post->image)}});"></a>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-4 d-flex">
                                <div class="text w-100 pl-md-3">
                                    <span class="subheading">{{$post->category->name}}</span>
                                    <h2><a href="{{route('posts.show', $post->id)}}">{{ $post->title }}</a></h2>
                                    <p>{{ $post->description }}</p>
                                    <div class="meta">
                                        <p class="mb-0">{{ $post->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
             @endforeach
                </div>
            </div>
            <div class="row mt-5 align-items-md-center">
                {!! $posts->links() !!}
        </div>
    </section>
@endsection

