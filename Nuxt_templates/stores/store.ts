import { defineStore } from "pinia";
import { useStoreService } from "~/services/store";
// @ts-ignore
export const useStoreStore = defineStore('store', {
    state: () => ({
        id: null,
        user_id: null,
        email: null,
        username: null,
        image: null,
        phone: null,
        gender: null,
        name: null,
        city_id: null,
        district_id: null,
        address: null,
        store_id:null
    }),
    actions: {
        async getInfo(id: any) {
            const storeService = useStoreService();
            await storeService
                .getInfo(id)
                .then((res) => {
                    this.$state.store_id = res.data.id;
                    this.$state.user_id = res.data.user_id;
                    this.$state.email = res.data.email;
                    this.$state.name = res.data.name;
                    this.$state.image = res.data.path;
                    this.$state.username = res.data.username;
                    this.$state.phone = res.data.phone;
                    this.$state.gender = res.data.gender;
                    this.$state.city_id = res.data.city_id;
                    this.$state.district_id = res.data.district_id;
                    this.$state.address = res.data.address;
                })
                .catch((e) => {
                    console.log(e);
                });
        }
    },
    persist: true
})