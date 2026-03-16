@extends('layouts.app')
@section('content')
<div class="max-w-4xl mx-auto py-20 px-6">
    <img src="{{ asset('storage/' . $data->foto) }}" class="w-full h-96 object-cover rounded-3xl mb-10">
    <h1 class="text-4xl font-black text-gray-900 mb-6 uppercase">{{ $data->nama_lembaga }}</h1>
    <div class="prose max-w-none text-gray-600 leading-relaxed">
        {!! $data->konten_detail !!}
    </div>
</div>
@endsection