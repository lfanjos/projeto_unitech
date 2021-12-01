@extends('public')

@section('title')
    UniTech Manutenções - Área Restrita
@endsection

@section('img-intro')

    <img src="{{ asset('img/undraw_Safe_re_kiil.svg') }}" alt="" class="img-fluid" style="height: 300px">
@endsection

@section('intro')
    <h2>Área Restrita</h2>
    <div>
        <p style="color: #e7e7e7">Área reservada para registro e visualização de pedidos e clientes.</p>
    </div>
@endsection

@section('content')

    <div class="container mt-3 noPrint">
        <h2>Registro de Pedido</h2>
        <div class="row mb-5">
            <form action="/restrito/salvar-pedido" method="post" class="col col-6">
                @csrf
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome Completo" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="cliente@exemplo.com.br" required>
                </div>
                <div class="form-row align-items-center">
                    <div class="form-group col-md-5">
                        <label for="cep">CEP</label>
                        <input type="text" class="form-control" name="cep" id="cep" placeholder="99999-999" required>
                        <span class="text-danger" id="cep-error" hidden>CEP inválido</span>
                    </div>
                    <span>* Preenchimento automático dos campos</span>
                </div>
                <div class="form-row align-items-center">
                    <div class="form-group col-md-4">
                        <label for="state">Estado</label>
                        <input type="text" class="form-control" name="state" id="state" readonly required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="city">Cidade</label>
                        <input type="text" class="form-control" name="city" id="city" readonly required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="district">Bairro</label>
                        <input type="text" class="form-control" name="district" id="district" readonly required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-7">
                        <label for="address_street">Rua</label>
                        <input type="text" class="form-control" name="address_street" id="address_street" readonly required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="address_complement">Complemento</label>
                        <input type="text" class="form-control" name="address_complement" id="address_complement">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="address_number">No</label>
                        <input type="text" class="form-control" name="address_number" id="address_number" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea name="description" id="description" class="form-control" cols="30" rows="5" style="resize: none" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Registrar Pedido</button>
            </form>
            <div class="col col-6 d-flex flex-column justify-content-center">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach (array_unique($errors->all()) as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(!empty($mensagem))
                    <div class="alert alert-success">
                        {{ $mensagem }}
                    </div>
                @endif


                <img src="{{ asset('img/undraw_Wall_post_re_y78d.svg') }}" alt="" style="max-width: 100%">
            </div>
        </div>
        <h2>Solicitações Feitas</h2>
        <table class="table table-striped  table-hover mt-3">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Cliente</th>
                <th scope="col">Endereço</th>
                <th scope="col">Descrição</th>

            </tr>
            </thead>
            <tbody>
            @foreach($requestsCustomer as $req)
                <tr class="clickable-row" data-toggle="modal" data-target="#modal{{$req->id}}" style="cursor: pointer">
                    <th scope="row">{{ $req->id }}</th>
                    <td id="table-nome-{{ $req->id }}">{{ $req->customers->nome }}</td>
                    <td id="table-rua-{{ $req->id }}">{{ $req->customers->addresses->first()->rua }}</td>
                    <td  class="d-inline-block text-truncate d-flex justify-content-between" style="max-width: 250px; min-width: 100%;">
                        <div class="description-short text-truncate" id="table-descricao-{{ $req->id }}" style="max-width: 90%">
                            {{ $req->descricao }}
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
        <h2>Assinantes Newsletter</h2>
        <table class="table table-striped mt-3">
            <thead>

            <tr>
                <th scope="col">ID</th>
                <th scope="col">Email</th>

            </tr>

            </thead>
            <tbody>
            @foreach($assinantes as $assinante)
                <tr>
                    <th scope="row">{{ $assinante->id }}</th>
                    <td>{{ $assinante->email }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@foreach($requestsCustomer as $req)
    <div class="modal fade" id="modal{{ $req->id }}" tabindex="-1" role="dialog" aria-labelledby="descriptionModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header noPrint">
                    <h5 style="line-height: 1.5; margin: 0;">{{ $req->id }}:&nbsp; </h5><h5 class="modal-title m-0" id="modal-title-{{$req->id}}"> {{ $req->customers->nome }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body printable">
                    <strong>Dados do Solicitante</strong>

                    <br>
                    <br>

                    <strong>Nome Completo:</strong>
                    <div class="data-modal-{{ $req->id }}" id="modal-nome-{{ $req->id }}" style="display: inline;">
                        {{ $req->customers->nome }}
                    </div>
                    <label hidden>
                        <input type="text" id="modal-input-{{ $req->id }}-name" class="form-control" value="{{$req->customers->nome}}">
                    </label>
                    <br>
                    <strong>Email:</strong>
                    <div class="data-modal-{{ $req->id }}" id="modal-email-{{ $req->id }}" style="display: inline;">
                        {{ $req->customers->email }}
                    </div>
                    <label hidden>
                        <input type="text" class="form-control" value="{{$req->customers->email}}">
                    </label>

                    <br>
                    <hr>

                    <strong>Dados de Endereço</strong>

                    <br>
                    <br>

                    <strong>Cidade:</strong>
                    <div class="data-modal-{{ $req->id }}" id="modal-cidade-{{ $req->id }}" style="display: inline;">
                        {{$req->customers->addresses->first()->cidade}}
                    </div>
                    <label hidden>
                        <input type="text" class="form-control" value="{{$req->customers->addresses->first()->cidade}}">
                    </label>
                    <br>
                    <strong>Bairro:</strong>
                    <div class="data-modal-{{ $req->id }}" id="modal-bairro-{{ $req->id }}" style="display: inline;">
                        {{$req->customers->addresses->first()->bairro}}
                    </div>
                    <label hidden>
                        <input type="text" class="form-control" value="{{$req->customers->addresses->first()->bairro}}">
                    </label>
                    <br>
                    <strong>Logradouro:</strong>
                    <div class="data-modal-{{ $req->id }}" id="modal-rua-{{ $req->id }}" style="display: inline;">
                        {{$req->customers->addresses->first()->rua}}, {{ $req->customers->addresses->first()->numero }}
                        @if($req->customers->addresses->first()->complemento) -
                        {{$req->customers->addresses->first()->complemento}} @endif
                    </div>
                    <label hidden>
                        <input type="text" class="form-control" value="{{$req->customers->addresses->first()->rua}}">
                    </label>
                    <label hidden>
                        <input type="text" class="form-control" value="{{ $req->customers->addresses->first()->numero }}">
                    </label>
                    <label hidden>
                        <input type="text" class="form-control" placeholder="Sem Complemento" value="{{ $req->customers->addresses->first()->complemento ? $req->customers->addresses->first()->complemento : '' }}">
                    </label>
                    <br>
                    <strong>CEP:</strong>
                    <div class="data-modal-{{ $req->id }}" id="modal-cep-{{ $req->id }}" style="display: inline;">
                        {{$req->customers->addresses->first()->cep}}
                    </div>
                    <label hidden>
                        <input type="text" class="form-control" value="{{$req->customers->addresses->first()->cep}}">
                    </label>

                    <br>
                    <hr>

                    <strong>Dados do Pedido</strong>

                    <br>
                    <br>

                    <strong>ID:</strong>
                    {{$req->id}}
                    <br>
                    <strong>Data e Hora do Registro:</strong>
                    {{date('d/m/Y - H:i:s', strtotime($req->data_registro))}}
                    <br>
                    <strong>Descrição:</strong>
                    <div class="data-modal-{{ $req->id }}" id="modal-descricao-{{ $req->id }}" style="display: inline;">
                        {{$req->descricao}}</div>
                    <label class="text-description" style="display: block" hidden>
                        <textarea type="text" class="form-control" rows="10">{{$req->descricao}}
                        </textarea>
                    </label>

                </div>
                <div class="modal-footer noPrint">
                    <button type="button" class="btn btn-secondary" id="btnClose" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="btnPrint"
                            onclick="customPrintable('UniTech - Solicitacao {{$req->id}}')">Imprimir
                    </button>
                    @if(\Illuminate\Support\Facades\Auth::user()->username === 'lfanjos')
                    <form id="btnDelete{{$req->id}}" action="/restrito/{{ $req->id }}/remover" method="post" onclick="return confirm('Você confirma a remoção da solicitação com ID: {{ $req->id }}?')">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Remover</button>
                    </form>
                    <button id="btnEdit" class="btn btn-info" onclick="editToggle({{ $req->id }});">Editar</button>
                    <div id="saveEditBtn" hidden>
                        @csrf
                        <button class="btn btn-info" onclick="editRequest({{ $req->id }});">
                            Salvar
                        </button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection
