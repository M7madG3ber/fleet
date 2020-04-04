@extends('public.account.layout')

@section('title', trans('storefront::account.links.my_wishlist'))

@section('account_breadcrumb')
    <li class="active">{{ trans('storefront::account.links.my_wishlist') }}</li>
@endsection

@section('content_right')
    <div class="index-table">
        @if ($products->isEmpty())
            <h3 class="text-center">{{ trans('storefront::account.wishlist.empty_wishlist') }}</h3>
        @else
            <div class="table-responsive table-wishlist">
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>{{ trans('storefront::account.wishlist.product') }}</th>
                            <th>{{ trans('storefront::account.wishlist.price') }}</th>
                            <th>{{ trans('storefront::account.wishlist.availability') }}</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>
                                    @if (! $product->base_image->exists)
                                        <div class="image-placeholder">
                                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                                        </div>
                                    @else
                                        <div class="image-holder">
                                            <img src="{{ $product->base_image->path }}" alt="{{ $product->name }}">
                                        </div>
                                    @endif
                                </td>

                                <td>
                                    <h5>
                                        <a href="{{ route('products.show', ['slug' => $product->slug]) }}">
                                            {{ $product->name }}
                                        </a>
                                    </h5>
                                </td>

                                <td>
                                    <span class="price">{{ product_price($product) }}</span>
                                </td>

                                <td>
                                    @if ($product->isInStock())
                                        <span class="in-stock">{{ trans('storefront::account.wishlist.in_stock') }}</span>
                                    @else
                                        <span class="out-of-stock">{{ trans('storefront::account.wishlist.out_of_stock') }}</span>
                                    @endif
                                </td>

                                <td>
                                    <form method="POST" action="{{ route('account.wishlist.destroy', $product) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}

                                        <button type="submit" class="btn-close" data-toggle="tooltip" title="{{ trans('storefront::account.wishlist.remove') }}">
                                            &times;
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    @if ($products->isNotEmpty())
        <div class="pull-right">
            {!! $products->links() !!}
        </div>
    @endif
@endsection
