import { useEffect, useState } from 'react'
import { Link } from 'react-router-dom'
import api from '../services/api'

function Reports() {
    const [report, setReport] = useState(null)
    const [loading, setLoading] = useState(true)
    const [error, setError] = useState('')
    const [lastUpdated, setLastUpdated] = useState(null)
    const [refreshing, setRefreshing] = useState(false)
    const handleRefresh = async () => {
        setRefreshing(true)
        setError('')

        try {
            const response = await api.get('/dashboard')
            setReport(response.data.data)
            setLastUpdated(new Date())
        } catch (error) {
            console.error('Gagal memperbarui laporan:', error)
            setError('Gagal memperbarui data laporan.')
        } finally {
            setRefreshing(false)
        }
    }
    const handleExport = async () => {
        try {
            const response = await api.get('/products/export', {
                responseType: 'blob',
            })

            const url = window.URL.createObjectURL(
                new Blob([response.data])
            )

            const link = document.createElement('a')
            link.href = url
            link.setAttribute(
                'download',
                'laporan-produk-gudangku.xlsx'
            )

            document.body.appendChild(link)
            link.click()
            link.remove()

            window.URL.revokeObjectURL(url)
        } catch (error) {
            console.error('Gagal mengunduh laporan Excel:', error)
            alert('Gagal mengunduh laporan Excel.')
        }
    }
    useEffect(() => {
        const fetchReport = async () => {
            try {
                const response = await api.get('/dashboard')
                setReport(response.data.data)
                setLastUpdated(new Date())
            } catch (error) {
                console.error('Gagal mengambil laporan:', error)
                setError('Gagal mengambil data laporan.')
            } finally {
                setLoading(false)
            }
        }

        fetchReport()
    }, [])

    if (loading) return <p>Memuat laporan...</p>
    if (error) return <p>{error}</p>

    return (
        <>
            <header>
                <h1>Laporan Inventaris</h1>
                <p>Ringkasan laporan inventaris GudangKu.</p>
                <div className="report-actions">
                    <button
                        type="button"
                        className="add-button"
                        onClick={handleRefresh}
                        disabled={refreshing}
                    >
                        {refreshing ? 'Memperbarui...' : 'Perbarui Laporan'}
                    </button>

                    <button
                        type="button"
                        className="export-button"
                        onClick={handleExport}
                    >
                        Export Excel
                    </button>
                </div>
                <p>
                    Terakhir diperbarui:{' '}
                    {lastUpdated
                        ? new Intl.DateTimeFormat('id-ID', {
                            dateStyle: 'long',
                            timeStyle: 'short',
                        }).format(lastUpdated)
                        : '-'}
                </p>
            </header>

            <section className="dashboard-cards">
                <div className="card">
                    <h3>Total Produk</h3>
                    <p>{report.total_products}</p>
                </div>

                <div className="card">
                    <h3>Total Kategori</h3>
                    <p>{report.total_categories}</p>
                </div>

                <div className="card">
                    <h3>Total Stok</h3>
                    <p>{report.total_stock}</p>
                </div>

                <div className="card">
                    <h3>Produk Stok Rendah</h3>
                    <p>{report.total_low_stock_products}</p>
                        <Link to="/products?lowStock=true">
                            Lihat Daftar Produk
                        </Link>
                </div>

                <div className="card">
                    <h3>Nilai Inventaris</h3>
                    <p>
                        {new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR',
                            maximumFractionDigits: 0,
                        }).format(Number(report.inventory_value))}
                    </p>
                </div>
            </section>

            <section className="reports-table">
                <h2>Daftar Produk Stok Rendah</h2>
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
                            </tr>
                        </thead>
                        <tbody>
                            {report.low_stock_products.length > 0 ? (
                                report.low_stock_products.map((product, index) => (
                                    <tr key={product.id}>
                                        <td>{index + 1}</td>
                                        <td>{product.sku}</td>
                                        <td>{product.name}</td>
                                        <td>{product.category?.name || '-'}</td>
                                        <td>
                                            {new Intl.NumberFormat('id-ID', {
                                                style: 'currency',
                                                currency: 'IDR',
                                                maximumFractionDigits: 0,
                                            }).format(Number(product.purchase_price))}
                                        </td>
                                        <td>
                                            {new Intl.NumberFormat('id-ID', {
                                                style: 'currency',
                                                currency: 'IDR',
                                                maximumFractionDigits: 0,
                                            }).format(Number(product.selling_price))}
                                        </td>
                                        <td>{product.stock}</td>
                                        <td>{product.minimum_stock}</td>
                                    </tr>
                                ))
                            ) : (
                                <tr>
                                    <td colSpan="8" style={{ textAlign: 'center', padding: '24px' }}>
                                        Tidak ada produk dengan stok rendah.
                                    </td>
                                </tr>
                            )}
                        </tbody>
                    </table>
                </div>
            </section>
        </>
    )
}

export default Reports