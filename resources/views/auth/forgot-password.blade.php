<x-layout.public title="Reset Password">

    <div>
        <h3>Reset password</h3>
        <form action="{{ route('password.email') }}" method="post">
            @csrf

            <x-form.input label="Email" name="email"/>

            <button class="btn btn-primary btn-sm" type="submit">Send</button>
        </form>
    </div>
    <hr>
</x-layout.public>
