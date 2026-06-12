<form method="POST" action="{{ route('admin.login.post') }}">
    @csrf

    <input type="text" name="login" placeholder="Логин">
    <input type="password" name="password" placeholder="Пароль">

    @error('login')
        <div>{{ $message }}</div>
    @enderror

    <button type="submit">Войти</button>
</form>