import type { FetchOptions, SearchParameters } from 'ofetch'
import { $fetch, FetchError } from 'ofetch'
import { reactive, type Ref, ref } from 'vue'
import type { User } from "~/types/models/user";
import { useSessionStore } from "~/stores/session";
import { useTrans } from '~/composables/trans';


export interface AuthConfig {
    fetchOptions: FetchOptions<'json'>
    webURL: string
    apiURL: string
    redirect: {
        logout: string
        login: undefined | string
    }
    echoConfig?: EchoConfig
}

export interface EchoConfig {
    pusherAppKey: string
    pusherAppCluster: string

}

export interface LoginAction {
    action: string
    url: string
}

const authConfigDefaults: AuthConfig = {
    fetchOptions: {
        baseURL: '',
    },
    webURL: '',
    apiURL: '',
    redirect: {
        logout: '/',
        login: '/login',
    },
}

export default class Api {
    #alertSessionExpired: boolean = false

    public token = typeof window !== 'undefined' ? localStorage.getItem("token") : null;

    public config: AuthConfig
    public $user = reactive<User>({} as User)
    public loggedIn = ref<boolean | undefined>(undefined)
    public redirect = ref<boolean>(false)
    public action = ref<LoginAction | undefined>(undefined)

    // public nuxtApp = useNuxtApp()

    constructor(config: AuthConfig) {
        this.config = { ...authConfigDefaults, ...config }
    }

    public async setXsrfToken<T>(): Promise<T> {
        // const xsrfToken = useCookie('JMC-XSRF-TOKEN')
        //
        // if (!xsrfToken.value) {
        //   await useFetch('/sanctum/csrf-cookie', this.fetchOptions())
        // }

        return new Promise<T>(resolve => resolve(null))
    }

    private fetchOptions(params?: SearchParameters, method = 'GET'): FetchOptions<'json'> {
        const fetchOptions = this.config.fetchOptions
        // const xsrfToken = useCookie('JMC-XSRF-TOKEN')
        this.token = localStorage.getItem("token");

        fetchOptions.headers = {
            Accept: 'application/json',
            Authorization: `Bearer ${this.token || ''}`,
            Referer: this.config.webURL
        }

        fetchOptions.method = method
        // fetchOptions.credentials = 'include'

        delete this.config.fetchOptions.body
        delete this.config.fetchOptions.params

        if (params) {
            if (method === 'POST' || method === 'PUT')
                this.config.fetchOptions.body = params
            else
                this.config.fetchOptions.params = params
        }

        return this.config.fetchOptions
    }

    private handleException(error: FetchError) {
        const { statusCode } = error
        const route = useRoute()
        const session = useSessionStore()
        const { trans } = useTrans()
        switch (statusCode) {
            case 419:
            // Session expired
            case 403:
            // Forbidden
            case 401: // Unauthorized
                if (route.path !== '/login' && session.isLoggedIn && !this.#alertSessionExpired) {
                    this.#alertSessionExpired = true
                    window.location.reload()
                    alert(trans('WAR_COM_0004'))
                }

                break
            case 400:
            // Bad request
            case 402:
            // Payment required
            case 404:
                if (route.path === '/auth/login') {
                    alert(trans('ERR_SCREEN_001'))
                }
                else {
                    navigateTo("/404");
                }

                break
            case 408:
            case 504:
            // Gateway Time-out
            case 503:
            // Service Unavailable
            default:
                // Unknown error
                throw 'INF_COM_0004'
        }
    }

    public get<Response>(endpoint: string, params?: SearchParameters): Promise<Response> {
        const query = this.serialize(params || {})
        const result = this.setXsrfToken<Response>().then((): any => {
            return useFetch(endpoint + (query ? `?${query}` : ''), this.fetchOptions())
        })

        return result.then(({ data, error }: { data: Ref<Response>, error: Ref }) => {
            if (error?.value) {
                throw error.value
            }

            return data.value
        }).catch(error => {
            console.log(error, 'eee')
            this.handleException(error)
        })
    }

    public post<Response>(endpoint: string, params?: SearchParameters): Promise<Response> {
        const result = this.setXsrfToken().then(_ => {
            return $fetch<Response>(endpoint, this.fetchOptions(params, 'POST'))
        })

        result.catch(error => {
            this.handleException(error)
        })

        return result
    }

    public put<Response>(endpoint: string, params?: SearchParameters): Promise<Response> {
        const result = this.setXsrfToken().then(_ => {
            return $fetch<Response>(endpoint, this.fetchOptions(params, 'PUT'))
        })

        result.catch(error => {
            this.handleException(error)
        })

        return result
    }

    public update<Response>(endpoint: string, params?: SearchParameters): Promise<Response> {
        return this.put(endpoint, params)
    }

    public store<Response>(endpoint: string, params?: SearchParameters): Promise<Response> {
        return this.post(endpoint, params)
    }

    public delete<Response>(endpoint: string, params?: SearchParameters): Promise<Response> {
        const result = this.setXsrfToken().then(_ => {
            return $fetch<Response>(endpoint, this.fetchOptions(params, 'DELETE'))
        })

        result.catch(error => {
            this.handleException(error)
        })

        return result
    }

    private serialize(obj: object, prefix?: string): string {
        const str = [];
        for (const p in obj) {
            if (obj.hasOwnProperty(p)) {
                const k = prefix ? prefix + '[]' : p,
                    v = obj[p];

                if (v === null || typeof v === 'undefined') {
                    continue
                }

                str.push((v !== null && typeof v === "object") ?
                    this.serialize(v, k) :
                    encodeURIComponent(k) + "=" + encodeURIComponent(v));
            }
        }

        return str.join("&");
    }
}
