<form action="{{ url('users/login') }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    Email: <input name="email" type="email"><br>
    Passw: <input type="password" name="password">
    <input type="submit" value="Sign in">
</form>