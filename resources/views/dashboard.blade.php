@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="pb-2 mt-4 mb-2 border-bottom">CRUD Laravel y Vue.js</h1>
        </div>
    </div>

    {{-- Pueden existir múltiples zonas con componentes Vue en la misma vista o app --}}
    <div id="crud" class="row">
        <div class="col-7">
            <div class="row">
                <div class="col-12">
                    {{-- Dispara el modal --}}
                    <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#create">
                        Nueva tarea
                    </a>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tarea</th>
                                <th scope="col" colspan="2">&nbsp;</th>
                            </tr>
                        </thead>
        
                        <tbody>
                            <tr v-for="keep in keeps">
                                <td width="10px">@{{ keep.id }}</td>
                                <td>@{{ keep.keep }}</td>
                                <td width="10px">
                                    {{-- El modal se mostrará manualmente para pasar el keep por parámetro --}}
                                    <a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="editKeep(keep)">
                                        Editar
                                    </a>
                                </td>
                                <td width="10px">
                                    {{-- 
                                        1. Poner a la escucha del click al botón
                                        2. Prevenir su comportamiento por defecto para que no recargue la página
                                        3. Llamar al método deleteKeep pasando el keep de cada iteración
                                    --}}
                                    <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="deleteKeep(keep)">Eliminar</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <nav>
                <ul class="pagination">
                    {{-- Mostrar sólo si no es la primera página --}}
                    <li class="page-item" v-if="pagination.currentPage > 1">
                        {{-- Ir a la página anterior --}}
                        <a class="page-link" href="#" @click.prevent="changePage(pagination.currentPage - 1)">
                            Atrás
                        </a>
                    </li>
                    
                    <li class="page-item" v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']">
                        <a class="page-link" href="#" @click.prevent="changePage(page)">
                            @{{ page }}
                        </a>
                    </li>
                    
                    {{-- Mostrar sólo si no es la última página --}}
                    <li class="page-item" v-if="pagination.currentPage < pagination.lastPage">
                        {{-- Ir a la página siguiente --}}
                        <a class="page-link" href="#" @click.prevent="changePage(pagination.currentPage + 1)">
                            Siguiente
                        </a>
                    </li>
                </ul>
            </nav>

            @include('tasks.create')
            @include('tasks.edit')
        </div>

        <div class="col-5">
            <pre class="bg-ligth border">
                <code>
                    @{{ $data }}
                </code>
            </pre>
        </div>
    </div>
@endsection