<x-layout>
    <x-slot:heading>
        Edit Job : {{ $job['title'] }}
    </x-slot:heading>

    <form method="POST" action="/jobs">
        @csrf

        <div x-data="{ isRemote: {{ $job->location === 'Remote' ? 'true' : 'false' }} }" class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                        <input type="text" 
                               name="title" 
                               id="title" 
                               class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                               value="{{ $job->title }}">
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="sm:col-span-4">
                        <label for="salary" class="block text-sm/6 font-medium text-gray-900">Salary</label>
                        <input type="text" 
                               name="salary" 
                               id="salary" 
                               class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                               value="{{ $job->salary }}">
                        @error('salary')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remote checkbox -->
                    <div class="sm:col-span-4">
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" 
                                       name="remote" 
                                       id="remote"
                                       x-model="isRemote"

                                       {{ $job->location === 'Remote' ? 'checked' : '' }}
                                       class="rounded-md border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <span class="ml-2">Remote Position</span>
                            </label>
                        </div>
                        @error('remote')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Location field -->
                    <div class="sm:col-span-4" x-show="!isRemote">
                        <label for="location" class="block text-sm/6 font-medium text-gray-900">Location</label>
                        <input type="text" 
                               name="location" 
                               id="location" 
                               x-bind:disabled="isRemote"
                               class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                               value="{{ $job->location === 'Remote' ? '' : $job->location }}">
                        @error('location')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/jobs/{{ $job->id }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
            </div>
        </div>
    </form>
</x-layout>
