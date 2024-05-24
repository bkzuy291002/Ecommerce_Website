import { BaseService } from "./base.service";

export const useCartService = () => new CartService();

class CartService extends BaseService {
    constructor() {
        super();
    }

    public async addProductbyCart(params: any): Promise<ApiResponse<any>> {
        return this.api.post<ApiResponse<any>>('/api/v1/addProductbyCart/',params);
    }

    public async getCartbyId(id: string): Promise<ApiResponse<any>> {
        return this.api.get<ApiResponse<any>>('/api/v1/getCartbyId/'+id);
    }

    public async getProducCartbyid(id: string): Promise<ApiResponse<any>> {
        return this.api.get<ApiResponse<any>>('/api/v1/getProducCartbyid/'+id);
    }
}