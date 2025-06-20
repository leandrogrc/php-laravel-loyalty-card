@extends('partials.layout')
@section('title', 'Estabelecimentos')

@section('content')

@if(session('success'))
<div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded flex justify-between items-center">
    <p>{{ session('success') }}</p>
    <button type="button" onclick="this.parentElement.remove()" class="ml-4 text-green-700 hover:text-green-900">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
    </button>
</div>
@endif

<div class="min-h-screen bg-gray-50 p-6">
    <div class="max-w-7xl mx-auto">
        <!-- Cabeçalho -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <a href="{{ route('dashboard') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Voltar para dashboard
                </a>
                <h1 class="text-2xl font-bold text-gray-800 mt-2">Lista de Estabelecimentos</h1>
                <p class="text-sm text-gray-600">Gerencie seus estabelecimentos cadastrados</p>
            </div>
            <a href="{{ route('establishments.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Novo Estabelecimento
            </a>
        </div>

        <!-- Lista de Estabelecimentos -->
        @if($establishments->isEmpty())
        <div class="bg-white rounded-lg shadow p-8 text-center">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
            </svg>
            <h3 class="mt-2 text-lg font-medium text-gray-900">Nenhum estabelecimento cadastrado</h3>
            <p class="mt-1 text-gray-500">Comece cadastrando seu primeiro estabelecimento.</p>
            <div class="mt-6">
                <a href="{{ route('establishments.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                    Adicionar Estabelecimento
                </a>
            </div>
        </div>
        @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($establishments as $establishment)
            <a href="{{ route('establishments.show', $establishment->id) }}" class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition transform hover:-translate-y-1">
                <div class="p-6">
                    <div class="flex justify-between items-start">
                        <h3 class="text-xl font-semibold text-gray-800 truncate">{{ $establishment->establishment_name }}</h3>
                        <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Ativo</span>
                    </div>

                    <div class="mt-4 space-y-2 text-gray-600">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="truncate">
                                {{ $establishment->address ?? 'Endereço não informado' }},
                                {{ $establishment->number ?? 'S/N' }}
                            </span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>
                                {{ $establishment->city ?? 'Cidade não informada' }} -
                                {{ $establishment->state ?? 'UF não informada' }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="px-6 py-3 bg-gray-50 text-right text-sm text-gray-500">
                    Cadastrado em: {{ $establishment->created_at->format('d/m/Y') }}
                </div>
            </a>
            @endforeach
        </div>
        @endif
    </div>
</div>
@endsection