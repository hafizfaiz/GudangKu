import { useState } from 'react'
import { useNavigate, Link } from 'react-router-dom'
import api from '../services/api'

function Register() {
    const [name, setName] = useState('')
    const [email, setEmail] = useState('')
    const [password, setPassword] = useState('')
    const [error, setError] = useState('')
    const [loading, setLoading] = useState(false)

    const navigate = useNavigate()

    const handleRegister = async (e) => {
    e.preventDefault()
    setLoading(true)
    setError('')

    try {
        await api.post('/register', {
        name,
        email,
        password,
        })

        navigate('/login')
    } catch (error) {
        setError(
        error.response?.data?.message ||
        'Registrasi gagal. Silakan coba lagi.'
        )
    } finally {
        setLoading(false)
    }
    }

    return (
    <div className="screen">
    <div className="form-container-auth">
        <h1>GudangKu</h1>
        <h2>Registrasi</h2>

        {error && <p style={{ color: 'red' }}>{error}</p>}

        <form onSubmit={handleRegister}>
        <div className="form-group">
            <label>Nama Lengkap</label>
            <input
            type="text"
            value={name}
            onChange={(e) => setName(e.target.value)}
            placeholder="Masukkan nama lengkap"
            required
            />
        </div>

        <div className="form-group">
            <label>Email</label>
            <input
            type="email"
            value={email}
            onChange={(e) => setEmail(e.target.value)}
            placeholder="Masukkan email"
            required
            />
        </div>

        <div className="form-group">
            <label>Password</label>
            <input
            type="password"
            value={password}
            onChange={(e) => setPassword(e.target.value)}
            placeholder="Minimal 8 karakter"
            minLength={8}
            required
            />
        </div>

        <button
            type="submit"
            className="save-button"
            disabled={loading}
        >
            {loading ? 'Memproses...' : 'Daftar'}
        </button>
        </form>

        <p>
        Sudah punya akun? <Link to="/login">Masuk</Link>
        </p>
    </div>
    </div>
    )
}

export default Register