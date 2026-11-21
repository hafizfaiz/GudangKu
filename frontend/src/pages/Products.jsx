import { useCallback, useEffect, useState } from 'react'
import { useSearchParams } from 'react-router-dom'
import api from '../services/api'

function Products() {
    const [searchParams] = useSearchParams()
    const [products, setProducts] = useState([])
    const [loading, setLoading] = useState(true)
    const [error, setError] = useState('')
    const [search, setSearch] = useState('')
    const [categories, setCategories] = useState([])
    const [categoryId, setCategoryId] = useState('')
    const [lowStockOnly, setLowStockOnly] = useState(
        searchParams.get('lowStock') === 'true'
    )
    const [showForm, setShowForm] = useState(false)
    const [saving, setSaving] = useState(false)
    const [editingId, setEditingId] = useState(null)
    const [formData, setFormData] = useState({
        category_id: '',
        sku: '',
        name: '',
        description: '',
        purchase_price: '',
        selling_price: '',
        stock: '',
        minimum_stock: '',
    })

// Mengambil data produk
const fetchProducts = useCallback(async () => {
    try {
        const response = await api.get(
            lowStockOnly ? '/products/low-stock' : '/products',
            {
                params: {
                    search,
                    category_id: categoryId,
                },
            }
        )
        setProducts(
            lowStockOnly
                ? response.data.data
                : response.data.data.data
        )
        setError('')
    } catch (error) {
        console.error('Gagal mengambil data produk:', error)
        setError('Gagal mengambil data produk dari server.')
    } finally {
        setLoading(false)
    }
}, [search, categoryId, lowStockOnly])

useEffect(() => {
    const timer = setTimeout(() => {
        fetchProducts()
    }, 0)

    return () => clearTimeout(timer)
}, [fetchProducts])

    // Mengambil daftar kategori
    useEffect(() => {
        const fetchCategories = async () => {
            try {
                const response = await api.get('/categories')
                const categoryData = response.data.data

                const categoryList = Array.isArray(categoryData)
                    ? categoryData
                    : categoryData?.data

                setCategories(
                    Array.isArray(categoryList) ? categoryList : []
                )
            } catch (error) {
                console.error('Gagal mengambil data kategori:', error)
            }
        }

        fetchCategories()
    }, [])

    // Mengubah nilai input form
    const handleInputChange = (e) => {
        const { name, value } = e.target

        setFormData((previousData) => ({
            ...previousData,
            [name]: value,
        }))
    }
    // Mengedit produk
    const handleEdit = (product) => {
        setEditingId(product.id)

        setFormData({
            category_id: String(product.category_id),
            sku: product.sku,
            name: product.name,
            description: product.description || '',
            purchase_price: String(product.purchase_price),
            selling_price: String(product.selling_price),
            stock: String(product.stock),
            minimum_stock: String(product.minimum_stock),
        })

        setShowForm(true)
    }
    // Menghapus produk
    const handleDelete = async (product) => {
        const confirmed = window.confirm(
            `Apakah kamu yakin ingin menghapus produk "${product.name}"?`
        )

        if (!confirmed) return

        try {
            await api.delete(`/products/${product.id}`)

            alert('Produk berhasil dihapus!')

            await fetchProducts()
        } catch (error) {
            console.error('Gagal menghapus produk:', error)

            alert(
                error.response?.data?.message ||
                'Gagal menghapus produk.'
            )
        }
    }
    // Menyimpan atau memperbarui produk
    const handleSubmit = async (e) => {
        e.preventDefault()

        try {
            setSaving(true)

            const payload = {
                ...formData,
                category_id: Number(formData.category_id),
                purchase_price: Number(formData.purchase_price),
                selling_price: Number(formData.selling_price),
                stock: Number(formData.stock),
                minimum_stock: Number(formData.minimum_stock),
            }

            if (editingId) {
                await api.put(`/products/${editingId}`, payload)
                alert('Produk berhasil diperbarui!')
            } else {
                await api.post('/products', payload)
                alert('Produk berhasil ditambahkan!')
            }

            setFormData({
                category_id: '',
                sku: '',
                name: '',
                description: '',
                purchase_price: '',
                selling_price: '',
                stock: '',
                minimum_stock: '',
            })

            setEditingId(null)
            setShowForm(false)
            await fetchProducts()
        } catch (error) {
            console.error('Gagal menyimpan produk:', error)

            if (error.response?.data?.errors) {
                const validationErrors = Object.values(
                    error.response.data.errors
                ).flat()

                alert(validationErrors.join('\n'))
            } else {
                alert(
                    error.response?.data?.message ||
                    'Gagal menyimpan produk. Periksa kembali data yang diisi.'
                )
            }
        } finally {
            setSaving(false)
        }
    }

    // Format harga ke Rupiah
    const formatRupiah = (value) => {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            maximumFractionDigits: 0,
        }).format(Number(value))
    }

    return (
        <div>
            <header>
                <h1>Daftar Produk</h1>
                <p>Kelola data produk inventaris GudangKu.</p>
                <button
                    className="add-button"
                    onClick={() => setShowForm(true)}
                >
                    + Tambah Produk
                </button>
            </header>

            {/* Form tambah produk */}
            {showForm && (
                <div className="form-container">
                    <h2>{editingId ? 'Edit Produk' : 'Tambah Produk Baru'}</h2>

                    <form onSubmit={handleSubmit}>
                        <div className="form-group">
                            <label htmlFor="sku">SKU Produk</label>
                            <input
                                type="text"
                                id="sku"
                                name="sku"
                                placeholder="Contoh: ELK-004"
                                value={formData.sku}
                                onChange={handleInputChange}
                                required
                            />
                        </div>

                        <div className="form-group">
                            <label htmlFor="name">Nama Produk</label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                placeholder="Contoh: Monitor Samsung"
                                value={formData.name}
                                onChange={handleInputChange}
                                required
                            />
                        </div>

                        <div className="form-group">
                            <label htmlFor="category_id">Kategori</label>
                            <select
                                id="category_id"
                                name="category_id"
                                value={formData.category_id}
                                onChange={handleInputChange}
                                required
                            >
                                <option value="">Pilih Kategori</option>

                                {categories.map((category) => (
                                    <option
                                        key={category.id}
                                        value={category.id}
                                    >
                                        {category.name}
                                    </option>
                                ))}
                            </select>
                        </div>

                        <div className="form-group">
                            <label htmlFor="description">
                                Deskripsi Produk
                            </label>
                            <textarea
                                id="description"
                                name="description"
                                placeholder="Masukkan deskripsi produk..."
                                value={formData.description}
                                onChange={handleInputChange}
                                rows="3"
                            />
                        </div>

                        <div className="form-group">
                            <label htmlFor="purchase_price">
                                Harga Beli (Rp)
                            </label>
                            <input
                                type="number"
                                id="purchase_price"
                                name="purchase_price"
                                placeholder="Contoh: 280000"
                                value={formData.purchase_price}
                                onChange={handleInputChange}
                                min="0"
                                required
                            />
                        </div>

                        <div className="form-group">
                            <label htmlFor="selling_price">
                                Harga Jual (Rp)
                            </label>
                            <input
                                type="number"
                                id="selling_price"
                                name="selling_price"
                                placeholder="Contoh: 380000"
                                value={formData.selling_price}
                                onChange={handleInputChange}
                                min="0"
                                required
                            />
                        </div>

                        <div className="form-group">
                            <label htmlFor="stock">Jumlah Stok</label>
                            <input
                                type="number"
                                id="stock"
                                name="stock"
                                placeholder="Contoh: 20"
                                value={formData.stock}
                                onChange={handleInputChange}
                                min="0"
                                required
                            />
                        </div>

                        <div className="form-group">
                            <label htmlFor="minimum_stock">
                                Stok Minimum
                            </label>
                            <input
                                type="number"
                                id="minimum_stock"
                                name="minimum_stock"
                                placeholder="Contoh: 5"
                                value={formData.minimum_stock}
                                onChange={handleInputChange}
                                min="0"
                                required
                            />
                        </div>
                        <div className="form-actions">
                            <button
                                type="submit"
                                className="save-button"
                                disabled={saving}
                            >
                                {saving ? 'Menyimpan...' : 'Simpan Produk'}
                            </button>

                            <button
                                type="button"
                                className="close-button"
                                onClick={() => {
                                    setShowForm(false)
                                    setEditingId(null)
                                    setFormData({
                                        category_id: '',
                                        sku: '',
                                        name: '',
                                        description: '',
                                        purchase_price: '',
                                        selling_price: '',
                                        stock: '',
                                        minimum_stock: '',
                                    })
                                }}
                                disabled={saving}
                            >
                                Tutup
                            </button>
                        </div>
                    </form>
                </div>
            )}

            {/* Kolom pencarian dan filter */}
            <div className="product-filters">
                <div className="search-container">
                    <input
                        type="text"
                        placeholder="Cari berdasarkan nama produk atau SKU..."
                        value={search}
                        onChange={(e) => setSearch(e.target.value)}
                    />
                </div>

                <div className="filter-container">
                    <select
                        value={categoryId}
                        onChange={(e) => setCategoryId(e.target.value)}
                    >
                        <option value="">Semua Kategori</option>

                        {categories.map((category) => (
                            <option
                                key={category.id}
                                value={category.id}
                            >
                                {category.name}
                            </option>
                        ))}
                    </select>
                </div>
                <div className="filter-container">
                    <select
                        value={lowStockOnly ? 'low' : 'all'}
                        onChange={(e) => setLowStockOnly(e.target.value === 'low')}
                    >
                        <option value="all">Semua Stok</option>
                        <option value="low">Stok Rendah</option>
                    </select>
                </div>
            </div>

            <p>Total produk: {products.length}</p>

            {/* Tabel produk */}
            {loading ? (
                <p>Memuat data produk...</p>
            ) : error ? (
                <p>{error}</p>
            ) : (
                <div className="table-container">
                    <table className="product-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>SKU</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Stok</th>
                                <th>Stok Minimum</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            {products.length > 0 ? (
                                products.map((product, index) => (
                                    <tr key={product.id}>
                                        <td>{index + 1}</td>
                                        <td>{product.sku}</td>
                                        <td>{product.name}</td>
                                        <td>
                                            {product.category?.name || '-'}
                                        </td>
                                        <td>
                                            {formatRupiah(product.purchase_price)}
                                        </td>
                                        <td>
                                            {formatRupiah(product.selling_price)}
                                        </td>
                                        <td>{product.stock}</td>
                                        <td>{product.minimum_stock}</td>
                                        <td>
                                            <div className="action-buttons">
                                                <button
                                                    type="button"
                                                    onClick={() => handleEdit(product)}
                                                >
                                                    Edit
                                                </button>

                                                <button
                                                    type="button"
                                                    onClick={() => handleDelete(product)}
                                                >
                                                    Hapus
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                ))
                            ) : (
                                <tr>
                                    <td
                                        colSpan="9"
                                        style={{ textAlign: 'center', padding: '24px' }}
                                    >
                                        {lowStockOnly
                                            ? 'Tidak ada produk dengan stok rendah.'
                                            : 'Produk tidak ditemukan.'}
                                    </td>
                                </tr>
                            )}
                        </tbody>
                    </table>
                </div>
            )}
        </div>
    )
}

export default Products