<x-app-layout>
    <div x-data="weather({{ $userCityId ?? 'null' }})" class="py-12" >
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (!$userCityId)
          <template x-if="city_id != null">
            <div class="bg-green-100 border border-green-500 text-green-700 px-4 py-3 mb-7" role="alert">
              <p class="font-bold">Welcome</p>
              <p class="text-sm">Aer is a weather app for cities in Ontario. Please choose above</p>
            </div>
          </template>
        @endif
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-10">
          <div class="p-6 text-gray-900 w-full">
            <form action="{{ route('home.store') }}" method="post" class="flex justify-between">
                @csrf
                <div>
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
      <template x-for="(date, index) in (forecast.daily?.time || []).slice(0, 5)" :key="date">
        <div class="flex justify-between items-center p-4 border rounded mb-3 bg-black text-white">
            <h3 x-text="new Date(date).toLocaleDateString()"></h3>
            <div>
              <small class="block">High: <strong x-text="forecast.daily.temperature_2m_max[index] + '°C'"></strong></small>
              <small class="block">Low: <strong x-text="forecast.daily.temperature_2m_min[index] + '°C'"></strong></small>
            </div>
        </div>
      </template>
    </div>
  </div>
</x-app-layout>
