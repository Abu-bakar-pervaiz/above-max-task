<div>

    @if ($errors->any())
        <ul class="py-4 px-2 my-4 bg-red-400 text-white rounded-lg">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    @if (session()->has('danger'))
        <div class="py-4 px-2 my-4 bg-red-400 text-white rounded-lg">
            {{ session()->get('danger') }}
        </div>
    @endif
    @if (session()->has('success'))
        <div class="py-4 px-2 my-4 bg-green-400 text-white rounded-lg">
            {{ session()->get('success') }}
        </div>
    @endif
</div>
