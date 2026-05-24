@extends('layouts.app')

@php
    $title = 'Cursos';
@endphp

@section('slot')
    <div class="space-y-4">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-lg font-semibold text-slate-800">Cursos y Catedraticos</h2>
                <p class="text-sm text-slate-500">{{ $cursos->total() }} cursos registrados</p>
            </div>
            <a href="{{ url('/') }}"
               class="inline-flex items-center gap-2 px-4 py-2 bg-slate-800 text-white
                  text-sm font-medium rounded-lg hover:bg-slate-700 transition-colors">
                Inicio
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="bg-white rounded-xl border border-slate-200 p-4">
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Cursos</p>
                <p class="mt-1 text-2xl font-bold text-slate-800">{{ \App\Models\Curso::count() }}</p>
            </div>
            <div class="bg-white rounded-xl border border-slate-200 p-4">
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Catedraticos</p>
                <p class="mt-1 text-2xl font-bold text-slate-800">{{ \App\Models\Catedratico::count() }}</p>
            </div>
            <div class="bg-white rounded-xl border border-slate-200 p-4">
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Relacion</p>
                <p class="mt-1 text-2xl font-bold text-slate-800">1 a muchos</p>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
            <table class="w-full text-sm">
                <thead>
                <tr class="bg-slate-50 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider border-b border-slate-200">
                    <th class="px-6 py-3">Codigo</th>
                    <th class="px-6 py-3">Curso</th>
                    <th class="px-6 py-3">Catedratico</th>
                    <th class="px-6 py-3">Creditos</th>
                    <th class="px-6 py-3">Ciclo</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                @forelse ($cursos as $curso)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4">
                            <span class="font-mono text-xs bg-slate-100 text-slate-600 px-2 py-1 rounded">
                                {{ $curso->codigo }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <p class="font-medium text-slate-700">{{ $curso->nombre }}</p>
                            <p class="text-xs text-slate-400 max-w-md truncate">{{ $curso->descripcion }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="font-medium text-slate-700">{{ $curso->catedratico->nombre_completo }}</p>
                            <p class="text-xs text-slate-400">{{ $curso->catedratico->email }}</p>
                        </td>
                        <td class="px-6 py-4 text-slate-500">{{ $curso->creditos }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex px-2.5 py-0.5 rounded-full text-xs font-medium bg-sky-50 text-sky-700">
                                {{ ucfirst($curso->ciclo) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-14 text-center text-slate-400">
                            No hay cursos registrados.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            @if ($cursos->hasPages())
                <div class="px-6 py-4 border-t border-slate-100">
                    {{ $cursos->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
