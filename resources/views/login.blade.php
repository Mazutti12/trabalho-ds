@include('principal.header')
@include('components.navBar')
@if (session('erro'))
<div>
    {{ session('erro') }}
</div>
@endif
<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="mb-3 mt-3">
        <label for="login">Login:</label>
        <input type="text" name="login" id="login" class="form-control" placeholder="Entre com seu login" required>
        <!-- <div class="valid-feedback">Válido.</div>
            <div class="invalid-feedback">Inválido.</div> -->
    </div>
    <div class="mb-3">
        <label for="password">Senha:</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Entre com sua senha" required>
        <!-- <div class="valid-feedback">Válido.</div>
            <div class="invalid-feedback">Inválido.</div> -->
    </div>
    <div class="mb-3">
        <a href="{{ route('index') }}" class="text-danger" target="_blank">Não possuo cadastro</a>
    </div>

    <div class="mb-3 col-8">
            <button type="submit" class="btn btn-danger" name="submit" value="Register">Login</button>
        </div>
</form>