<x-app-layout>
    <div x-data="weather({{ $userCityId ?? 'null' }})" class="py-12" >
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
        <div class="p-4 border rounded mb-3 bg-black text-white">
            <h3 x-text="date"></h3>
            <p>High: <span x-text="forecast.daily.temperature_2m_max[index] + '°C'"></span></p>
            <p>Low: <span x-text="forecast.daily.temperature_2m_min[index] + '°C'"></span>
            </p>
        </div>
      </template>
      </div>
    </div>
</x-app-layout>
