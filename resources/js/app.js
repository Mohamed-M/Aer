

import Alpine from 'alpinejs';

window.Alpine = Alpine;

document.addEventListener('alpine:init', (e) => {

  Alpine.data('weather', (savedCityId) => ({
    city_id: savedCityId,
    forecast: {},

    init() {
      if (this.city_id) {
        this.$nextTick(() => {
          const select = this.$el.querySelector('select');
          this.getWeather({ target: select })
        })
      } else {
        const select = this.$el.querySelector('select');
        select.selectedIndex = 0;
        this.city_id = select.value;
        this.getWeather({ target: select })
      }
    },

    async getWeather(e) {
      const option = e.target.selectedOptions[0];
      const lat = option.dataset.lat;
      const lon = option.dataset.lon

        
      const forecastResponse = await fetch(`https://api.open-meteo.com/v1/forecast?latitude=${lat}&longitude=${lon}&daily=temperature_2m_max,temperature_2m_min&timezone=UTC`);
      this.forecast = await forecastResponse.json();
      console.log('this.forecast', this.forecast)
    }
  }))
})

Alpine.start();
