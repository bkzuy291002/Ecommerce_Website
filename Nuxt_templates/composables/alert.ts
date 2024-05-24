import { ToastOptions } from 'vue3-toastify'
import doneIcon from '@/components/icons/done.vue'
import warningIcon from '@/components/icons/warning.vue'
import errorIcon from '@/components/icons/error.vue'
import infoIcon from '@/components/icons/info.vue'
export const useAlert = () => {
  const nuxtApp = useNuxtApp()

  const $alertSuccess = (message: string, options: ToastOptions = {}): void => {
    nuxtApp.$toast.clearAll()
    nuxtApp.$toast.success(message, { ...options, icon: doneIcon, autoClose: 3000 })
  }

  const $alertInfo = (message: string, options: ToastOptions = {}): void => {
    nuxtApp.$toast.clearAll()
    nuxtApp.$toast.info(message, { ...options, icon: infoIcon })
  }

  const $alertWarning = (message: string, options: ToastOptions = {}): void => {
    nuxtApp.$toast.clearAll()
    nuxtApp.$toast.warning(message, { ...options, icon: warningIcon })
  }

  const $alertError = (message: string, options: ToastOptions = {}): void => {
    nuxtApp.$toast.clearAll()
    nuxtApp.$toast.error(message, { ...options, icon: errorIcon, autoClose: 3000 })
  }

  return { $alertSuccess, $alertInfo, $alertWarning, $alertError }
}
