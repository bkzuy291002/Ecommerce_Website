import { BaseService } from "./base.service";
export const useStoreService = () => new StoreService();
class StoreService extends BaseService {
    constructor() {
        super();
    }
    public async getInfo(id: number): Promise<ApiResponse<any>> {
        return this.api.get<ApiResponse<any>>('/api/v1/getInfostore/' + id );
    }
    // public async update(params: any, id: number): Promise<ApiResponse<any>> {
    //     return this.api.post<ApiResponse<any>>('/api/v1/store/' + id, params);
    // }
}