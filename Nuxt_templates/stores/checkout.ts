// import { defineStore } from "pinia";
//
// // @ts-ignore
// export const useCheckoutStore = defineStore('checkout', {
//     state: () => ({
//         checkedItems:[],
//     }),
//     actions: {
//         saveCheckedItems(checkedItems) {
//             this.$state.checkedItems = checkedItems;
//         },
//         clearCheckedItems() {
//             this.$state.checkedItems = [];
//         },
//
//         clearLocalStorage() {
//             window.localStorage.clear();
//         }
//
//     },
//     persist: {
//         storage: persistedState.localStorage
//     }
// })


// import { defineStore } from 'pinia';
// import type { User } from "~/types/models/user";
//
// export const useSessionStore = defineStore({
//     id: 'session-store',
//     state: () => ({
//         token: null,
//         _user: {} as User
//     }),
//     actions: {
//         setUser(user: User) {
//             this._user = user;
//         },
//         setToken(value: any) {
//             window.localStorage.removeItem("token");
//             window.localStorage.setItem("token", value);
//             this.$state.token = value;
//         },
//         async fetchUser() {
//             // Implement fetchUser method
//         },
//         async logout() {
//             try {
//                 await this.clear();
//             } catch (e) {
//                 console.log(e);
//             }
//         },
//         async clear() {
//             this.setUser({} as User);
//
//             // Clear all storage data
//             window.localStorage.clear();
//             window.sessionStorage.clear();
//
//             // Clear all caches
//             if ('caches' in window) {
//                 caches.keys().then(cacheNames => {
//                     cacheNames.forEach(cacheName => {
//                         caches.delete(cacheName);
//                     });
//                 });
//             }
//
//             // Reload the page to ensure all data is cleared
//             window.location.reload();
//         }
//     },
//     getters: {
//         user: (state): User => state._user,
//         isLoggedIn: (state): boolean => Object.keys(state._user).length > 0,
//     },
//     persist: true
// });


import { defineStore } from "pinia";

export const useCheckoutStore = defineStore('checkout', {
    state: () => ({
        checkedItems: JSON.parse(localStorage.getItem("checkout")) || [], // Đọc dữ liệu từ localStorage khi cửa hàng được khởi tạo
    }),
    actions: {
        saveCheckedItems(checkedItems) {
            this.$state.checkedItems = checkedItems;
            this.saveToLocalStorage(); // Lưu dữ liệu vào localStorage sau khi thay đổi
        },
        clearCheckedItems() {
            this.$state.checkedItems = [];
            this.saveToLocalStorage(); // Lưu dữ liệu vào localStorage sau khi xóa
        },
        clearLocalStorage() {
            localStorage.removeItem("checkout");
        },
        saveToLocalStorage() {
            localStorage.setItem("checkout", JSON.stringify(this.$state.checkedItems)); // Lưu dữ liệu của checkout vào localStorage
        }
    },
    persist: false // Tắt tính năng persist của Pinia
});


