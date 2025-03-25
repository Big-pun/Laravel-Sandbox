<x-layout>
    <x-slot:heading>
        Jobs listings
    </x-slot:heading>

    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div class="text-blue-500 font-bold">{{ $job->employer->name }}</div>
                <strong>{{ $job['title'] }}:</strong> Paying {{ $job['salary'] }} per year, working
                 @if ($job['location'] == 'Remote')
                    Remote
                @else
                    in {{ $job['location'] }}
                @endif
            </a>
        @endforeach
    </div>
</x-layout>
