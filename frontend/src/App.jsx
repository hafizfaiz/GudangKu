import { useEffect, useState } from 'react'
import {
  Package,
  Layers,
  Boxes,
  AlertTriangle,
  Wallet,
  LayoutDashboard,
  ClipboardList,
  FileBarChart,
  Users as UsersIcon,
  LogOut,
} from 'lucide-react'
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
      <header className="dashboard-header">
        <div>
          <span className="dashboard-label">OVERVIEW INVENTARIS</span>
          <h1>Dashboard</h1>
          <p>Selamat datang di GudangKu. Berikut ringkasan inventaris Anda.</p>
        </div>
      </header>
      <section className="dashboard-cards">
        <div className="card">
          <div className="card-icon">
            <Package size={22} />
          </div>
          <h3>Total Produk</h3>
          <p>{dashboard.total_products}</p>
          <span className="card-caption">Produk terdaftar</span>
        </div>
        <div className="card">
          <div className="card-icon">
            <Layers size={22} />
          </div>
          <h3>Total Kategori</h3>
          <p>{dashboard.total_categories}</p>
          <span className="card-caption">Kategori produk</span>
        </div>
        <div className="card">
          <div className="card-icon">
            <Boxes size={22} />
          </div>
          <h3>Total Stok</h3>
          <p>{dashboard.total_stock}</p>
          <span className="card-caption">Unit tersedia</span>
        </div>
        <div className="card">
          <div className="card-icon">
            <AlertTriangle size={22} />
          </div>
          <h3>Stok Rendah</h3>
          <p>{dashboard.total_low_stock_products}</p>
          <span className="card-caption">Produk perlu diperhatikan</span>
        </div>
        <div className="card">
          <div className="card-icon">
            <Wallet size={22} />
          </div>
          <h3>Nilai Inventaris</h3>
          <p>
            {new Intl.NumberFormat('id-ID', {
              style: 'currency',
              currency: 'IDR',
              maximumFractionDigits: 0,
            }).format(Number(dashboard.inventory_value))}
          </p>
          <span className="card-caption">Berdasarkan harga beli</span>
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
                <div className="sidebar-brand">
                  <div className="brand-icon">
                    <Boxes size={25} />
                  </div>
                  <div>
                    <h2>GudangKu</h2>
                    <p>Inventory Management</p>
                  </div>
                </div>
                {user && (
                  <div className="user-info">
                    <p>{user.name}</p>
                    <small>Role: {user.role}</small>
                    <hr />
                  </div>
                )}
              <nav>
                <NavLink to="/" end>
                  <LayoutDashboard size={18} />
                  <span>Dashboard</span>
                </NavLink>

                <NavLink to="/products">
                  <Package size={18} />
                  <span>Produk</span>
                </NavLink>

                <NavLink to="/categories">
                  <ClipboardList size={18} />
                  <span>Kategori</span>
                </NavLink>

                <NavLink to="/reports">
                  <FileBarChart size={18} />
                  <span>Laporan</span>
                </NavLink>

                {user?.role === 'admin' && (
                  <NavLink to="/users">
                    <UsersIcon size={18} />
                    <span>Manajemen Pengguna</span>
                  </NavLink>
                )}

                <button
                  className="logout-button"
                  onClick={handleLogout}
                >
                  <LogOut size={18} />
                  <span>Logout</span>
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