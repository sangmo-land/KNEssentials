@extends('layouts.app')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Contact Message Details') }}
</h2>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="mb-6">
                    <h3 class="text-2xl font-semibold">{{ $contact->name }}</h3>
                    <p class="text-gray-600 mt-2"><strong>Email:</strong> {{ $contact->email }}</p>
                    <p class="text-gray-600 mt-4"><strong>Message:</strong></p>
                    <p class="text-gray-600 mt-2 whitespace-pre-line">{{ $contact->message }}</p>
                    <p class="text-sm text-gray-500 mt-4">Created at: {{ $contact->created_at->format('m/d/Y H:i') }}
                    </p>
                </div>

                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                </form>

                <div class="mt-6">
                    <a href="{{ route('contacts.index') }}" class="text-blue-600 hover:text-blue-900">Back to Contact
                        Messages</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection