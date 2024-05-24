import { BaseService } from "./base.service";
export const useUserAddressService = () => new UserAddressService();
class UserAddressService extends BaseService {
    constructor() {
        super();
    }

    public async getUserAdressId(id: number): Promise<ApiResponse<any>> {
        return this.api.get<ApiResponse<any>>('/api/v1/GetIdAddressByUserid/' + id );
    }

    public async getUserAdress(id: number): Promise<ApiResponse<any>> {
        return this.api.get<ApiResponse<any>>('/api/v1/GetUserAddressByid/' + id );
    }
}