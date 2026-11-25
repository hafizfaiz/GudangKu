import { useCallback, useEffect, useState } from 'react'
import { Link } from 'react-router-dom'
import {
    Plus,
    Pencil,
    Trash2,
    Eye,
    RefreshCw,
} from 'lucide-react'
import api from '../services/api'

// Mengambil array kategori dari berbagai bentuk response Laravel
const extractCategories = (responseData) => {
    if (Array.isArray(responseData)) {
        return responseData
    }

    const possibleData = [
        responseData?.data?.data,
        responseData?.data,
        responseData?.data?.data?.data,
    ]

    return possibleData.find(Array.isArray) || null
}

function Categories() {
    const [categories, setCategories] = useState([])
    const [loading, setLoading] = useState(true)
    const [error, setError] = useState('')
    const [showForm, setShowForm] = useState(false)
    const [saving, setSaving] = useState(false)

    const [formData, setFormData] = useState({
        name: '',
        description: '',
    })

    const [editingId, setEditingId] = useState(null)

    // Mengambil data awal kategori
    useEffect(() => {
        let ignore = false

        const loadCategories = async () => {
            try {
                const response = await api.get('/categories')
                const categoryData = extractCategories(response.data)

                if (!Array.isArray(categoryData)) {
                    throw new Error(
                        'Format data kategori dari server tidak sesuai.'
                    )
                }

                if (!ignore) {
                    setCategories(categoryData)
                    setError('')
                }
            } catch (err) {
                console.error('Gagal mengambil kategori:', err)
                console.error('Detail error:', err.response?.data)

                if (!ignore) {
                    setError(
                        err.response?.data?.message ||
                        err.message ||
                        'Gagal mengambil data kategori dari server.'
                    )
                }
            } finally {
                if (!ignore) {
                    setLoading(false)
                }
            }
        }

        loadCategories()

        return () => {
            ignore = true
        }
    }, [])

    // Refresh data setelah tambah, edit, hapus, atau retry
    const fetchCategories = useCallback(async () => {
        try {
            const response = await api.get('/categories')
            const categoryData = extractCategories(response.data)

            if (!Array.isArray(categoryData)) {
                throw new Error(
                    'Format data kategori dari server tidak sesuai.'
                )
            }

            setCategories(categoryData)
            setError('')
            return true
        } catch (err) {
            console.error('Gagal mengambil kategori:', err)

            setError(
                err.response?.data?.message ||
                err.message ||
                'Gagal mengambil data kategori dari server.'
            )

            return false
        }
    }, [])

    // Mengubah nilai input
    const handleInputChange = (e) => {
        const { name, value } = e.target

        setFormData((prev) => ({
            ...prev,
            [name]: value,
        }))
    }

    // Membuka form tambah
    const handleAdd = () => {
        setEditingId(null)
        setFormData({
            name: '',
            description: '',
        })
        setShowForm(true)
    }

    // Membuka form edit
    const handleEdit = (category) => {
        setEditingId(category.id)
        setFormData({
            name: category.name || '',
            description: category.description || '',
        })
        setShowForm(true)
    }

    // Menutup form
    const handleCloseForm = () => {
        setShowForm(false)
        setEditingId(null)
        setFormData({
            name: '',
            description: '',
        })
    }

    // Menghapus kategori
    const handleDelete = async (id) => {
        const confirmed = window.confirm(
            'Apakah kamu yakin ingin menghapus kategori ini?'
        )

        if (!confirmed) return

        try {
            await api.delete(`/categories/${id}`)
            alert('Kategori berhasil dihapus!')
            await fetchCategories()
        } catch (err) {
            console.error('Gagal menghapus kategori:', err)

            alert(
                err.response?.data?.message ||
                'Gagal menghapus kategori.'
            )
        }
    }

    // Menyimpan atau memperbarui kategori
    const handleSubmit = async (e) => {
        e.preventDefault()

        if (!formData.name.trim()) {
            alert('Nama kategori wajib diisi.')
            return
        }

        try {
            setSaving(true)

            const payload = {
                name: formData.name.trim(),
                description: formData.description.trim(),
            }

            if (editingId !== null) {
                await api.put(`/categories/${editingId}`, payload)
                alert('Kategori berhasil diperbarui!')
            } else {
                await api.post('/categories', payload)
                alert('Kategori berhasil ditambahkan!')
            }

            handleCloseForm()
            await fetchCategories()
        } catch (err) {
            console.error('Gagal menyimpan kategori:', err)

            if (err.response?.data?.errors) {
                const validationErrors = Object.values(
                    err.response.data.errors
                ).flat()

                alert(validationErrors.join('\n'))
            } else {
                alert(
                    err.response?.data?.message ||
                    'Gagal menyimpan kategori.'
                )
            }
        } finally {
            setSaving(false)
        }
    }

    // Tampilan loading
    if (loading) {
        return (
            <div className="page-message">
                <RefreshCw size={20} className="loading-icon" />
                <span>Memuat data kategori...</span>
            </div>
        )
    }

    // Tampilan error
    if (error) {
        return (
            <div className="page-message error-message">
                <p>{error}</p>

                <button
                    type="button"
                    className="add-button"
                    onClick={async () => {
                        setLoading(true)
                        await fetchCategories()
                        setLoading(false)
                    }}
                >
                    <RefreshCw size={16} />
                    Coba Lagi
                </button>
            </div>
        )
    }

    return (
        <div className="category-page">
            {/* Header halaman */}
            <header className="page-header">
                <div>
                    <span className="page-label">
                        MANAJEMEN INVENTARIS
                    </span>

                    <h1>Daftar Kategori</h1>

                    <p>
                        Kelola dan kelompokkan produk inventaris GudangKu.
                    </p>
                </div>

                <button
                    type="button"
                    className="add-button"
                    onClick={handleAdd}
                >
                    <Plus size={18} />
                    <span>Tambah Kategori</span>
                </button>
            </header>
            {/* Form tambah dan edit */}
            {showForm && (
                <section className="form-container category-form">
                    <div className="category-form-heading">
                        <div>
                            <h2>
                                {editingId !== null
                                    ? 'Edit Kategori'
                                    : 'Tambah Kategori Baru'}
                            </h2>

                            <p>
                                Lengkapi informasi kategori produk.
                            </p>
                        </div>
                    </div>

                    <form onSubmit={handleSubmit}>
                        <div className="form-group">
                            <label htmlFor="category-name">
                                Nama Kategori
                            </label>

                            <input
                                type="text"
                                id="category-name"
                                name="name"
                                value={formData.name}
                                onChange={handleInputChange}
                                placeholder="Contoh: Elektronik"
                                required
                            />
                        </div>

                        <div className="form-group">
                            <label htmlFor="category-description">
                                Deskripsi
                            </label>

                            <textarea
                                id="category-description"
                                name="description"
                                value={formData.description}
                                onChange={handleInputChange}
                                rows="3"
                                placeholder="Tuliskan deskripsi kategori..."
                            />
                        </div>

                        <div className="form-actions">
                            <button
                                type="submit"
                                className="save-button"
                                disabled={saving}
                            >
                                {saving
                                    ? 'Menyimpan...'
                                    : editingId !== null
                                        ? 'Perbarui Kategori'
                                        : 'Simpan Kategori'}
                            </button>

                            <button
                                type="button"
                                className="close-button"
                                onClick={handleCloseForm}
                                disabled={saving}
                            >
                                Batal
                            </button>
                        </div>
                    </form>
                </section>
            )}

            {/* Tabel kategori */}
            <section className="category-table-section">

                {/* <div className="category-table-heading">
                    <h2>Daftar Kategori</h2>
                    <span className="category-count">
                        {categories.length} kategori
                    </span>
                </div> */}
                <p className="product-count">
                    Menampilkan <strong>{categories.length}</strong> kategori
                </p>
                <div className="table-container">
                    <table className="product-table category-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            {categories.length > 0 ? (
                                categories.map((category, index) => (
                                    <tr key={category.id}>
                                        <td>{index + 1}</td>

                                        <td>
                                            <strong className="category-name">
                                                {category.name}
                                            </strong>
                                        </td>

                                        <td className="category-description">
                                            {category.description || '-'}
                                        </td>

                                        <td>
                                            <div className="action-buttons">
                                                <Link
                                                    className="detail-button"
                                                    to={`/categories/${category.id}`}
                                                    title="Lihat detail"
                                                >
                                                    <Eye size={15} />
                                                    Detail
                                                </Link>

                                                <button
                                                    type="button"
                                                    className="edit-button"
                                                    onClick={() =>
                                                        handleEdit(category)
                                                    }
                                                    title="Edit kategori"
                                                >
                                                    <Pencil size={15} />
                                                    Edit
                                                </button>

                                                <button
                                                    type="button"
                                                    className="delete-button"
                                                    onClick={() =>
                                                        handleDelete(category.id)
                                                    }
                                                    title="Hapus kategori"
                                                >
                                                    <Trash2 size={15} />
                                                    Hapus
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                ))
                            ) : (
                                <tr>
                                    <td
                                        colSpan="4"
                                        className="empty-category"
                                    >
                                        Belum ada kategori. Silakan tambahkan
                                        kategori baru.
                                    </td>
                                </tr>
                            )}
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    )
}

export default Categories