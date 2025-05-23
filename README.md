# TP10DPBO2025C1
Saya Nina Wulandari dengan NIM 2312091 mengerjakan Tugas Praktikum 10 dalam mata kuliah DPBO untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin

# Fashion Store Management System

Aplikasi ini merupakan sistem manajemen sederhana untuk toko fashion berbasis web, yang menerapkan pola arsitektur Model-View-ViewModel (MVVM). Sistem ini dapat digunakan untuk mengelola data kategori produk, produk pakaian, dan riwayat penjualan.

# Struktur Database
![image](https://github.com/user-attachments/assets/be18c35b-78bc-47e8-ba7c-0aec2dd842ce)
Database bernama fashion_store memiliki tiga tabel utama:

### 1. categories
Menyimpan informasi kategori produk fashion.
- id (INT, PK, AUTO_INCREMENT): ID kategori unik.
- name (VARCHAR): Nama kategori.

### 2. products
Menyimpan informasi produk pakaian.
- id (INT, PK, AUTO_INCREMENT): ID produk unik.
- name (VARCHAR): Nama produk.
- category_id (INT): Relasi ke kategori (categories.id).
- price (DECIMAL): Harga produk.
- stock (INT): Stok produk.

### 3. sales
Menyimpan riwayat penjualan produk.
- id (INT, PK, AUTO_INCREMENT): ID penjualan unik.
- product_id (INT): Relasi ke produk (products.id).
- quantity (INT): Jumlah produk terjual.
- sale_date (DATE): Tanggal penjualan.


# Struktur Folder & File

### config/
- Database.php: Kelas koneksi ke database menggunakan PDO.

### database/
- fashion_store.sql: Skrip SQL untuk membuat database dan tabel.

### model/
Berisi representasi objek dan fungsionalitas database:
- Category.php: Model kategori, berisi operasi database untuk kategori.
- Product.php: Model produk.
- Sale.php: Model penjualan.

### viewmodel/
Menjembatani antara model dan view, menangani logika data:
- CategoryViewModel.php: Menangani input/output kategori.
- ProductViewModel.php: Menangani input/output produk.
- SaleViewModel.php: Menangani input/output penjualan.

### views/
Berisi tampilan HTML dan antarmuka pengguna:
- category_list.php, category_form.php: Menampilkan dan mengelola data kategori.
- product_list.php, product_form.php: Menampilkan dan mengelola data produk.
- sale_list.php, sale_form.php: Menampilkan dan mengelola data penjualan.

#### template/
- header.php, footer.php: Template umum untuk layout halaman.


index.php: Halaman awal aplikasi.


#  Alur Program
Program dapat  melakukan CRUD untuk semua tabel dengan alur:
### 1. Menampilkan Data
- File view seperti product_list.php akan memanggil ViewModel (ProductViewModel) untuk mengambil semua data.
- Data yang dikembalikan akan ditampilkan dengan loop (mis. foreach) pada HTML tabel.

### 2. Menambahkan Data
- Saat pengguna klik "Tambah", view akan menampilkan form (product_form.php) yang memanggil ViewModel untuk mengambil data pendukung (seperti kategori).
- Setelah form dikirim, data akan diproses melalui ViewModel, lalu diteruskan ke Model untuk disimpan ke database.

### 3. Mengedit Data
- View akan memanggil ViewModel untuk mendapatkan data produk berdasarkan ID.
- Data ditampilkan dalam form untuk diedit.
- Setelah dikirim, ViewModel memperbarui data melalui Model.

### 4. Menghapus Data
- Aksi hapus akan mengarahkan ke method delete di ViewModel.
- ViewModel kemudian memanggil Model untuk menghapus data dari database.


# Data Binding (View ↔ ViewModel)

Dalam sistem ini, data binding dilakukan secara manual melalui PHP, dengan alur sebagai berikut:

1. View (*.php) akan membuat instance dari ViewModel (mis. ProductViewModel).
2. ViewModel mengambil data dari Model (Product, Category, Sale).
3. Data disalurkan kembali ke View dalam bentuk array.
4. View menggunakan struktur PHP (foreach, echo) untuk menampilkan data ke HTML.

# Dokumentasi Program
https://github.com/user-attachments/assets/7617dd0c-8258-48cb-aaae-c5cba3faa128


