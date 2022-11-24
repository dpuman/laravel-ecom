@extends('master')
@section('title')
    Home
@endsection
@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row shadow">
                <div class="card">
                    <div class="card-header"><h1 class="bg-dark text-white text-center fw-bold">Categories</h1></div>
                    <div class="row p-3">
                        @foreach($categories as $cat)
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="{{asset($cat->image)}}" alt="" class="card-img-top" height="300">
                                    <div class="card-body">
                                        <h2>{{$cat->name}}</h2>
                                        <p class="text-secondary">{{$cat->description}}</p>
                                        <a href="{{route('categoryProducts',['id'=>$cat->id])}}" class="btn btn-success px-4">Show products</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row mt-5 shadow">
                <div class="card">
                    <div class="card-header"><h1 class="bg-dark text-white text-center fw-bold">Brands</h1></div>
                    <div class="row p-3">
                        @foreach($brands as $brand)
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="{{asset($brand->image)}}" alt="" class="card-img-top" height="300">
                                    <div class="card-body">
                                        <h2>{{$brand->name}}</h2>
                                        <p class="text-secondary">{{$brand->description}}</p>
                                        <a href="{{route('brandProducts',['id'=>$brand->id])}}" class="btn btn-success px-4">Show products</a>
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
