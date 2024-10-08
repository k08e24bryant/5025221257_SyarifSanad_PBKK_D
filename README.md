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


## Lampiran Tugas 2

![image](https://github.com/user-attachments/assets/0c875433-db48-4d7d-a3b3-85fb51021521)
![image](https://github.com/user-attachments/assets/5bfaef0e-2f26-4a9f-81d1-f763fa53a45f)


# Tugas 3: Database, Migration, dan Eloquent ORM

Pada tugas ini, kita akan memanfaatkan Database, Migration, dan Eloquent ORM. 

## Fitur Utama:

### 1. **Database Connection**
Pengaturan koneksi ke database dilakukan melalui file `.env`. Pada proyek ini, kita menggunakan SQLite atau MySQL sebagai database. Contoh konfigurasi koneksi untuk SQLite:

```env
DB_CONNECTION=sqlite
DB_DATABASE=/path/to/database/database.sqlite
```



### 2. **Migration**
Migration digunakan untuk membuat dan mengelola struktur tabel di database. Berikut langkah-langkah untuk membuat migrasi tabel `posts`:

1. Buat migrasi baru dengan perintah berikut:
   ```bash
   php artisan make:migration create_posts_table
   ```

2. Pada file migrasi yang baru saja dibuat, tambahkan kolom yang diperlukan untuk tabel `posts` seperti berikut:

```php
Schema::create('posts', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->string('slug')->unique();
    $table->string('author');
    $table->text('body');
    $table->timestamps();
});
```

3. Jalankan migrasi menggunakan perintah:
   ```bash
   php artisan migrate
   ```

### 3. **Eloquent ORM**
Eloquent ORM memungkinkan kita untuk memetakan tabel database ke dalam model Laravel. Pada proyek ini, kita akan membuat model `Post` yang mewakili tabel `posts`.

#### Membuat Model `Post`:
Untuk membuat model `Post`, jalankan perintah berikut:
```bash
php artisan make:model Post
```

Tambahkan properti `fillable` pada model `Post` untuk mengizinkan mass assignment pada kolom `title`, `slug`, `author`, dan `body`.

```php
class Post extends Model
{
    protected $fillable = ['title', 'slug', 'author', 'body'];
}
```

### 4. **Route Model Binding**
Route model binding memudahkan pengambilan data dari database berdasarkan kolom tertentu seperti `slug`. Dengan menggunakan route model binding, kita dapat secara otomatis memetakan URL ke model tanpa perlu menulis kueri secara manual.

#### Definisi Route:
Tambahkan rute untuk menampilkan daftar postingan dan detail postingan berdasarkan slug di file `routes/web.php`:

```php
use App\Models\Post;

Route::get('/posts', function () {
    return view('posts', [
        'title' => 'Blog',
        'posts' => Post::all()
    ]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', [
        'title' => 'Single Post',
        'post' => $post
    ]);
});
```

### 5. **Menambahkan Data Postingan dengan Tinker**
Untuk menambahkan data ke tabel `posts`, kita dapat menggunakan Tinker. Jalankan perintah berikut di terminal untuk masuk ke mode Tinker:

```bash
php artisan tinker
```

Setelah itu, tambahkan data dengan cara berikut:

```php
App\Models\Post::create([
    'title' => 'Judul Artikel 1',
    'author' => 'Syarif Sanad',
    'slug' => 'judul-artikel-1',
    'body' => 'Ini adalah konten dari artikel pertama.'
]);
```


## Lampiran Tugas 3
 ![image](https://github.com/user-attachments/assets/22b25922-4129-443c-9f14-387f7171ed0e)
 ![image](https://github.com/user-attachments/assets/b85bd829-865a-4b67-b9ba-56989c29fa68)



# Tugas 4: Model Factories, Eloquent Relationship, Post Category, dan Database Seeder

## 1. **Model Factories**

Model Factories di Laravel memudahkan kita untuk membuat data uji dalam jumlah besar dengan cepat dan efisien. Pada tugas ini, kita menggunakan factory untuk membuat data `Post`, `Category`, dan `User`. 

### Contoh Pembuatan Post Factory:

```php
<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'author_id' => User::factory(),  // Relasi ke model User
            'category_id' => Category::factory(),  // Relasi ke model Category
            'slug' => Str::slug($this->faker->sentence()),
            'body' => $this->faker->paragraph(),
        ];
    }
}
```

Dengan factory ini, setiap kali kita menjalankan factory `Post`, secara otomatis akan dibuat user dan category baru melalui relasi yang sudah didefinisikan.

## 2. **Eloquent Relationship**

Pada aplikasi ini, kita mendefinisikan beberapa relasi menggunakan Eloquent untuk menghubungkan model `Post`, `Category`, dan `User`.

### Relasi `Post` dan `Category`

Setiap `Post` dihubungkan dengan satu `Category`, dan setiap `Category` dapat memiliki banyak `Post`. Relasi ini didefinisikan menggunakan `belongsTo()` dan `hasMany()` di masing-masing model.

#### Model `Post`:

```php
public function category()
{
    return $this->belongsTo(Category::class);
}
```

#### Model `Category`:

```php
public function posts()
{
    return $this->hasMany(Post::class);
}
```

Dengan relasi ini, kita bisa mendapatkan kategori dari sebuah postingan melalui `$post->category` dan mendapatkan semua postingan dari sebuah kategori melalui `$category->posts`.

### Relasi `Post` dan `User`

Selain itu, `Post` juga dihubungkan dengan `User` sebagai penulisnya (`author`). Berikut cara mendefinisikan relasi antara `Post` dan `User`:

#### Model `Post`:

```php
public function author()
{
    return $this->belongsTo(User::class, 'author_id');
}
```

Dengan relasi ini, kita bisa mendapatkan informasi penulis dari sebuah postingan melalui `$post->author`.

## 3. **Post Category**

Pada tugas ini, kita membuat relasi antara `Post` dan `Category` untuk memisahkan konten berdasarkan kategori tertentu. Berikut adalah beberapa implementasi yang kita gunakan:

### View: Menampilkan Kategori dari Setiap Post

Pada halaman daftar post, kita menampilkan kategori dari setiap post seperti berikut:

```html
<a href="/categories/{{ $post->category->slug }}" class="hover:underline text-base text-gray-500">
    {{ $post->category->name }}
</a>
```

Ini memungkinkan kita untuk mengklik kategori dan melihat semua postingan di kategori tersebut.

### Routing untuk Menampilkan Post Berdasarkan Kategori

Kita juga mendefinisikan rute untuk menampilkan semua postingan di sebuah kategori:

```php
Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'title' => 'Articles in ' . $category->name,
        'posts' => $category->posts
    ]);
});
```

Dengan rute ini, kita bisa mengakses URL seperti `/categories/web-development` untuk menampilkan semua postingan di kategori `Web Development`.

## 4. **Database Seeder**

Untuk mengisi database dengan data awal, kita menggunakan seeder. Seeder memungkinkan kita untuk menginisialisasi database dengan data uji atau data awal yang diperlukan oleh aplikasi.

### Contoh Seeder untuk Post, Category, dan User

```php
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Buat 5 pengguna
        User::factory(5)->create();

        // Buat 3 kategori
        $categories = Category::factory(3)->create();

        // Buat 100 post, masing-masing dihubungkan dengan kategori dan penulis
        Post::factory(100)->create();
    }
}
```

### Menjalankan Seeder

Setelah seeder didefinisikan, kita bisa menjalankan perintah berikut untuk mengisi database:

```bash
php artisan db:seed
```

Ini akan mengisi tabel `users`, `categories`, dan `posts` dengan data yang dihasilkan oleh factory sesuai dengan jumlah yang telah ditentukan.


## Lampiran Tugas 4

![image](https://github.com/user-attachments/assets/7ebe2567-6625-4f8d-9113-128b2274a02b)
![image](https://github.com/user-attachments/assets/e176ae91-af2c-4efb-a538-7ea6feba50f3)





# Tugas 5: N+1 Problem, Redesign UI, Searching, dan Pagination

## A. **N+1 Problem**

### Penjelasan:
N+1 Problem adalah salah satu masalah klasik yang sering dihadapi saat menggunakan ORM (Object Relational Mapping) seperti Eloquent di Laravel. Masalah ini terjadi ketika aplikasi melakukan query tambahan setiap kali ingin mengakses relasi dari sebuah model. Misalnya, jika ada 10 post, dan setiap post punya author, maka akan ada 1 query untuk mengambil post, ditambah 10 query untuk mengambil author setiap post.

### Solusi:
Untuk mengatasi masalah ini, kita bisa menggunakan **Eager Loading** dengan `with()`. Dengan eager loading, kita bisa mengambil data relasi (seperti author atau category) sekaligus dalam satu query.

### Contoh Implementasi:

```php
// Sebelum: N+1 Problem
$posts = Post::all();
foreach ($posts as $post) {
    echo $post->author->name; // Menyebabkan query tambahan untuk setiap post
}

// Sesudah: Menggunakan Eager Loading
$posts = Post::with('author', 'category')->get();
foreach ($posts as $post) {
    echo $post->author->name; // Hanya satu query untuk author
}
```

Dengan `with()`, kita menghemat banyak query yang bisa memperlambat performa aplikasi.

---

## B. **Redesign UI**

### Penjelasan:
Untuk redesign UI, kita menggunakan **Tailwind CSS** dan beberapa blocks dari **Flowbite**, terutama `Newsletter` untuk bagian newsletter dan `Blog Section` untuk tampilan posts. Desain ini membuat UI lebih modern dan responsif, serta memberikan pengalaman pengguna yang lebih baik di berbagai ukuran layar.

### Contoh Redesign:

#### **Newsletter Section**:
Pada bagian newsletter, kita menggunakan desain block yang menarik dengan form input untuk email yang responsif.

```html
<section class="bg-white dark:bg-gray-900">
  <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
    <h1 class="mb-4 text-3xl font-extrabold tracking-tight leading-none text-gray-900 md:text-4xl lg:text-5xl dark:text-white">
      Sign up for our newsletter
    </h1>
    <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
      Stay updated with the latest posts and special offers.
    </p>
    <form class="flex justify-center">
      <input type="email" placeholder="Enter your email" class="p-4 w-2/3 rounded-lg border text-gray-900">
      <button class="p-4 bg-blue-600 text-white rounded-lg">Subscribe</button>
    </form>
  </div>
</section>
```

#### **Blog Section**:
Bagian post blog di-redesign dengan tampilan **3 kolom** di layar besar dan **2 kolom** di layar menengah, sehingga lebih rapi dan enak dilihat.

```html
<div class="grid gap-8 md:grid-cols-3 sm:grid-cols-2">
  @foreach($posts as $post)
    <article class="p-6 bg-white rounded-lg border shadow-md dark:bg-gray-800">
      <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $post->title }}</h2>
      <p class="text-gray-500">{{ Str::limit($post->body, 150) }}</p>
      <a href="/posts/{{ $post->slug }}" class="text-blue-600 hover:underline">Read More</a>
    </article>
  @endforeach
</div>
```

---

## C. **Searching**

### Penjelasan:
Fitur searching memungkinkan user untuk mencari postingan berdasarkan judul atau isi artikel. Dengan menggunakan query `where()` dari Eloquent, kita bisa mencari post yang mengandung kata kunci tertentu.

### Contoh Implementasi:

```php
// Di Model Post
public function scopeFilter(Builder $query, array $filters): void
{
    $query->when($filters['search'] ?? false, function ($query, $search) {
        $query->where('title', 'like', '%' . $search . '%')
              ->orWhere('body', 'like', '%' . $search . '%');
    });
}
```

Di form Blade, user bisa mengetikkan kata kunci dan melakukan pencarian:

```html
<form action="/posts" method="GET">
    <input type="text" name="search" placeholder="Search for articles..." class="p-3 border rounded-lg">
    <button type="submit" class="p-3 bg-blue-500 text-white rounded-lg">Search</button>
</form>
```

---

## D. **Pagination**

### Penjelasan:
Untuk membatasi jumlah postingan yang muncul di setiap halaman, kita menggunakan fitur pagination bawaan Laravel. Ini memastikan bahwa halaman tetap rapi dan tidak terlalu panjang jika ada banyak post.

### Contoh Implementasi:

```php
// Pada Controller atau Route
$posts = Post::paginate(9);
```

Di Blade, kita bisa menambahkan paginasi dengan mudah:

```html
{{ $posts->links() }}
```

Ini akan otomatis menghasilkan link untuk navigasi antar halaman.

---
## Lampiran Tugas 5

![image](https://github.com/user-attachments/assets/fe07f6b2-8980-4066-96bf-f969d6d6c994)
![image](https://github.com/user-attachments/assets/52d3b967-5b17-4305-921f-11d1517a7fac)
![image](https://github.com/user-attachments/assets/0a0122aa-e068-43d0-b4b9-944a8f64abf7)
![image](https://github.com/user-attachments/assets/9a7a04d9-7a4f-4224-9ff8-0da4ee1357c4)







