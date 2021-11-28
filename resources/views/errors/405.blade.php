@section('title', 'Method not allowed')
<x-error-layout>
    <x-error-page code="405" title="Method not allowed" subtitle="That method is not allowed for this route" />
</x-error-layout>
