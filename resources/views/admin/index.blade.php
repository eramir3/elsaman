<x-admin>

    @section('content')

        @if(Auth::user()->userHasRole('admin'))
            <h1>Dashboard</h1>
        @endif

    @endsection
</x-admin>