
import { BaseService } from "./base.service";
export const useDistrictService = () => new DistrictService();
class DistrictService extends BaseService {
    constructor() {
        super();
    }
    public async getDistrictByCity(id: number): Promise<ApiResponse<any>> {
        return await this.api.get<ApiResponse<any>>('/api/v1/district/' + id);
    }
}