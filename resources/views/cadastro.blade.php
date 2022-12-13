@include('principal.header')

@include('components.navBar')

<form name="registration" action="{{ route('cadastro') }}" method="post">
    @csrf
    <div class="row g-3">
        <div class="mb-3">
            <label for="name" class="form-label">Nome </label>
            <input type="text" class="form-control" name="name" id="name" placeholder="João da Silva" required>
            <!-- <div class="invalid-feedback">
                    Nome inteiro.
                </div> -->
        </div>

        <div class="mb-3">
            <label for="login" class="form-label">Login</label>
            <div class="input-group has-validation">
                <input type="text" class="form-control" name="login" id="login" placeholder="joanzinho06" required>
                <!-- <div class="invalid-feedback">
                        Crie um login.
                    </div> -->
            </div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Crie uma senha</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="********" onkeyup='check();' required>
            <!-- <div class="invalid-feedback">
                                Por favor, crie sua senha.
                            </div> -->
        </div>
        
        <div class="mb-3 col-8">
            <button type="submit" class="btn btn-danger" name="submit" value="Register">Criar meu Cadastro</button>
        </div>
    </div>
</form>
