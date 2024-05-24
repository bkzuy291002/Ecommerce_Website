import { BaseService } from "./base.service";

export const useImageservice = () => new Imageservice();

class Imageservice extends BaseService {
    constructor() {
        super();
    }

    public async getProductBySlug(slug: string): Promise<ApiResponse<any>> {
        return this.api.get<ApiResponse<any>>('/api/v1/getProductbyslug/' + slug);
    }

}