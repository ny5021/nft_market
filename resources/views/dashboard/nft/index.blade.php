@extends('layouts.dasboard')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa fa-check-circle-o me-2" aria-hidden="true"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">

                    <i class="fa fa-frown-o me-2" aria-hidden="true"></i>Oh Erreur! {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endforeach
        @endif

        <div class="container mt-5">
            <h1>Liste des Nfts</h1>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createNFTModal">
                Créer un nouveau NFT
            </button>

            <table id="userTable" class="table table-striped table-bordered mt-3">
                <thead>
                    <tr>
                        <th>title</th>
                        <th>artiste</th>
                        <th>proprietaire</th>
                        <th>price</th>
                        <th>categorie</th>
                        <th>status</th>
                        <th>image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nfts as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->artiste }}</td>
                            <td>{{ isset($item->owner->name) ? $item->owner->name : 'pas de propriétaire' }}</td>
                            <td>{{ number_format($item->price, 2) }} Eth</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->for_sale ? 'A vendre' : 'vendu' }}</td>
                            <td><img src="{{ asset($item->image) }}" height="100" width="100" /></td>
                            <td>
                                @if (!isset($item->owner->name))
                                    <!-- Button trigger modal -->
                                    <a href="#" class="btn btn-danger fs-14 text-white edit-icn"
                                        data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $item->id }}"
                                        title="Supprimer">
                                        <i class="fe fe-trash-2 fe-pen" title="Supprimer"></i>
                                        Supprimer
                                    </a>
                                @endif
                            </td>
                            <!-- Modal Confirmation de suppression de l'élément -->
                            <div class="modal fade" id="confirmDeleteModal{{ $item->id }}" tabindex="-1"
                                aria-labelledby="confirmDeleteModalLabel{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmDeleteModalLabel{{ $item->id }}">
                                                Confirmation de la
                                                suppression
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Fermer"></button>
                                        </div>
                                        <div class="modal-body">
                                            Êtes-vous sûr de vouloir supprimer cet élément ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Annuler</button>
                                            <form action="{{ route('nfts.delete', ['id' => $item->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <!-- Modal pour la création d'un nouveau NFT -->
    <div class="modal fade" id="createNFTModal" tabindex="-1" aria-labelledby="createNFTModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createNFTModalLabel">Créer un nouveau NFT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('nfts.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Titre :</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ old('title') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="artiste" class="form-label">Artiste :</label>
                            <input type="text" class="form-control" id="artiste" name="artiste"
                                value="{{ old('artiste') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description :</label>
                            <textarea class="form-control" id="description" name="description" required>{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="adresse" class="form-label">Adresse :</label>
                            <input type="text" class="form-control" id="adresse" name="adresse"
                                value="{{ old('adresse') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="token_standard" class="form-label">Standard du token :</label>
                            <select class="form-control" id="token_standard" name="token_standard" required>
                                <option value="ERC-721" {{ old('token_standard') === 'ERC-721' ? 'selected' : '' }}>
                                    ERC-721</option>
                                <option value="ERC-1155" {{ old('token_standard') === 'ERC-1155' ? 'selected' : '' }}>
                                    ERC-1155</option>
                                <option value="ERC-998" {{ old('token_standard') === 'ERC-998' ? 'selected' : '' }}>
                                    ERC-998</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Prix (en Eth) :</label>
                            <input type="number" class="form-control" id="price" name="price"
                                value="{{ old('price') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image :</label>
                            <input type="file" class="form-control-file" id="image" name="image"
                                accept="image/*" required>
                        </div>


                        <div class="mb-3">
                            <label for="proprietaire" class="form-label">Propriétaire :</label>
                            <select class="form-control" id="pro" name="proprietaire_id" required>
                                @foreach ($users as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Category :</label>
                            <select class="form-control" id="category" name="category_id" required>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Créer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
