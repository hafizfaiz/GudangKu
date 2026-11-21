import { useEffect, useState } from 'react'
import { Link } from 'react-router-dom'
import api from '../services/api'

function Categories() {
    const [categories, setCategories] = useState([])
    const [loading, setLoading] = useState(true)
    const [error, setError] = useState('')
    const [showForm, setShowForm] = useState(false)
    const [formData, setFormData] = useState({
        name: '',
        description: '',
    })
    const [editingId, setEditingId] = useState(null)
    const handleInputChange = (e) => {
    const { name, value } = e.target

        setFormData((prevData) => ({
            ...prevData,
            [name]: value,
        }))
    }
    const handleEdit = (category) => {
        setEditingId(category.id)
        setFormData({
            name: category.name,
            description: category.description || '',
        })
        setShowForm(true)
    }
    const handleDelete = async (id) => {
    const confirmed = window.confirm(
        'Apakah kamu yakin ingin menghapus kategori ini?'
    )
        if (!confirmed) return
        try {
            await api.delete(`/categories/${id}`)
            alert('Kategori berhasil dihapus!')
            const updatedCategories = await api.get('/categories')
            setCategories(updatedCategories.data.data.data)
        } catch (error) {
            console.error('Gagal menghapus kategori:', error)
            alert(
                error.response?.data?.message ||
                'Gagal menghapus kategori.'
            )
        }
    }
    const handleSubmit = async (e) => {
        e.preventDefault()

    try {
        if (editingId) {
            await api.put(`/categories/${editingId}`, formData)
            alert('Kategori berhasil diperbarui!')
        } else {
            await api.post('/categories', formData)
            alert('Kategori berhasil ditambahkan!')
        }

        setFormData({
            name: '',
            description: '',
        })

        setEditingId(null)
        setShowForm(false)

            const updatedCategories = await api.get('/categories')
            setCategories(updatedCategories.data.data.data)

        } catch (error) {
            console.error('Gagal menambahkan kategori:', error)

            if (error.response?.data?.errors) {
                const validationErrors = Object.values(
                    error.response.data.errors
                ).flat()

                alert(validationErrors.join('\n'))
            } else {
                alert(
                    error.response?.data?.message ||
                    'Gagal menambahkan kategori.'
                )
            }
        }
}
    useEffect(() => {
    const fetchCategories = async () => {
        try {
        const response = await api.get('/categories')
        setCategories(response.data.data.data)
        } catch (error) {
        console.error('Gagal mengambil kategori:', error)
        setError('Gagal mengambil data kategori dari server.')
        } finally {
            setLoading(false)
        }
    }

    fetchCategories()
    }, [])

    if (loading) return <p>Memuat data kategori...</p>
    if (error) return <p>{error}</p>

    return (
    <>
        <header>
        <h1>Daftar Kategori</h1>
        <p>Kelola kategori produk inventaris GudangKu.</p>
        </header>

        <p>Total kategori: {categories.length}</p>
        <button
            type="button"
            className="add-button"
            onClick={() => {
                setEditingId(null)
                setFormData({
                    name: '',
                    description: '',
                })
                setShowForm(true)
            }}
        >
            + Tambah Kategori
        </button>
        {showForm && (
            <div className="form-container">
                <h2>{editingId ? 'Edit Kategori' : 'Tambah Kategori Baru'}</h2>
                <form onSubmit={handleSubmit}>
                    <div className="form-group">
                        <label>Nama Kategori</label>
                        <input
                            type="text"
                            name="name"
                            value={formData.name}
                            onChange={handleInputChange}
                            placeholder="Masukkan nama kategori"
                        />
                    </div>

                    <div className="form-group">
                        <label>Deskripsi</label>
                        <textarea
                            name="description"
                            value={formData.description}
                            onChange={handleInputChange}
                            rows="3"
                            placeholder="Masukkan deskripsi kategori"
                        />
                    </div>

                    <div className="form-actions">
                        <button type="submit" className="save-button">
                            {editingId ? 'Perbarui Kategori' : 'Simpan Kategori'}
                        </button>

                        <button
                            type="button"
                            className="close-button"
                            onClick={() => {
                            setShowForm(false)
                            setEditingId(null)
                            setFormData({
                                name: '',
                                description: '',
                            })
                        }}
                        >
                            Tutup
                        </button>
                    </div>
                </form>
            </div>
        )}
        <div className="table-container">
        <table className="product-table">
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
                    <td>{category.name}</td>
                    <td>{category.description || '-'}</td>
                    <td>
                        <div className="action-buttons">
                            <Link to={`/categories/${category.id}`}>
                                Detail
                            </Link>
                            <button type="button" onClick={() => handleEdit(category)}>
                                Edit
                            </button>
                            <button type="button" onClick={() => handleDelete(category.id)}>
                                Hapus
                            </button>
                        </div>
                    </td>
                </tr>
                ))
            ) : (
                <tr>
                <td colSpan="4" style={{ textAlign: 'center' }}>
                    Belum ada kategori.
                </td>
                </tr>
            )}
            </tbody>
        </table>
        </div>
    </>
    )
}

export default Categories