<x-layout>
    <x-slot:heading>
        Job details
    </x-slot:heading>

    <h1 class="text-3xl font-bold mb-4">{{ $job['title'] }}</h1>
    <p> This position is
        @if ($job['location'] == 'Remote')
            remote
        @else
            in {{ $job['location'] }}
        @endif
        and paying <strong>{{ $job['salary'] }}</strong> per year
        <hr />
        <a href="/jobs" class="text-blue-500 hover:text-blue-700">Back to jobs</a>
    </p>
</x-layout>
