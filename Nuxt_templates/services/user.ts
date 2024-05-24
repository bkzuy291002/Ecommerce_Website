import { BaseService } from "./base.service";
export const useUserService = () => new UserService();
class UserService extends BaseService {
    constructor() {
        super();
    }
    public async getAllUser(): Promise<ApiResponse<any>> {
        return this.api.get<ApiResponse<any>>('/api/v1/getAllUser');
    }

}