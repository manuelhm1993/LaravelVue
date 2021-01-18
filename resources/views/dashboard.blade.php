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
                    <a href="#" class="btn btn-primary float-right">Nueva tarea</a>
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
                                    <a href="#" class="btn btn-warning btn-sm">Editar</a>
                                </td>
                                <td width="10px">
                                    <a href="#" class="btn btn-danger btn-sm">Eliminar</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
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