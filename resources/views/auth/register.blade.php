<x-layout.default title="Registration">

    <div>
        <h3>Registration</h3>
        <form action="{{ route('register') }}" method="post">
            @csrf

            <x-form.input label="Name" name="name"/>

            <x-form.input label="Email" name="email"/>

            <x-form.input type="password" label="Password" name="password"/>

            <x-form.input type="password" label="Confirm Password" name="password_confirmation"/>

            <button class="btn btn-primary btn-sm" type="submit">Send</button>
        </form>
    </div>
    <hr>
</x-layout.default>
