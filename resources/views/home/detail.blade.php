@extends('master')
@section('title')
    Create Category
@endsection
@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header">Product Detail Information</div>
                        <p class="text-success">{{Session::get('message')}}</p>

                        <div class="card-body">
                            <table class="table table-striped table-hover table-bordered">
                                <tr>
                                    <th>Product Id</th>
                                    <td>{{$product->id}}</td>
                                </tr>
                                <tr>
                                    <th>Product Category</th>
                                    <td>{{$product->category->name}}</td>
                                </tr>
                                <tr>
                                    <th>Product Brand</th>
                                    <td>{{$product->brand->name}}</td>
                                </tr>
                                <tr>
                                    <th>Product Title</th>
                                    <td>{{$product->title}}</td>
                                </tr>

                                <tr>
                                    <th>Product Description</th>
                                    <td>{{$product->description}}</td>
                                </tr>
                                <tr>
                                    <th>Product Code</th>
                                    <td>{{$product->code}}</td>
                                </tr>

                                <tr>
                                    <th>Blog Image</th>
                                    <td>
                                        <img src="{{asset($product->image)}}" alt="" height="100" width="100">

                                    </td>
                                </tr>



                            </table>
                        </div>



                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
