<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminFormRequest;
use App\Models\Address;
use App\Models\Assinante;
use App\Services\RequestCreator;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $assinantes = Assinante::all();
        $requestsCustomer = \App\Models\Request::all();
        $mensagem = $request->session()->get('mensagem');
        return view('admin.index', compact('assinantes', 'mensagem', 'requestsCustomer'));
    }

    public function storeRequest(AdminFormRequest $request, RequestCreator $requestCreator)
    {
        $requestCreator->createRequest(
            $request->description,
            $request->name,
            $request->email,
            $request->cep,
            $request->address_street,
            $request->city,
            $request->district,
            $request->address_number,
            $request->address_complement
        );

        return redirect()->back()->with('mensagem', 'Solicitação registrada com sucesso!');

    }

    public function destroyRequest(Request $request)
    {
        $reqCustomer = \App\Models\Request::find($request->id);
        $reqCustomer->customers->addresses->each(function (Address $address){
            $address->delete();
        });

        $reqCustomer->customers->delete();
        $reqCustomer->delete();

        return redirect()->back()->with('mensagem', "Solicitação com ID $request->id removida com sucesso!");

    }

    public function editRequest(Request $request)
    {

        $currentRequest = \App\Models\Request::find($request->id);
        $currentRequest->customers->addresses->toQuery()->update([
            'cidade' => $request->cidade,
            'bairro' => $request->bairro,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'complemento' => $request->complemento,
            'cep' => $request->cep,
        ]);
        $currentRequest->customers->update([
            'nome' => $request->nome,
            'email' => $request->email
        ]);
        $currentRequest->update([
            'descricao' => $request->descricao
        ]);



    }
}
