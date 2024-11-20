<x-layout.public title="Login">

    <div>
        <h3>Login</h3>
        <form action="{{ route('login') }}" method="post">
            @csrf

            <x-form.input label="Email" name="email"/>

            <x-form.input type="password" label="Password" name="password"/>

            <x-form.checkbox label="Remember" name="remember"/>

            <button class="btn btn-primary btn-sm" type="submit">Send</button>
            <a href="{{ route('password.request') }}" class="ml-3">Forgot password</a>
        </form>
    </div>
    <hr>
</x-layout.public>
