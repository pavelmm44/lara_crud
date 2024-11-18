<x-layout.default title="Email Verification">

    <div>
        <h3>Email Verification</h3>

        <form action="{{ route('verification.send') }}" method="post">
            @csrf
            <button class="btn btn-sm btn-success">Send notification</button>
        </form>
    </div>
    <hr>
</x-layout.default>
