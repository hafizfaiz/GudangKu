import { useEffect, useState } from 'react'
import api from '../services/api'

function Users() {
    const [users, setUsers] = useState([])
    const [loading, setLoading] = useState(true)
    const [isSubmitting, setIsSubmitting] = useState(false)
    const [error, setError] = useState('')
    const [validationErrors, setValidationErrors] = useState({})
    const [showForm, setShowForm] = useState(false)
    const [editingId, setEditingId] = useState(null)
    const [selectedUser, setSelectedUser] = useState(null)
        useEffect(() => {
            const handleEscape = (event) => {
                if (event.key === 'Escape') {
                    setSelectedUser(null)
                }
            }

            window.addEventListener('keydown', handleEscape)

            return () => {
                window.removeEventListener('keydown', handleEscape)
            }
        }, [])
    const [formData, setFormData] = useState({
        name: '',
        email: '',
        password: '',
        role: 'staff',
    })

    const fetchUsers = async () => {
        try {
            const response = await api.get('/users')
            setUsers(response.data.data)
            setError('')
        } catch (error) {
            console.error('Gagal mengambil pengguna:', error)
            setError(
                error.response?.data?.message ||
                'Gagal mengambil data pengguna.'
            )
        } finally {
            setLoading(false)
        }
    }

    useEffect(() => {
        let isMounted = true

        const fetchUsers = async () => {
            try {
                const response = await api.get('/users')

                if (isMounted) {
                    setUsers(response.data.data)
                    setError('')
                }
            } catch (error) {
                console.error('Gagal mengambil pengguna:', error)

                if (isMounted) {
                    setError(
                        error.response?.data?.message ||
                        'Gagal mengambil data pengguna.'
                    )
                }
            } finally {
                if (isMounted) {
                    setLoading(false)
                }
            }
        }

        fetchUsers()

        return () => {
            isMounted = false
        }
    }, [])

    const handleInputChange = (e) => {
        const { name, value } = e.target

        setFormData((prevData) => ({
            ...prevData,
            [name]: value,
        }))

        setValidationErrors((prevErrors) => ({
            ...prevErrors,
            [name]: [],
        }))
    }

    const resetForm = () => {
        setFormData({
            name: '',
            email: '',
            password: '',
            role: 'staff',
        })

        setValidationErrors({})
        setEditingId(null)
        setShowForm(false)
    }

    const handleEdit = (user) => {
        setEditingId(user.id)
        setFormData({
            name: user.name,
            email: user.email,
            password: '',
            role: user.role,
        })
        setShowForm(true)
    }

    const handleDetail = async (id) => {
        try {
            const response = await api.get(`/users/${id}`)
            setSelectedUser(response.data.data)
        } catch (error) {
            console.error('Gagal mengambil detail pengguna:', error)
            alert(
                error.response?.data?.message ||
                'Gagal mengambil detail pengguna.'
            )
        }
    }
    const handleSubmit = async (e) => {
        e.preventDefault()
        setValidationErrors({})
        setIsSubmitting(true)

        const payload = { ...formData }

        if (editingId && !payload.password) {
            delete payload.password
        }

        try {
            if (editingId) {
                await api.put(`/users/${editingId}`, payload)
                alert('Pengguna berhasil diperbarui!')
            } else {
                await api.post('/users', payload)
                alert('Pengguna berhasil ditambahkan!')
            }

            await fetchUsers()
            resetForm()
        } catch (error) {
            console.error('Gagal menyimpan pengguna:', error)

            if (error.response?.data?.errors) {
                setValidationErrors(error.response.data.errors)
            } else {
                alert(
                    error.response?.data?.message ||
                    'Gagal menyimpan pengguna.'
                )
            }
        } finally {
            setIsSubmitting(false)
        }
    }

    const handleDelete = async (id) => {
        const confirmed = window.confirm(
            'Apakah kamu yakin ingin menghapus pengguna ini?'
        )

        if (!confirmed) return

        try {
            await api.delete(`/users/${id}`)
            alert('Pengguna berhasil dihapus!')
            await fetchUsers()
        } catch (error) {
            console.error('Gagal menghapus pengguna:', error)
            alert(
                error.response?.data?.message ||
                'Gagal menghapus pengguna.'
            )
        }
    }

    if (loading) return <p>Memuat data pengguna...</p>
    if (error) return <p>{error}</p>

    return (
        <>
            <header>
                <h1>Manajemen Pengguna</h1>
                <p>Kelola akun Admin dan Staff GudangKu.</p>
            </header>

            <p>Total pengguna: {users.length}</p>

            <button
                type="button"
                className="add-button"
                onClick={() => {
                    resetForm()
                    setShowForm(true)
                }}
            >
                + Tambah Pengguna
            </button>

            {showForm && (
                <div className="form-container">
                    <h2>
                        {editingId ? 'Edit Pengguna' : 'Tambah Pengguna Baru'}
                    </h2>
                    <form onSubmit={handleSubmit} noValidate >
                        <div className="form-group">
                            <label>Nama</label>
                            <input
                                type="text"
                                name="name"
                                value={formData.name}
                                onChange={handleInputChange}
                                placeholder="Masukkan nama"
                                required
                            />
                            {validationErrors.name && (
                                <small className="field-error">
                                    {validationErrors.name[0]}
                                </small>
                            )}
                        </div>

                        <div className="form-group">
                            <label>Email</label>
                                <input
                                    type="email"
                                    name="email"
                                    value={formData.email}
                                    onChange={handleInputChange}
                                    placeholder="Masukkan email"
                                    required
                                />
                            {validationErrors.email && (
                                <small className="field-error">
                                    {validationErrors.email[0]}
                                </small>
                            )}
                        </div>

                        <div className="form-group">
                            <label>Password {editingId && '(Kosongkan jika tidak diubah)'}</label>
                            <input
                                type="password"
                                name="password"
                                value={formData.password}
                                onChange={handleInputChange}
                                placeholder="Masukkan password"                                
                                required={!editingId}
                                minLength="8"
                            />
                            {validationErrors.password && (
                                <small className="field-error">
                                    {validationErrors.password[0]}
                                </small>
                            )}
                        </div>

                        <div className="form-group">
                            <label>Role</label>
                            <select
                                name="role"
                                value={formData.role}
                                onChange={handleInputChange}
                                required
                            >
                                <option value="admin">Admin</option>
                                <option value="staff">Staff</option>
                            </select>
                            {validationErrors.role && (
                                <small className="field-error">
                                    {validationErrors.role[0]}
                                </small>
                            )}
                        </div>

                        <div className="form-actions">
                            <button
                                type="submit"
                                className="save-button"
                                disabled={isSubmitting}
                            >
                                {isSubmitting
                                    ? 'Menyimpan...'
                                    : editingId
                                        ? 'Perbarui Pengguna'
                                        : 'Simpan Pengguna'}
                            </button>
                            <button
                                type="button"
                                className="close-button"
                                onClick={resetForm}
                                disabled={isSubmitting}
                            >
                                Tutup
                            </button>
                        </div>
                    </form>
                </div>
            )}
            {selectedUser && (
                    <div
                        className="modal-overlay"
                        onClick={() => setSelectedUser(null)}
                    >
                    <div
                        className="modal-content"
                        onClick={(event) => event.stopPropagation()}
                    >
                    <h2>Detail Pengguna</h2>

                    <div className="form-group">
                        <label>Nama</label>
                        <p>{selectedUser.name}</p>
                    </div>

                    <div className="form-group">
                        <label>Email</label>
                        <p>{selectedUser.email}</p>
                    </div>

                    <div className="form-group">
                        <label>Role</label>
                        <p>{selectedUser.role}</p>
                    </div>

                    <div className="form-group">
                        <label>Tanggal Dibuat</label>
                        <p>
                            {new Date(selectedUser.created_at).toLocaleString('id-ID')}
                        </p>
                    </div>
                    <button
                        type="button"
                        className="close-button"
                        onClick={() => setSelectedUser(null)}
                    >
                        Tutup
                    </button>
                </div>
            </div>
            )}
            <div className="table-container">
                <table className="product-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        {users.length > 0 ? (
                            users.map((user, index) => (
                                <tr key={user.id}>
                                    <td>{index + 1}</td>
                                    <td>{user.name}</td>
                                    <td>{user.email}</td>
                                    <td>{user.role}</td>
                                    <td>
                                        <div className="action-buttons">
                                            <button
                                                className="detail-button"
                                                type="button"
                                                onClick={() => handleDetail(user.id)}
                                            >
                                                Detail
                                            </button>

                                            <button
                                                className="edit-button"
                                                type="button"
                                                onClick={() => handleEdit(user)}
                                            >
                                                Edit
                                            </button>

                                            <button
                                                className="delete-button"
                                                type="button"
                                                onClick={() => handleDelete(user.id)}
                                            >
                                                Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            ))
                        ) : (
                            <tr>
                                <td colSpan="5" style={{ textAlign: 'center' }}>
                                    Belum ada pengguna.
                                </td>
                            </tr>
                        )}
                    </tbody>
                </table>
            </div>
        </>
    )
}

export default Users