<form action="{{route('login')}}" method="POST" class="login-box">
    {{ csrf_field() }}
    <h1>Авторизация</h1>
    @if(isset($msg))
    @endif
    <div class="form-input log">
        <label class="fig" for="login"><i class="fas fa-user"></i></label>
        <input type="name" placeholder="Введите Логин" name="login" id="login" value="{{old('login')}}">
    </div>
    <div class="form-input pass">
        <label class="fig" for="password"><i class="fas fa-user"></i></label>
        <input type="password" placeholder="Введите Пароль" name="password" id="password">
    </div>
    <div class="submit-form">
        <button>ВОЙТИ</button>
    </div>
</form>
