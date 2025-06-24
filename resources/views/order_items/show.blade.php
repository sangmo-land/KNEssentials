@extends('layouts.app')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Order Item Details') }}
</h2>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="mb-6">
                    <h3 class="text-2xl font-semibold">Order Item #{{ $orderItem->id }}</h3>
                    <p class="text-gray-600 mt-2"><strong>Order:</strong> #{{ $orderItem->order_id }}</p>
                    <p class="text-gray-600"><strong>Product:</strong> {{ $orderItem->product->name }}</p>
                    <p class="text-gray-600"><strong>Quantity:</strong> {{ $orderItem->quantity }}</p>
                    <p class="text-gray-600"><strong>Price:</strong> ${{ number_format($orderItem->price, 2) }}</p>
                    <p class="text-gray-600"><strong>Subtotal:</strong> ${{ number_format($orderItem->price *
                        $orderItem->quantity, 2) }}</p>
                    <p class="text-sm text-gray-500 mt-2">Created at: {{ $orderItem->created_at->format('m/d/Y H:i') }}
                    </p>
                </div>

                <div class="flex items-center">
                    <a href="{{ route('order_items.edit', $orderItem->id) }}"
                        class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                    <form action="{{ route('order_items.destroy', $orderItem->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                    </form>
                </div>

                <div class="mt-6">
                    <a href="{{ route('order_items.index') }}" class="text-blue-600 hover:text-blue-900">Back to Order
                        Items</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection