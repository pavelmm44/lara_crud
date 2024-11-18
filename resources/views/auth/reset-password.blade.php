<x-layout.default title="Reset password">

    <div>
        <h3>Reset password</h3>
        <form action="{{ route('password.store') }}" method="post">
            @csrf

            <input type="hidden" name="token" value="{{ $request->token }}">

            <x-form.input label="Email" name="email" value="{{ $request->email }}"/>

            <x-form.input type="password" label="Password" name="password"/>

            <x-form.input type="password" label="Confirm Password" name="password_confirmation"/>

            <button class="btn btn-primary btn-sm" type="submit">Send</button>
        </form>
    </div>
    <hr>
</x-layout.default>
