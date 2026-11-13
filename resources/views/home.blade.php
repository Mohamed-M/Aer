<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900 w-full">
            <form action="{{ route('home.select') }}" method="get" class="flex justify-between">
                @csrf
                <div>
                  <label class="text-sm mr-5">Select a city:</label>
                  <select name="city_id">
                    @foreach($cities as $city)
                      <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div>
                  <x-primary-button>Save</x-primary-button>
                </div>
            </form>
          </div>
      </div>
    </div>
</x-app-layout>
