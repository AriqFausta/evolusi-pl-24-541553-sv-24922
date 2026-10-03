import { describe, it, expect } from 'vitest'
import { getProductStatus } from '../src/utils/product'

describe('getProductStatus', () => {
    it('mengembalikan Tersedia jika stok lebih dari 0', () => {
        expect(getProductStatus(5)).toBe('Tersedia')
    })

    it('mengembalikan Habis jika stok 0', () => {
        expect(getProductStatus(0)).toBe('Habis')
    })
})
