@extends("templates.app")

@section("body")
    
    <x-jet-validation-errors class="mb-4" />
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif
    <div class="container">
        <div class="row" style="padding-top: 50px">
            <div class="col">
                <img class="logo" src="{{asset("images/logo-ufape.png")}}">
            </div>
            <div class="col form-card">
                <h2 style="text-align: center">Entrar</h2>
                <hr style="margin-right: 60px; margin-left: 60px;" >
                <form class="form-content" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3" style="text-align: center">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" name="email" class="form-control input-modal-create" type="text" placeholder="Digite seu email" >
                    </div>

                    <div class="mb-3" style="text-align: center">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" name="password" class="form-control input-modal-create" type="password" placeholder="Digite sua senha" >
                    </div>

                    <div class="row">
                        <div class="block mt-4 col">
                            <label for="remember_me" class="flex items-center">
                                <x-jet-checkbox id="remember_me" name="remember" />
                                <span class="ml-2 text-sm text-gray-600">Lembre-se de mim</span>
                            </label>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary submit-button" style="margin-top: 30px; width: 100%">Entrar</button>
                    <div style="text-align: center; margin-top: 10px">
                        <a href="#" style="text-decoration: none;">Cadastre-se</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
