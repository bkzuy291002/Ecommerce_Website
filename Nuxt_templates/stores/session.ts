//
// import { defineStore } from 'pinia';
// import type { User } from "~/types/models/user";
// import { useRoute } from 'vue-router';
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
//             localStorage.removeItem("token");
//             localStorage.setItem("token", value);
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
//             const route = useRoute();
//             this.setUser({} as User);
//
//             // Xóa tất cả các mục trong localStorage và sessionStorage
//             localStorage.clear();
//             sessionStorage.clear();
//
//             if (route.path !== '/login') {
//                 window.location.assign('/login');
//             }
//         }
//     },
//     getters: {
//         user: (state): User => state._user,
//         isLoggedIn: (state): boolean => Object.keys(state._user).length > 0,
//     },
//     persist: true
// });


import { defineStore } from 'pinia';
import type { User } from "~/types/models/user";

export const useSessionStore = defineStore({
    id: 'session-store',
    state: () => ({
        token: null,
        _user: {} as User
    }),
    actions: {
        setUser(user: User) {
            this._user = user;
        },
        setToken(value: any) {
            window.localStorage.removeItem("token");
            window.localStorage.setItem("token", value);
            this.$state.token = value;
        },
        async fetchUser() {
            // Implement fetchUser method
        },
        async logout(router) {
            try {
                await this.clear(router);
            } catch (e) {
                // console.log(e);
            }
        },
        async clear(router) {
            this.setUser({} as User);

            // Clear all storage data
            window.localStorage.clear();
            window.sessionStorage.clear();

            this.clearCookies();

            // Check if the current route is not '/login' and then redirect
            if (router.currentRoute.value.path !== '/login') {
                router.push('/login');
            }
        },
        clearCookies(): void {
            const cookies: string[] = document.cookie.split("; ");
            for (const cookie of cookies) {
                const [name, _] = cookie.split("=");
                document.cookie = `${name}=;expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/;`;
            }
        }
    },
    getters: {
        user: (state): User => state._user,
        isLoggedIn: (state): boolean => Object.keys(state._user).length > 0,
    },
    persist: true
});

