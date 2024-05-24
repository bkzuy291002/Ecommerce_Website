import type { Categories } from "~/types/models/category";
import { BaseService } from "./base.service";

export const useCategoryService = () => new CategoryService()

class CategoryService extends BaseService {
    constructor() {
        super();
    }

    public async getAll(): Promise<ApiResponse<Categories>> {
        return this.api.get<ApiResponse<Categories>>('/api/v1/categories');
    }
}   