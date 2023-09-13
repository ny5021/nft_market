@extends('layouts.dasboard')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
        </div>

        <div class="container mt-5">
            <h1>Liste des Utilisateurs</h1>
            <table id="userTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Portefeuille</th>
                        <th>Nombre Nft achetés</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $item->email }}</td>
                            <td>{{ number_format($item->portefeuille, 2) }} Eth</td>
                            <td>{{ $item->nft->count() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
