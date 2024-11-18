<x-layout.default title="Edit profile">

    <div>
        <h3>Update user's information</h3>
        <form action="{{ route('profile.update') }}" method="post">
            @csrf
            @method('put')

            <x-form.input label="Name" name="name" :item="$user"/>

            <x-form.input label="Email" name="email" :item="$user"/>

            <button class="btn btn-primary btn-sm" type="submit">Send</button>
        </form>
    </div>
    <hr>

    <div>
        <h3>Update password</h3>
        <form action="{{ route('password.update') }}" method="post">
            @csrf
            @method('put')

            <x-form.input type="password" label="Current Password" name="current_password"/>

            <x-form.input type="password" label="New Password" name="password"/>

            <x-form.input type="password" label="Confirm New Password" name="password_confirmation"/>

            <button class="btn btn-primary btn-sm" type="submit">Send</button>
        </form>
    </div>
    <hr>
</x-layout.default>
