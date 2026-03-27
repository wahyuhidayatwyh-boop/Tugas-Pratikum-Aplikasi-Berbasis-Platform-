const express = require('express');
const app = express();
const PORT = 3000;

// Middleware
app.use(express.json());
app.use(express.urlencoded({ extended: true }));
app.use(express.static('public')); // Menyajikan file statis dari folder 'public'

// Dummy Database (Data awal)
let users = [
    { id: 1, nama: "Budi Santoso", email: "budi@example.com", divisi: "IT" },
    { id: 2, nama: "Siti Aminah", email: "siti@example.com", divisi: "HRD" }
];

// --- ENDPOINT API (CRUD) ---

// READ: Ambil semua data (Format JSON untuk Datatable)
app.get('/api/users', (req, res) => {
    res.json(users);
});

// READ: Ambil 1 data berdasarkan ID (Untuk Edit)
app.get('/api/users/:id', (req, res) => {
    const user = users.find(u => u.id === parseInt(req.params.id));
    if (user) res.json(user);
    else res.status(404).json({ message: "Data tidak ditemukan" });
});

// CREATE: Tambah data baru
app.post('/api/users', (req, res) => {
    const newUser = {
        id: users.length > 0 ? users[users.length - 1].id + 1 : 1,
        nama: req.body.nama,
        email: req.body.email,
        divisi: req.body.divisi
    };
    users.push(newUser);
    res.json({ message: "Data berhasil ditambahkan!", data: newUser });
});

// UPDATE: Edit data
app.put('/api/users/:id', (req, res) => {
    const index = users.findIndex(u => u.id === parseInt(req.params.id));
    if (index !== -1) {
        users[index] = { ...users[index], ...req.body };
        res.json({ message: "Data berhasil diupdate!" });
    } else {
        res.status(404).json({ message: "Data tidak ditemukan" });
    }
});

// DELETE: Hapus data
app.delete('/api/users/:id', (req, res) => {
    users = users.filter(u => u.id !== parseInt(req.params.id));
    res.json({ message: "Data berhasil dihapus!" });
});

// Jalankan Server
app.listen(PORT, () => {
    console.log(`Server berjalan di http://localhost:${PORT}`);
});