<x-layout>
    <x-slot:heading>
        Jobs listings
    </x-slot:heading>
    <h1>Hello from Jobs Page</h1>

    <ul>
        @foreach ($jobs as $job)
        <li>
            <a href="/jobs/{{ $job['id'] }}">
                <strong>{{ $job['title'] }}:</strong> Paying {{ $job['salary'] }} per year, working @if ($job['location'] == 'Remote')
                Remote
            @else
            in {{ $job['location'] }}
            @endif
            </a>
        </li>
        @endforeach
    </ul>
</x-layout>
