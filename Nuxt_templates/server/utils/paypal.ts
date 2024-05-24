import { ofetch, type $Fetch } from 'ofetch'

class PayPal {
    protected api: string
    public fetch: $Fetch
    constructor(
        private readonly clientId: string,
        private readonly clientSecret: string,
        sandbox?: boolean
    ) {
        if (!clientId) throw new Error('Missing clientId')
        if (!clientSecret) throw new Error('Missing clientSecret')
        this.clientId = clientId
        this.clientSecret = clientSecret

        // Determine API endpoint
        this.api = sandbox
            ? 'https://api.sandbox.paypal.com'
            : 'https://api.paypal.com'

        // Create custom ofetch instance
        this.fetch = ofetch.create({
            baseURL: this.api,
        })
    }

    async getAccessToken() {
        const result = await this.fetch<{
            scope: string
            access_token: string
            token_type: string
            app_id: string
            expires_in: number
            nonce: string
        }>('/v1/oauth2/token', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Authorization': `Basic ${btoa(
                    `${this.clientId}:${this.clientSecret}`
                )}`,
            },
            body: 'grant_type=client_credentials',
        })

        return result.access_token
    }

    async initialize() {
        const accessToken = await this.getAccessToken()
        console.log(accessToken)
        this.fetch = ofetch.create({
            baseURL: this.api,
            headers: {
                'Authorization': `Bearer ${accessToken}`,
                'Content-Type': 'application/json',
            },
        })
    }
}

export async function createPayPalClient() {
    const runtimeConfig = useRuntimeConfig()
    const client = new PayPal(
        runtimeConfig.public.paypalClientId,
        runtimeConfig.paypalClientSecret,
        runtimeConfig.env !== 'production'
    )
    await client.initialize()
    return client


    // const clientId = process.env.NUXT_PUBLIC_PAYPAL_CLIENT_ID;
    // const clientSecret = process.env.NUXT_PAYPAL_CLIENT_SECRET;
    // const isSandbox = process.env.NODE_ENV !== 'production';
    //
    // if (!clientId || !clientSecret) {
    //     throw new Error('PayPal credentials are missing');
    // }
    //
    // const client = new PayPal(clientId, clientSecret, isSandbox);
    // await client.initialize();
    // return client;
}