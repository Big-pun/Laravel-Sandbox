<x-layout>
    <x-slot:heading>
        Create a new job
    </x-slot:heading>

    <form method="POST" action="/jobs">
      @csrf

        <div x-data="{ isRemote: false }" class="space-y-12">
          <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base/7 font-semibold text-gray-900">Create a New Job</h2>
            <p class="mt-1 text-sm/6 text-gray-600">We just need a handfull of details from you</p>
      
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-4">
                <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                <input type="text" 
                       name="title" 
                       id="title" 
                       required
                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                       value="{{ old('title') }}">
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
              </div>
      
              <div class="sm:col-span-4">
                <label for="salary" class="block text-sm/6 font-medium text-gray-900">Salary</label>
                <input type="text" 
                       name="salary" 
                       id="salary" 
                       required
                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                       value="{{ old('salary') }}">
                @error('salary')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
              </div>

              <!-- Remote checkbox -->
              <div class="sm:col-span-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" 
                           name="remote" 
                           x-model="isRemote"
                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <span class="ml-2">Remote Position</span>
                </label>
              </div>

              <!-- Location field -->
              <div class="sm:col-span-4" x-show="!isRemote">
                <label for="location" class="block text-sm/6 font-medium text-gray-900">Location</label>
                <input type="text" 
                       name="location" 
                       id="location" 
                       x-bind:required="!isRemote"
                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                       value="{{ old('location') }}">
                @error('location')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
              </div>
            </div>
          </div>
      
          
      
        <div class="mt-6 flex items-center justify-end gap-x-6">
          <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
          <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
      </form>
      


</x-layout>