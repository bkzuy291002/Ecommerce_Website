export { }
declare global {
  export interface ApiResponse<T> {
    success: string
    message: string
    errorCode: string
    result: T
  }
}
