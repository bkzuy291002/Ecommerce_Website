// https://nuxt.com/docs/api/configuration/nuxt-config

export default defineNuxtConfig({
  ssr: true,
  modules: ['nuxt-swiper'
            , '@pinia/nuxt',
            'nuxt-icon','@nuxt/ui',
            'nuxt-primevue' ,
            '@pinia-plugin-persistedstate/nuxt',
  ],

  devtools: { enabled: true },
  css: ['~/assets/css/main.css'],
  build: {
    transpile: ['pinia-plugin-persistedstate','vuetify'],
  },
  runtimeConfig: {
    paypalClientSecret:'',
    paypalWebhookId: '',
    public: {
      webURL: process.env.WEB_URL || 'http://localhost:3000',
      apiURL: process.env.API_URL || 'http://localhost:8000',
      paypalClientId:'',
      baseURL: '',
    }
  },
  postcss: {
    plugins: {
      tailwindcss: {},
      autoprefixer: {},
    },
  },

  app: {
    head: {
      link: [{ rel: 'stylesheet', href: 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css' },
        { href:'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' , rel:'stylesheet' , integrity:'sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC', crossorigin:'anonymous'},
        {href:'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' ,integrity:'sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM', crossorigin:'anonymous'}
      ],
      script: [
        { src:"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ,integrity:"sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" ,crossorigin:"anonymous"}
      ]
    }
  },

  
})
