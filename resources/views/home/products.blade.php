@extends('master')
@section('title')
    Home
@endsection
@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row shadow">
                <div class="card">
                    <div class="card-header"><h1 class="bg-dark text-white text-center fw-bold">Products</h1></div>
                    <div class="row p-3">
                        @foreach($products as $prod)
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="{{asset($prod->image)}}" alt="" class="card-img-top" height="300">
                                    <div class="card-body">
                                        <h2>{{$prod->title}}</h2>
                                        <p class="text-secondary">{{$prod->description}}</p>
                                        <a href="{{route('product.details',['id'=>$prod->id])}}" class="btn btn-success px-4">Show products</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection
