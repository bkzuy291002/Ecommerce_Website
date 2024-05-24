export interface User {
  name: string | null
  email: string | null
  password: string | null
  city: string
  district: string
  address: string
}

export type Users = User[]