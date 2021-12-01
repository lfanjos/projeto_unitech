<?php


namespace App\Http\Controllers;


use App\Http\Requests\ContactFormRequest;
use App\Mail\HomeContactForm;
use App\Models\Assinante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ClientsController extends Controller
{
    public function index(Request $request)
    {
        $mensagem = $request->session()->get('mensagem');
        $mensagemNews = $request->session()->get('mensagem-news');

        return view('public.index', compact('mensagem', 'mensagemNews'));
    }

    public function mail(ContactFormRequest $request)
    {

        //return new HomeContactForm($request, new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')));
           Mail::send(new HomeContactForm($request, new \DateTime('now', new \DateTimeZone('America/Sao_Paulo'))));
           $request->session()->flash('mensagem', 'Mensagem enviada com sucesso, obrigado!');

        return redirect('/#contact');
    }

    public function newsletter(Request $request)
    {
        $assinante = Assinante::create($request->all());
        $request->session()->flash('mensagem-news', 'Parábens! Você agora é nosso assinante.');

        return redirect('/#footer');

    }

}
