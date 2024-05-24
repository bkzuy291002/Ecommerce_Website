import { BaseService } from "./base.service";

export const useProductService = () => new ProductService();

class ProductService extends BaseService {
    constructor() {
        super();
    }

    public async getSpecialProduct(): Promise<ApiResponse<any>> {
        return this.api.get<ApiResponse<any>>('/api/v1/ProductOutstanding');
    }

    public async getSaleProduct(): Promise<ApiResponse<any>> {
        return this.api.get<ApiResponse<any>>('/api/v1/ProductSale');
    }

    public async getSuggestProduct(): Promise<ApiResponse<any>> {
        return this.api.get<ApiResponse<any>>('/api/v1/ProductSuggest');
    }

    public async getComment(): Promise<ApiResponse<any>> {
        return this.api.get<ApiResponse<any>>('/api/v1/getComment');
    }

    // public async getProductBySlug(slug: string): Promise<ApiResponse<any>> {
    //     return this.api.get<ApiResponse<any>>('/api/v1/getProductbyslug/' + slug);
    // }

    public async getProductbyid(id: string): Promise<ApiResponse<any>> {
        return this.api.get<ApiResponse<any>>('/api/v1/getProductbyid/' + id);
    }

    public async getImagebyid(id: string): Promise<ApiResponse<any>> {
        return this.api.get<ApiResponse<any>>('/api/v1/getImagebyid/' + id);
    }

    public async getProductVariantByid(id: string): Promise<ApiResponse<any>> {
        return this.api.get<ApiResponse<any>>('/api/v1/getProductVariantByid/' + id);
    }

    public async CreateProduct(params: any): Promise<ApiResponse<any>> {
        return this.api.post<ApiResponse<any>>('/api/v1/createProduct', params);
    }

    public async Allproduct(id: string): Promise<ApiResponse<any>> {
        return this.api.get<ApiResponse<any>>('/api/v1/Allproduct/'+ id);
    }

    public async getProductByCategoriesId(id: string): Promise<ApiResponse<any>> {
        return this.api.get<ApiResponse<any>>('/api/v1/getProductByCategoriesId/'+ id);
    }

    public async getProductEdit(id: string): Promise<ApiResponse<any>> {
        return this.api.get<ApiResponse<any>>('/api/v1/ProductEdit/'+ id);
    }
}