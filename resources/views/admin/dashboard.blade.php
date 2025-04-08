@extends('layouts.admin')

@section('title', 'Dashboard '.Auth::user()->role)

@section('content')
    <div class="container mx-auto">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <p class="text-gray-700">Welcome to your application dashboard!</p>
        </div>
    </div>
@endsection
