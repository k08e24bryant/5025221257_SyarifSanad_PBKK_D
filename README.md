# Tugas 1

## Struktur Folder Laravel

Laravel memiliki struktur folder yang dirancang untuk memudahkan pengelolaan aplikasi dan memisahkan berbagai bagian aplikasi secara jelas. Berikut adalah penjelasan tentang struktur folder utama dalam proyek Laravel:

### `app/`

- **`Console/`**: Berisi perintah Artisan khusus yang Anda buat. Artisan adalah alat baris perintah Laravel.
- **`Exceptions/`**: Berisi handler untuk pengecualian yang terjadi dalam aplikasi Anda.
- **`Http/`**: Berisi kontroler, middleware, dan form request untuk menangani logika aplikasi berbasis HTTP.
  - **`Controllers/`**: Tempat Anda menyimpan kontroler yang menangani permintaan HTTP dan memproses logika aplikasi.
  - **`Middleware/`**: Menyimpan middleware, yang merupakan lapisan pengolahan yang dapat memodifikasi permintaan atau respons.
  - **`Requests/`**: Berisi kelas yang digunakan untuk validasi dan otorisasi data dari permintaan HTTP.
- **`Models/`**: Berisi model yang mewakili tabel di database dan berisi logika aplikasi terkait data.
- **`Providers/`**: Menyimpan penyedia layanan yang menghubungkan berbagai bagian aplikasi, seperti pendaftaran layanan dan binding dalam kontainer layanan.

### `bootstrap/`

- **`cache/`**: Berisi file cache untuk meningkatkan kinerja aplikasi, seperti cache konfigurasi dan rute.

### `config/`

- Berisi file konfigurasi aplikasi, yang memungkinkan Anda mengatur berbagai pengaturan seperti database, sesi, dan cache.

### `database/`

- **`factories/`**: Berisi definisi pabrik untuk menghasilkan data palsu untuk pengujian.
- **`migrations/`**: Berisi file migrasi untuk mengubah struktur database.
- **`seeders/`**: Berisi kelas yang digunakan untuk menyemai data awal ke dalam database.

### `public/`

- Menyediakan akses ke file publik seperti CSS, JavaScript, dan gambar. Ini adalah root dari aplikasi Anda yang diakses oleh pengguna.

### `resources/`

- **`views/`**: Berisi template Blade untuk tampilan aplikasi.
- **`lang/`**: Berisi file terjemahan untuk mendukung internasionalisasi.
- **`sass/`**: Berisi file SCSS untuk styling aplikasi (jika menggunakan Laravel Mix untuk mengkompilasi aset).

### `routes/`

- Berisi file yang mendefinisikan rute aplikasi Anda. Rute menghubungkan URL ke kontroler atau tindakan.

### `storage/`

- **`app/`**: Berisi file yang diunggah oleh pengguna dan file lainnya yang dihasilkan oleh aplikasi.
- **`framework/`**: Berisi file cache, log, dan session.
- **`logs/`**: Menyimpan log aplikasi.

### `tests/`

- Berisi file pengujian aplikasi, termasuk unit dan pengujian fitur.

### `vendor/`

- Berisi paket-paket yang diinstal melalui Composer. Ini adalah tempat pustaka pihak ketiga berada.

### `.env`

- File konfigurasi lingkungan yang menyimpan pengaturan sensitif seperti koneksi database dan kunci aplikasi.

### `artisan`

- Skrip CLI Laravel yang menyediakan berbagai perintah pengembangan, seperti pembuatan kontroler, model, dan migrasi.

Struktur folder ini membantu memisahkan dan mengorganisasi berbagai komponen dalam aplikasi Laravel Anda, membuatnya lebih mudah untuk dikembangkan dan dikelola.




## Blade Template Engine dan Blade Components

Laravel menyediakan Blade sebagai template engine yang powerful dan mudah digunakan untuk memanipulasi tampilan aplikasi. Blade memungkinkan Anda untuk menulis kode HTML dan PHP dengan cara yang bersih dan terstruktur. Selain itu, Blade Components adalah fitur yang memungkinkan Anda membuat dan menggunakan komponen tampilan yang dapat digunakan kembali.

### Blade Template Engine

Blade adalah template engine default Laravel yang memungkinkan Anda untuk menggunakan sintaks PHP yang sederhana dalam file template Blade (.blade.php). Blade membuat pengembangan tampilan lebih efisien dan terorganisir.

#### Fitur Utama Blade:

- **Sintaks Sederhana**: Blade memungkinkan penggunaan sintaks yang bersih untuk menampilkan data, melakukan loop, dan pengkondisian.
  
  ```blade
  <!-- Menampilkan data -->
  <p>Hello, {{ $name }}!</p>

  <!-- Looping -->
  @foreach ($users as $user)
      <p>{{ $user->name }}</p>
  @endforeach

  <!-- Kondisi -->
  @if (auth()->check())
      <p>Welcome, {{ auth()->user()->name }}!</p>
  @else
      <p>Please log in.</p>
  @endif


