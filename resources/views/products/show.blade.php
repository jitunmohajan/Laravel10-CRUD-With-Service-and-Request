@extends('layouts.app')

@section('main')

    <div class="container">
        <div class="row justify-content-center mt-2">
            <div class="col-sm-8">
                <div class="card p-2">
                    <label>Name: <strong>{{ $product->name }}</strong></label>
                    <label>Description: <strong>{{ $product->description }}</strong></label>
                    <img src="/products/{{ $product->image }}" width="100%">
                </div>
            </div>
        </div>
    </div>
    
@endsection