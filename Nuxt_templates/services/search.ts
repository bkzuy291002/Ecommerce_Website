import { BaseService } from "./base.service";

export const useSearchService = () => new SearchService();

class SearchService extends BaseService {
    constructor() {
        super();
    }


    public async searchproduct(keyword: string): Promise<ApiResponse<string>> {
        return this.api.get<ApiResponse<string>>('/api/v1/search', { keyword });
    }



}