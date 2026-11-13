<x-app-layout>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900 w-full">
            <form action="{{ route('home.store') }}" method="post" class="flex justify-between">
                @csrf
                <div x-data="weather" x-init="city_id = '{{ $userCityId }}'">
                  <label class="text-sm mr-5">Select a city:</label>
                  <select name="city_id" x-model="city_id" @change="getWeather($event)">
                    @foreach($cities as $city)
                      <option 
                        data-lat="{{ $city->lat }}"
                        data-lon="{{ $city->lon }}"
                        value="{{ $city->id }}"
                        @selected($userCityId == $city->id)>{{ $city->name }}</option>
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
