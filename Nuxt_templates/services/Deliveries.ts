import { BaseService } from "./base.service";
export const useDeliveryService = () => new Deliveries();
class Deliveries extends BaseService {
    constructor() {
        super();
    }
    public async getAllDelivery(): Promise<ApiResponse<any>> {
        return await this.api.get<ApiResponse<any>>('/api/v1/getAllDelivery');
    }

    public async getCostById(id: number): Promise<ApiResponse<any>> {
        return this.api.get<ApiResponse<any>>('/api/v1/getCostById/' + id );
    }
}