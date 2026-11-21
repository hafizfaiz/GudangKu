import { useEffect, useState } from 'react'
import {
  NavLink,
  Routes,
  Route,
  Navigate,
  useLocation,
  useNavigate,
} from 'react-router-dom'
import Users from './pages/Users'
import api from './services/api'
import Products from './pages/Products'
import Categories from './pages/Categories'
import CategoryDetail from './pages/CategoryDetail'
import Reports from './pages/Reports'
import Login from './pages/Login'
import Register from './pages/Register'

import './App.css'

function Dashboard() {
  const [dashboard, setDashboard] = useState(null)
  const [loading, setLoading] = useState(true)
  const [error, setError] = useState('')

  useEffect(() => {
    const fetchDashboard = async () => {
      try {
        const response = await api.get('/dashboard')
        setDashboard(response.data.data)
      } catch (error) {
        console.error('Gagal mengambil data dashboard:', error)
        setError('Gagal mengambil data dashboard dari server.')
      } finally {
        setLoading(false)
      }
    }

    fetchDashboard()
  }, [])

  if (loading) return <p>Memuat data dashboard...</p>
  if (error) return <p>{error}</p>

  return (
    <>
      <header>
        <h1>Dashboard</h1>
        <p>Selamat datang di sistem manajemen inventaris GudangKu.</p>
      </header>

      <section className="dashboard-cards">
        <div className="card">
          <h3>Total Produk</h3>
          <p>{dashboard.total_products}</p>
        </div>

        <div className="card">
          <h3>Total Kategori</h3>
          <p>{dashboard.total_categories}</p>
        </div>

        <div className="card">
          <h3>Total Stok</h3>
          <p>{dashboard.total_stock}</p>
        </div>

        <div className="card">
          <h3>Stok Rendah</h3>
          <p>{dashboard.total_low_stock_products}</p>
        </div>

        <div className="card">
          <h3>Nilai Inventaris</h3>
          <p>
            {new Intl.NumberFormat('id-ID', {
              style: 'currency',
              currency: 'IDR',
              maximumFractionDigits: 0,
            }).format(Number(dashboard.inventory_value))}
          </p>
        </div>
      </section>
    </>
  )
}

function App() {
  const location = useLocation()
  const navigate = useNavigate()

  const [isAuthenticated, setIsAuthenticated] = useState(
    Boolean(localStorage.getItem('token'))
  )

  const [user, setUser] = useState(
    JSON.parse(localStorage.getItem('user') || 'null')
  )

  const handleLogout = async () => {
    try {
      await api.post('/logout')
    } catch (error) {
      console.error('Logout gagal di server:', error)
    } finally {
      localStorage.removeItem('token')
      localStorage.removeItem('user')
      setIsAuthenticated(false)
      setUser(null)
      navigate('/login')
    }
  }

  return (
    <Routes location={location}>
      <Route
        path="/login"
        element={
          isAuthenticated
            ? <Navigate to="/" replace />
            : <Login
                setIsAuthenticated={setIsAuthenticated}
                setUser={setUser}
              />
        }
      />

      <Route
        path="/register"
        element={
          isAuthenticated
            ? <Navigate to="/" replace />
            : <Register />
        }
      />

      <Route
        path="*"
        element={
          !isAuthenticated ? (
            <Navigate to="/login" replace />
          ) : (
            <div className="app">
              <aside className="sidebar">
                <h2>GudangKu</h2>
                <p>Inventory Management</p>
                {user && (
                  <div className="user-info">
                    <p>{user.name}</p>
                    <small>Role: {user.role}</small>
                  </div>
                )}
                <nav>
                  <NavLink to="/" end>
                    Dashboard
                  </NavLink>

                  <NavLink to="/products">
                    Produk
                  </NavLink>

                  <NavLink to="/categories">
                    Kategori
                  </NavLink>

                  <NavLink to="/reports">
                    Laporan
                  </NavLink>
                  {user?.role === 'admin' && (
                    <NavLink to="/users">
                      Manajemen Pengguna
                    </NavLink>
                  )}
                  <button
                    onClick={handleLogout}
                    className="logout-button"
                  >
                    Logout
                  </button>
                </nav>
              </aside>

              <main className="main-content">
                <Routes>
                  <Route path="/" element={<Dashboard />} />
                  <Route path="/products" element={<Products />} />
                  <Route path="/categories" element={<Categories />} />
                  <Route
                    path="/categories/:id"
                    element={<CategoryDetail />}
                  />
                  <Route path="/reports" element={<Reports />} />
                  <Route
                    path="/users"
                    element={
                      user?.role === 'admin'
                        ? <Users />
                        : <Navigate to="/" replace />
                    }
                  />
                  <Route
                    path="*"
                    element={<h1>Halaman tidak ditemukan</h1>}
                  />
                </Routes>
              </main>
            </div>
          )
        }
      />
    </Routes>
  )
}

export default App