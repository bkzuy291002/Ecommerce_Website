import type { City } from "~/types/models/city";
import { BaseService } from "./base.service";
export const useCityService = () => new CityService();
class CityService extends BaseService {
    constructor() {
        super();
    }
    public async getAll(): Promise<ApiResponse<City>> {
        return await this.api.get<ApiResponse<City>>('/api/v1/cities');
    }
}