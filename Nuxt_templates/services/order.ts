import { BaseService } from "./base.service";
export const useOrderService = () => new OrderService();
class OrderService extends BaseService {
    constructor() {
        super();
    }

    public async CreateOder(params: any): Promise<ApiResponse<any>> {
        return this.api.post<ApiResponse<any>>('/api/v1/CreateOrder', params);
    }

}