# Tugas 1

# Struktur Folder Laravel

Laravel memiliki struktur folder yang dirancang untuk mengorganisasi berbagai bagian aplikasi secara efisien. Berikut adalah penjelasan tentang struktur folder utama dalam proyek Laravel:

## `app/`

- **`Console/`**: Berisi perintah Artisan kustom yang Anda buat. Artisan adalah alat baris perintah Laravel untuk berbagai tugas pengembangan.
- **`Exceptions/`**: Menyimpan handler untuk pengecualian yang terjadi dalam aplikasi, memudahkan penanganan kesalahan.
- **`Http/`**: Berisi komponen yang menangani permintaan HTTP.
  - **`Controllers/`**: Tempat menyimpan kontroler yang menangani logika untuk permintaan HTTP.
  - **`Middleware/`**: Menyimpan middleware yang memodifikasi permintaan atau respons.
  - **`Requests/`**: Berisi kelas yang digunakan untuk validasi dan otorisasi data dari permintaan HTTP.
- **`Models/`**: Berisi model yang mewakili tabel di database dan berisi logika bisnis aplikasi terkait data.
- **`Providers/`**: Menyimpan penyedia layanan yang menghubungkan berbagai bagian aplikasi melalui binding dan pendaftaran layanan.

## `bootstrap/`

- **`cache/`**: Berisi file cache yang meningkatkan kinerja aplikasi, seperti cache konfigurasi dan rute.

## `config/`

- Berisi file konfigurasi untuk pengaturan aplikasi, seperti pengaturan database, sesi, dan cache.

## `database/`

- **`factories/`**: Berisi definisi pabrik untuk menghasilkan data dummy yang berguna untuk pengujian.
- **`migrations/`**: Menyimpan file migrasi untuk perubahan struktur database.
- **`seeders/`**: Berisi kelas yang digunakan untuk mengisi database dengan data awal.

## `public/`

- Menyediakan akses ke file publik seperti CSS, JavaScript, dan gambar. Ini adalah root dari aplikasi yang diakses oleh pengguna.

## `resources/`

- **`views/`**: Berisi template Blade untuk tampilan aplikasi.
- **`lang/`**: Menyimpan file terjemahan untuk mendukung berbagai bahasa.
- **`sass/`**: Berisi file SCSS untuk styling aplikasi, jika menggunakan Laravel Mix untuk mengkompilasi aset.

## `routes/`

- Berisi file yang mendefinisikan rute aplikasi, menghubungkan URL ke kontroler atau tindakan spesifik.

## `storage/`

- **`app/`**: Berisi file yang diunggah oleh pengguna dan file lainnya yang dihasilkan oleh aplikasi.
- **`framework/`**: Menyimpan file cache, log, dan sesi.
- **`logs/`**: Menyimpan log aplikasi untuk pemantauan dan debugging.

## `tests/`

- Berisi file pengujian aplikasi, baik pengujian unit maupun pengujian fitur, untuk memastikan kualitas kode.

## `vendor/`

- Berisi paket-paket yang diinstal melalui Composer, tempat pustaka pihak ketiga berada.

## `.env`

- File konfigurasi lingkungan yang menyimpan pengaturan sensitif seperti koneksi database dan kunci aplikasi.

## `artisan`

- Skrip CLI Laravel yang menyediakan berbagai perintah pengembangan, seperti pembuatan kontroler, model, dan migrasi.

Struktur folder ini membantu memisahkan dan mengorganisasi berbagai komponen dalam aplikasi Laravel, sehingga memudahkan pengembangan, pemeliharaan, dan skalabilitas aplikasi.



## Blade Template Engine dan Blade Components

Dalam Laravel, Blade adalah template engine yang mempermudah pengelolaan tampilan aplikasi. Blade memungkinkan kita untuk menulis kode HTML dan PHP dengan sintaks yang bersih dan terstruktur. Selain itu, Blade Components adalah fitur yang memungkinkan pembuatan dan penggunaan komponen tampilan yang dapat digunakan kembali.

### Blade Template Engine

Blade adalah template engine default Laravel yang membuat pembuatan tampilan menjadi lebih efisien dan terorganisir.

### Fitur Utama Blade:

- **Sintaks yang Sederhana**: Blade memungkinkan kita menggunakan sintaks yang ringkas untuk menampilkan data, melakukan loop, dan kondisi.

  ```blade

  <p>Hello, {{ $name }}!</p>


  @foreach ($users as $user)
      <p>{{ $user->name }}</p>
  @endforeach


  @if (auth()->check())
      <p>Welcome, {{ auth()->user()->name }}!</p>
  @else
      <p>Please log in.</p>
  @endif


## Lampiran Tugas 1



- **Home**
  ![image](https://github.com/user-attachments/assets/affeacbe-daf0-40c6-b353-8894fe2e8eb0)

- **Blog**
  ![image](https://github.com/user-attachments/assets/ba795195-0cb6-448a-9ae9-7015dd580146)

- **About**
  ![image](https://github.com/user-attachments/assets/e21a5211-521e-425c-8a0f-f209ebc4d7ee)

- **Contact**
  ![image](https://github.com/user-attachments/assets/29403efa-eda4-47d5-a636-d700d4147e3b)





# Tugas 2

## View dan Model dalam Laravel

Pada tugas ini, kita akan fokus pada **View** dan **Model** dalam framework Laravel. Laravel memisahkan tampilan dan logika aplikasi secara terstruktur dengan menggunakan Blade sebagai template engine untuk view dan model untuk mengelola data yang berinteraksi dengan database.

### 1. **Model**

Model dalam Laravel bertanggung jawab untuk berinteraksi dengan database. Model mewakili tabel dalam database dan memfasilitasi pengelolaan data melalui ORM (Object-Relational Mapping) yang disebut Eloquent.

#### Contoh Struktur Model:
File model dapat ditemukan di folder `app/Models`. Sebagai contoh, berikut adalah model `Post` yang mengelola data terkait postingan.


```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];
}
```

#### Fitur Utama Model:
- **ORM Eloquent**: Memudahkan kita untuk berinteraksi dengan database menggunakan model, sehingga tidak perlu menulis kueri SQL secara manual.
- **Fungsi `fillable`**: Mengatur atribut yang dapat diisi secara massal melalui metode seperti `create()` atau `update()`.

### 2. **View**

View dalam Laravel bertanggung jawab untuk menampilkan data kepada pengguna. Laravel menggunakan Blade sebagai template engine untuk memudahkan pengelolaan tampilan.

#### Contoh Struktur View:
View disimpan di folder `resources/views`. Sebagai contoh, berikut adalah template Blade untuk menampilkan postingan.

`resources/views/posts.blade.php`

```blade
@extends('layouts.app')

@section('content')
    <h1>Daftar Postingan</h1>

    @foreach($posts as $post)
        <div class="post">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
        </div>
    @endforeach
@endsection
```

#### Fitur Utama View:
- **Blade Template Engine**: Blade memungkinkan kita menggunakan sintaks yang sederhana untuk menampilkan data, membuat loop, dan kondisi.
- **Komponen Blade**: Kita dapat membuat komponen tampilan yang dapat digunakan kembali di berbagai bagian aplikasi.

### 3. **Interaksi Model dan View**

Model dan View bekerja sama melalui kontroler. Kontroler akan mengambil data dari model dan mengirimkannya ke view untuk ditampilkan. Contoh berikut menunjukkan bagaimana kontroler menghubungkan model `Post` dengan view.

`app/Http/Controllers/PostController.php`

```php
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts', compact('posts'));
    }
}
```

### 4. **Rute (Route)**

Rute (route) menghubungkan URL ke kontroler yang sesuai. Pada contoh ini, kita akan menambahkan rute untuk menampilkan daftar postingan.

`routes/web.php`

```php
use App\Http\Controllers\PostController;

Route::get('/posts', [PostController::class, 'index']);
```

Dengan menambahkan rute ini, ketika pengguna mengakses `/posts`, mereka akan melihat daftar postingan yang diambil dari model `Post` dan ditampilkan melalui view `posts.blade.php`.
```

## Lampiran Tugas 2

![image](https://github.com/user-attachments/assets/0c875433-db48-4d7d-a3b3-85fb51021521)
![image](https://github.com/user-attachments/assets/5bfaef0e-2f26-4a9f-81d1-f763fa53a45f)





