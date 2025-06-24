@extends('layouts.app')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Admin Details') }}
</h2>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="mb-4">
                    <h3 class="text-lg font-semibold">{{ $admin->name }}</h3>
                    <p class="text-gray-600">{{ $admin->email }}</p>
                    <p class="text-sm text-gray-500 mt-2">Created at: {{ $admin->created_at->format('m/d/Y H:i') }}</p>
                </div>

                <div class="flex items-center">
                    <a href="{{ route('admins.edit', $admin->id) }}"
                        class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                    <form action="{{ route('admins.destroy', $admin->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                    </form>
                </div>

                <div class="mt-6">
                    <a href="{{ route('admins.index') }}" class="text-blue-600 hover:text-blue-900">Back to Admins</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection