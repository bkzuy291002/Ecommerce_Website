export interface Product {
    id: number,
    store_id: number
    category_id: number
    sku: string
    name: string
    slug: string
    price: number
    discount: number | null
    discount_type: number
    published: number
    type: number
    quantity: number
    description: string | null
    brand: string | null
    warranty: string | null
    warranty_type: string | null
    city_id: number | null
    special: number
    draft: string
}

export type Products = Product[]