import { useEffect, useState } from 'react'
import { Link, useParams } from 'react-router-dom'
import api from '../services/api'

function CategoryDetail() {
    const { id } = useParams()
    const [category, setCategory] = useState(null)
    const [loading, setLoading] = useState(true)
    const [error, setError] = useState('')

    useEffect(() => {
        const fetchCategory = async () => {
            try {
                const response = await api.get(`/categories/${id}`)
                setCategory(response.data.data)
            } catch (error) {
                console.error('Gagal mengambil detail kategori:', error)
                setError('Gagal mengambil detail kategori.')
            } finally {
                setLoading(false)
            }
        }

        fetchCategory()
    }, [id])

    if (loading) return <p>Memuat detail kategori...</p>
    if (error) return <p>{error}</p>
    if (!category) return <p>Kategori tidak ditemukan.</p>

    return (
        <div>
            <Link to="/categories" className="close-button">
                Kembali ke Daftar Kategori
            </Link>
            <h1>Detail Kategori</h1>
            <p>Informasi kategori dan daftar produk.</p>
            <h2>{category.name}</h2>
            <p>{category.description || '-'}</p>
            <p>Total produk: {category.products.length}</p>
            <table className="product-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>SKU</th>
                        <th>Nama Produk</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    {category.products.map((product, index) => (
                        <tr key={product.id}>
                            <td>{index + 1}</td>
                            <td>{product.sku}</td>
                            <td>{product.name}</td>
                            <td>
                                {new Intl.NumberFormat('id-ID', {
                                    style: 'currency',
                                    currency: 'IDR',
                                    maximumFractionDigits: 0,
                                }).format(Number(product.selling_price))}
                            </td>
                            <td>{product.stock}</td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    )
}

export default CategoryDetail