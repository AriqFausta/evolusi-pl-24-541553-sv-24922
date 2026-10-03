<script setup>
import { ref, onMounted } from 'vue'
import { getProductStatus } from '../utils/product'

const API_URL = import.meta.env.VITE_API_URL

const products = ref([])
const loading = ref(true)
const error = ref(null)

const getProducts = async () => {
    try {
        const response = await fetch(`${API_URL}/products`)

        if (!response.ok) {
            throw new Error('Gagal mengambil data produk')
        }

        const result = await response.json()

        products.value = result.data
    } catch (err) {
        error.value = err.message
    } finally {
        loading.value = false
    }
}

onMounted(() => {
    getProducts()
})
</script>

<template>
    <div>
        <h1>Daftar Produk</h1>

        <p v-if="loading">Loading...</p>

        <p v-else-if="error">
            {{ error }}
        </p>

        <table v-else>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="product in products" :key="product.id">
                    <td>{{ product.name }}</td>
                    <td>{{ product.description }}</td>
                    <td>Rp {{ product.price }}</td>
                    <td>{{ product.stock }}</td>
                    <td>{{ getProductStatus(product.stock) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
