@extends('admin.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-s12">
                <table>
                    <thead>
                        <tr>
                            <th>{{ __('product.id') }}</th>
                            <th>{{ __('product.product_name') }}</th>
                            <th>{{ __('product.code') }}</th>
                            <th>{{ __('product.price') }}</th>
                            <th>{{ __('product.status') }}</th>
                            <th>{{ __('product.image') }}</th>
                            <th>{{ __('product.category_id') }}</th>
                            <th>{{ __('product.size') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr class="row_{{ $product->id }}">
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->code }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->status == config('products.available') ? __('product.in_stock') : __('product.out_stock') }}</td>
                            <td><img src="{{ asset('/image/'. $product->image) }}" alt="" height="70px;" width="70px;"></td>
                            <td>{{ $product->category_id }}</td>
                            <td>{{ $product->sizes->implode('size_name', ',') }}</td>
                            <td><a class="waves-effect waves-light btn-small" href="{{ route('products.edit', ['product' => $product->id]) }}"><i class="material-icons right">edit</i>{{ __('product.edit') }}</a>
                                <a class="waves-effect waves-light btn-small brown del-product" data-product-id="{{ $product->id }}"><i class="material-icons right">delete</i>{{ __('product.delete') }}</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('js/del-product.js') }}"></script>
@endsection
