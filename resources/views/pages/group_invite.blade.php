@extends('layouts.app')

@section('content')

<div class="container d-flex flex-column">
    <div class="display-5 text-center my-2">
        Invite to Group
    </div>

    @foreach ($friends as $friend)
        <div class="row d-flex justify-content-center">
            <img src="{{asset($friend->photo)}}" class="card-img-top col-lg-2" alt="...">
            <div class="card no-padding mt-3 col-12 col-lg-7 " id="request_0">
                <div class="card-body d-flex justify-content-between">
                    <p class="card-text my-auto fs-4"><a href="/user/{{$friend->id}}">{{$friend->username}}</a> </p>
                    <p class="card-text my-auto fs-4"> {{$friend->name}}</p>
                    
                    {{-- TODO: AQUI A CARD DESAPARECE DEPOIS DE CONVIDAR, NAO SEI SE FICA MELHOR ASSIM,
                         OU SIMPLESMENTE SUBTITUIR O BOTAO POR ALGO A DIZER "INVITED", E SO SE REMOVE
                         A CARD CASO ELE JA FAÇA PARTE DO GRUPO. 
                         ISTO FACILITA PARA CASO QUEIRAMOS CANCELAR O PEDIDO
                         --}}
                    <div class="d-flex ">
                        <form class="my-auto" action="">
                            <button class="btn btn-primary ms-3 request_button my-auto mr-5 " id="request_0_accept">Invite</button>
                        </form>
                    
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    
</div>

@endsection