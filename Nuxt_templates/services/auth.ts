
import { BaseService } from "~/services/base.service";
import type { User } from "~/types/models/user";
export const useAuthService = () => new AuthService()
class AuthService extends BaseService {
    constructor() {
        super();
    }
    public async login(params?: object): Promise<ApiResponse<any>> {
        return await this.api.post<ApiResponse<any>>('/api/v1/login', params)
    }
    public async forgotPassword(params?: object): Promise<ApiResponse<any>> {
        return await this.api.post<ApiResponse<any>>('/api/v1/forgotPassword', params)
    }
    public async resetPassword(params?: object): Promise<ApiResponse<any>> {
        return await this.api.put<ApiResponse<any>>('/api/v1/resetPassword', params)
    }
    public async register(params?: object): Promise<ApiResponse<any>> {
        return await this.api.post<ApiResponse<any>>('/api/v1/register', params)
    }

    // public async logout(): Promise<ApiResponse<any>> {
    //     return await this.api.post<ApiResponse<any>>('/api/admin/logout')
    // }
    // public async checkToken(token: string): Promise<ApiResponse<any>> {
    //     return await this.api.get<ApiResponse<any>>('/api/v1/reset?token=' + token)
    // }

}