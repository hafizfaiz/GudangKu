import { useState } from 'react'
import { useNavigate, Link } from 'react-router-dom'
import api from '../services/api'

function Login({ setIsAuthenticated, setUser }) {
    const [email, setEmail] = useState('')
    const [password, setPassword] = useState('')
    const [error, setError] = useState('')
    const [loading, setLoading] = useState(false)

    const navigate = useNavigate()

    const handleLogin = async (e) => {
        e.preventDefault()
        setLoading(true)
        setError('')

        try {
            const response = await api.post('/login', {
                email,
                password,
            })

            localStorage.setItem('token', response.data.data.token)
            localStorage.setItem('user', JSON.stringify(response.data.data.user))

            setUser(response.data.data.user)
            setIsAuthenticated(true)
            navigate('/')
        } catch (error) {
            console.error('Login gagal:', error)
            setError(
                error.response?.data?.message || 'Email atau password salah.'
            )
        } finally {
            setLoading(false)
        }
    }

    return (
        <div className="screen">
            <div className="form-container-auth">
                <h1>GudangKu</h1>
                <h2>Masuk</h2>

                {error && <p style={{ color: 'red' }}>{error}</p>}

                <form onSubmit={handleLogin}>
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
                            placeholder="Masukkan password"
                            required
                        />
                    </div>

                    <button type="submit" className="save-button" disabled={loading}>
                        {loading ? 'Memproses...' : 'Masuk'}
                    </button>
                </form>
                        <p>
                            Belum punya akun? <Link to="/register">Daftar</Link>
                        </p>
            </div>
        </div>

    )
}

export default Login