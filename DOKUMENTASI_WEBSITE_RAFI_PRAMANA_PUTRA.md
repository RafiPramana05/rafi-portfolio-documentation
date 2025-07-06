# DOKUMENTASI WEBSITE PORTOFOLIO RAFI PRAMANA PUTRA

## DAFTAR ISI
1. [Latar Belakang dan Overview](#latar-belakang-dan-overview)
2. [Struktur Folder dan Arsitektur](#struktur-folder-dan-arsitektur)
3. [Konfigurasi Dependencies](#konfigurasi-dependencies)
4. [Database Models](#database-models)
5. [Controllers dan Logic](#controllers-dan-logic)
6. [Routing System](#routing-system)
7. [Blade Templates dan Views](#blade-templates-dan-views)
8. [Styling dan Animations](#styling-dan-animations)
9. [JavaScript Functionality](#javascript-functionality)
10. [Fitur Admin Panel](#fitur-admin-panel)
11. [Deployment dan Maintenance](#deployment-dan-maintenance)
12. [GitHub Actions Workflow](#github-actions-workflow)
13. [Soft Delete System](#soft-delete-system)
14. [Dokumentasi Support Files](#dokumentasi-support-files)
15. [Kesimpulan](#kesimpulan)

---

## LATAR BELAKANG DAN OVERVIEW

### 1.1 Informasi Proyek

**[SCREENSHOT BAGIAN: Halaman utama website - tampilan hero section dengan background, nama "Rafi Pramana Putra", subtitle "Law Student & Community Leader", dan dua tombol]**

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

---

- **Nama Proyek:** Website Portofolio Rafi Pramana Putra
- **Jenis:** Aplikasi web portofolio personal dengan sistem admin
- **Framework:** Laravel 12.0
- **Bahasa Pemrograman:** PHP 8.2+, JavaScript ES6+, HTML5, CSS3
- **Styling Framework:** TailwindCSS 4.0
- **Database:** SQLite (development) / MySQL (production)
- **Build Tool:** Vite 6.2.4
- **Lisensi:** MIT
- **Auto-PDF Generation:** GitHub Actions Workflow Active

### 1.2 Latar Belakang Pembuatan

**[SCREENSHOT BAGIAN: Halaman About section dengan profil foto, deskripsi professional, dan mission statement]**

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

---

Website ini dikembangkan sebagai platform portofolio digital untuk **Rafi Pramana Putra**, seorang mahasiswa hukum di Universitas Brawijaya dan pemimpin komunitas. Website ini bertujuan untuk:

1. **Showcase Profesional**: Menampilkan profil profesional, pencapaian akademik, dan pengalaman organisasi
2. **Portofolio Digital**: Menyajikan proyek-proyek, pengalaman kerja, dan kontribusi dalam komunitas
3. **Networking Platform**: Menyediakan sarana komunikasi dan networking melalui form kontak
4. **Content Management**: Menyediakan panel admin untuk manajemen konten secara real-time
5. **Personal Branding**: Membangun personal brand yang profesional dan mudah diakses

### 1.3 Target Audience

**[SCREENSHOT BAGIAN: Halaman Skills section dengan 3 kolom kategori skill dan level indicators]**

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

---

- **Recruiter dan HR**: Untuk peluang karir dan magang
- **Academic Partners**: Untuk kolaborasi penelitian dan akademik
- **Community Leaders**: Untuk kerjasama komunitas dan organisasi
- **Professional Network**: Untuk networking dan partnership

### 1.4 Fitur Utama

**[SCREENSHOT BAGIAN: Halaman Projects preview dengan grid layout, gradient cards, dan tag system]**

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

---

- **Responsive Design**: Kompatibel dengan desktop, tablet, dan mobile
- **Interactive UI**: Animasi smooth dan efek hover yang menarik
- **Contact System**: Form kontak dengan validasi dan notifikasi
- **Admin Panel**: Dashboard admin untuk manajemen konten
- **Project Management**: CRUD operations untuk proyek dan pengalaman
- **Message Management**: Sistem pengelolaan pesan dari pengunjung
- **CV Download**: Akses download CV dalam format PDF
- **Social Integration**: Integrasi dengan LinkedIn, WhatsApp, dan Email

---

## STRUKTUR FOLDER DAN ARSITEKTUR

### 2.1 Struktur Direktori Utama

**[SCREENSHOT BAGIAN: File explorer/IDE menunjukkan struktur folder lengkap dengan app/, resources/, database/, dll]**

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

---

Website ini menggunakan struktur standar Laravel dengan organisasi sebagai berikut:

```bash
# Struktur folder utama Laravel
laravel/
├── app/
│   ├── Http/Controllers/     # Logic controllers
│   ├── Models/              # Database models
│   └── Mail/                # Email classes
├── resources/
│   ├── views/               # Blade templates
│   ├── css/                 # Styling files
│   └── js/                  # JavaScript files
├── database/
│   ├── migrations/          # Database schema
│   ├── seeders/            # Data seeders
│   └── factories/          # Model factories
├── public/
│   ├── css/                # Compiled CSS
│   ├── js/                 # Compiled JavaScript
│   └── images/             # Static assets
├── routes/
│   └── web.php             # Web routing
├── config/                 # Configuration files
├── storage/                # File storage
└── tests/                  # Test files
```

- **app/**: Berisi core aplikasi termasuk Models, Controllers, dan Mail classes
- **resources/**: Menyimpan view templates, CSS, dan JavaScript files
- **public/**: Direktori publik untuk assets yang dapat diakses langsung
- **database/**: Berisi migrations, seeders, dan file database SQLite
- **routes/**: Definisi routing untuk web dan API endpoints
- **config/**: File konfigurasi aplikasi Laravel

### 2.2 Arsitektur MVC

**[SCREENSHOT BAGIAN: Diagram arsitektur MVC atau flowchart menunjukkan hubungan Model-View-Controller]**

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

---

Aplikasi menggunakan arsitektur Model-View-Controller (MVC) Laravel dengan komponen:

- **Models**: User, Admin, Project, Contact untuk data handling
- **Views**: Blade templates untuk presentation layer
- **Controllers**: AdminController, ProjectController, ContactController untuk business logic
- **Routes**: Web routes dengan grouping dan middleware protection

```php
// Contoh alur MVC dalam aplikasi
Route::get('/', [PortofolioController::class, 'index']); // Route
public function index() {                                // Controller
    return view('portofolio');                          // View
}
```

---

## KONFIGURASI DEPENDENCIES

### 3.1 Backend Dependencies (Composer)

**[SCREENSHOT BAGIAN: File composer.json terbuka di editor, tunjukkan dependencies di bagian require dan require-dev]**

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

---

```json
{
    "name": "laravel/laravel",
    "type": "project",
    "description": "The skeleton application for the Laravel framework.",
    "keywords": ["laravel", "framework"],
    "license": "MIT",
    "require": {
        "php": "^8.2",
        "laravel/framework": "^12.0",
        "laravel/tinker": "^2.10.1"
    },
    "require-dev": {
        "fakerphp/faker": "^1.23",
        "laravel/pail": "^1.2.2",
        "laravel/sail": "^1.32.0",
        "mockery/mockery": "^1.6.12",
        "nunomaduro/collision": "^8.5.0",
        "phpunit/phpunit": "^11.5.3"
    },
    "autoload": {
        "psr-4": {
            "App\\": "app/",
            "Database\\Factories\\": "database/factories/",
            "Database\\Seeders\\": "database/seeders/"
        }
    },
    "config": {
        "optimize-autoloader": true,
        "preferred-install": "dist",
        "sort-packages": true,
        "allow-plugins": {
            "pestphp/pest-plugin": true,
            "php-http/discovery": true
        }
    },
    "minimum-stability": "stable",
    "prefer-stable": true
}
```

**Dependencies Utama:**
- **Laravel Framework 12.0**: Core framework dengan fitur terbaru
- **Laravel Tinker**: Interactive shell untuk debugging
- **PHPUnit**: Testing framework untuk unit testing
- **Laravel Pail**: Real-time log tailing
- **Laravel Sail**: Docker environment untuk development

### 3.2 Frontend Dependencies (NPM)

**[SCREENSHOT BAGIAN: File package.json terbuka di editor, fokus pada devDependencies]**

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

---

```json
{
    "private": true,
    "type": "module",
    "scripts": {
        "build": "vite build",
        "dev": "vite dev",
        "preview": "vite preview"
    },
    "devDependencies": {
        "vite": "^6.2.4",
        "laravel-vite-plugin": "^1.0.0",
        "tailwindcss": "^4.0.0",
        "axios": "^1.8.2",
        "postcss": "^8.4.35",
        "autoprefixer": "^10.4.16",
        "concurrently": "^8.2.2"
    }
}
```

**Dependencies Utama:**
- **TailwindCSS 4.0**: Utility-first CSS framework untuk styling
- **Vite 6.2.4**: Modern build tool dengan hot module replacement
- **Laravel Vite Plugin**: Integrasi Vite dengan Laravel
- **Axios**: HTTP client untuk AJAX requests
- **Concurrently**: Menjalankan multiple commands secara bersamaan

### 3.3 Build Configuration

**[SCREENSHOT BAGIAN: File vite.config.js di editor menunjukkan konfigurasi Laravel plugin]**

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

---

```javascript
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
    server: {
        hmr: {
            host: 'localhost',
        },
    },
});
```

Vite dikonfigurasi untuk:
- **Laravel Plugin**: Integrasi seamless dengan Laravel
- **Hot Module Replacement**: Development dengan live reload
- **CSS/JS Bundling**: Optimasi assets untuk production
- **Build Optimization**: Minifikasi dan tree shaking

---

## DATABASE MODELS

### 4.1 Model User

**[SCREENSHOT BAGIAN: File app/Models/User.php terbuka di editor, tunjukkan class structure dan properties]**

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

---

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
```

Model default Laravel untuk user authentication dengan:
- **Mass Assignment**: Fields name, email, dan password dapat diisi secara massal
- **Hidden Fields**: Password dan remember_token disembunyikan dari serialization
- **Casting**: Automatic hashing untuk password dan datetime parsing
- **Traits**: HasFactory untuk testing dan Notifiable untuk notifications

### 4.2 Model Project

**[SCREENSHOT BAGIAN: File app/Models/Project.php di editor, tunjukkan fillable array dan methods]**

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

---

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'icon',
        'gradient_from',
        'gradient_to',
        'tags',
        'type',
        'duration',
        'location',
        'link',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'tags' => 'array',
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];

    protected $dates = ['deleted_at'];

    // Query Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }

    // Accessors
    public function getGradientClassAttribute()
    {
        return "from-{$this->gradient_from} to-{$this->gradient_to}";
    }

    public function getFormattedTagsAttribute()
    {
        return is_array($this->tags) ? implode(', ', $this->tags) : $this->tags;
    }

    // Mutators
    public function setTagsAttribute($value)
    {
        $this->attributes['tags'] = is_array($value) ? json_encode($value) : $value;
    }
}
```

Model utama untuk mengelola proyek, pengalaman, dan organisasi dengan fitur:
- **Soft Delete**: Menggunakan SoftDeletes trait untuk keamanan data
- **Mass Assignment**: Fillable fields untuk semua properti proyek
- **Scopes**: Method untuk filter active items, by type, dan ordering
- **Accessors**: Gradient class generator dan tags formatting
- **Mutators**: Automatic JSON encoding untuk array tags

### 4.3 Model Contact

**[SCREENSHOT BAGIAN: File app/Models/Contact.php di editor, fokus pada scopes dan fillable]**

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

---

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'status',
        'ip_address',
        'user_agent'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // Query Scopes
    public function scopeUnread($query)
    {
        return $query->where('status', 'unread');
    }

    public function scopeRead($query)
    {
        return $query->where('status', 'read');
    }

    public function scopeReplied($query)
    {
        return $query->where('status', 'replied');
    }

    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    // Methods
    public function markAsRead()
    {
        $this->update(['status' => 'read']);
    }

    public function markAsReplied()
    {
        $this->update(['status' => 'replied']);
    }

    public function isUnread()
    {
        return $this->status === 'unread';
    }

    public function isRead()
    {
        return $this->status === 'read';
    }
}
```

Model untuk mengelola pesan kontak dengan fitur:
- **Status Tracking**: Unread, read, replied status
- **Scopes**: Filter berdasarkan status dan ordering
- **Security**: IP address dan user agent tracking
- **Helper Methods**: Mark as read/replied dan status checking

### 4.4 Model Admin

**[SCREENSHOT BAGIAN: File app/Models/Admin.php di editor, tunjukkan inheritance dari Authenticatable]**

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

---

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'role',
        'last_login_at',
        'is_active'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'last_login_at' => 'datetime',
        'is_active' => 'boolean'
    ];

    // Query Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByRole($query, $role)
    {
        return $query->where('role', $role);
    }

    // Methods
    public function updateLastLogin()
    {
        $this->update(['last_login_at' => now()]);
    }

    public function isSuperAdmin()
    {
        return $this->role === 'super_admin';
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
```

Model untuk authentication admin panel dengan:
- **Username Auth**: Mendukung login dengan username atau email
- **Role Management**: Support untuk multiple admin roles
- **Session Tracking**: Last login tracking
- **Security**: Password hashing dan remember token

---

## CONTROLLERS DAN LOGIC

### 5.1 PortofolioController

**[SCREENSHOT BAGIAN: File app/Http/Controllers/PortofolioController.php terbuka di editor]**

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

---

```php
<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    public function index()
    {
        // Ambil preview proyek untuk homepage (maksimal 6 items)
        $projects = Project::active()
                    ->byType('project')
                    ->ordered()
                    ->limit(6)
                    ->get();

        $experiences = Project::active()
                     ->byType('experience')
                     ->ordered()
                     ->limit(4)
                     ->get();

        $organizations = Project::active()
                       ->byType('organization')
                       ->ordered()
                       ->limit(4)
                       ->get();

        return view('portofolio', compact('projects', 'experiences', 'organizations'));
    }

    public function downloadCV()
    {
        $pathToFile = public_path('cv/CV_RAFI_PRAMANA_PUTRA.pdf');
        
        if (file_exists($pathToFile)) {
            return response()->download($pathToFile, 'CV_Rafi_Pramana_Putra.pdf');
        }
        
        return redirect()->back()->with('error', 'CV tidak ditemukan');
    }
}
```

Controller untuk halaman utama dengan:
- **Homepage Data**: Mengambil preview proyek, experience, dan organisasi
- **CV Download**: Fungsi download CV dalam format PDF
- **Data Limiting**: Membatasi jumlah item untuk performa optimal
- **Error Handling**: Validasi file existence untuk download

### 5.2 ProjectController

**[SCREENSHOT BAGIAN: File app/Http/Controllers/ProjectController.php, fokus pada method index dengan query chains]**

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

---

```php
<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::active()->ordered();

        // Filter by type if specified
        if ($request->has('type') && $request->type !== 'all') {
            $query->byType($request->type);
        }

        // Search functionality
        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%')
                  ->orWhere('tags', 'like', '%' . $request->search . '%');
            });
        }

        $projects = $query->paginate(12);

        // Get project counts for filter buttons
        $projectCounts = [
            'all' => Project::active()->count(),
            'project' => Project::active()->byType('project')->count(),
            'experience' => Project::active()->byType('experience')->count(),
            'organization' => Project::active()->byType('organization')->count(),
        ];

        return view('project.index', compact('projects', 'projectCounts'));
    }

    public function show($id)
    {
        $project = Project::active()->findOrFail($id);
        
        // Get related projects
        $relatedProjects = Project::active()
                          ->byType($project->type)
                          ->where('id', '!=', $project->id)
                          ->ordered()
                          ->limit(4)
                          ->get();

        return view('project.show', compact('project', 'relatedProjects'));
    }
}
```

Controller untuk halaman proyek dengan:
- **Filtering**: Filter berdasarkan type dan search query
- **Pagination**: Pembagian halaman untuk performa optimal
- **Search**: Pencarian berdasarkan title, description, dan tags
- **Related Projects**: Menampilkan proyek terkait berdasarkan type

### 5.3 AdminController

**[SCREENSHOT BAGIAN: File app/Http/Controllers/AdminController.php, tunjukkan method login dengan Hash::check dan Session handling]**

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

---

```php
<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Contact;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function loginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        $admin = Admin::where('username', $request->username)
                     ->orWhere('email', $request->username)
                     ->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            if (!$admin->is_active) {
                return back()->with('error', 'Akun admin tidak aktif');
            }

            Session::put('admin_id', $admin->id);
            Session::put('admin_name', $admin->name);
            Session::put('admin_role', $admin->role);
            
            $admin->updateLastLogin();

            return redirect()->route('admin.dashboard')
                           ->with('success', 'Login berhasil');
        }

        return back()->with('error', 'Username atau password salah');
    }

    public function dashboard()
    {
        $stats = [
            'total_projects' => Project::count(),
            'active_projects' => Project::active()->count(),
            'total_messages' => Contact::count(),
            'unread_messages' => Contact::unread()->count(),
            'projects_by_type' => [
                'project' => Project::active()->byType('project')->count(),
                'experience' => Project::active()->byType('experience')->count(),
                'organization' => Project::active()->byType('organization')->count(),
            ]
        ];

        $recent_messages = Contact::recent()->limit(5)->get();
        $recent_projects = Project::ordered()->limit(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_messages', 'recent_projects'));
    }

    public function logout()
    {
        Session::forget(['admin_id', 'admin_name', 'admin_role']);
        return redirect()->route('admin.login')
                       ->with('success', 'Logout berhasil');
    }
}
```

Controller untuk sistem admin dengan:
- **Authentication**: Login dengan username/email dan password
- **Session Management**: Menyimpan informasi admin di session
- **Dashboard Stats**: Statistik proyek dan pesan
- **Security**: Validasi active admin dan last login tracking

---

## ROUTING SYSTEM

### 6.1 Public Routes

**[SCREENSHOT BAGIAN: File routes/web.php terbuka di editor, tunjukkan public routes section]**

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

---

```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

// Public Routes
Route::get('/', [PortofolioController::class, 'index'])->name('portofolio.home');
Route::get('/home', [PortofolioController::class, 'index'])->name('portofolio.home.alt');

// Project Routes
Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
Route::get('/project/{id}', [ProjectController::class, 'show'])->name('project.show');

// Contact Routes
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// CV Download
Route::get('/cv/download', [PortofolioController::class, 'downloadCV'])->name('cv.download');

// Admin Authentication Routes (No Middleware)
Route::get('/admin/login', [AdminController::class, 'loginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.post');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
```

Public routes yang dapat diakses tanpa authentication:
- **Homepage**: Route utama dan alternatif
- **Project Pages**: Daftar dan detail proyek
- **Contact Form**: Submit pesan kontak
- **CV Download**: Download CV dalam format PDF
- **Admin Auth**: Login dan logout admin

### 6.2 Admin Routes Group

**[SCREENSHOT BAGIAN: File routes/web.php, fokus pada admin routes group dengan middleware]**

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

---

```php
// Admin Routes Group with Middleware
Route::prefix('admin')->middleware('admin.auth')->group(function () {
    
    // Dashboard
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard.alt');
    
    // Project Management Routes
    Route::prefix('projects')->group(function () {
        Route::get('/', [AdminProjectController::class, 'index'])->name('admin.projects.index');
        Route::get('/create', [AdminProjectController::class, 'create'])->name('admin.projects.create');
        Route::post('/', [AdminProjectController::class, 'store'])->name('admin.projects.store');
        Route::get('/{id}/edit', [AdminProjectController::class, 'edit'])->name('admin.projects.edit');
        Route::put('/{id}', [AdminProjectController::class, 'update'])->name('admin.projects.update');
        Route::delete('/{id}', [AdminProjectController::class, 'destroy'])->name('admin.projects.destroy');
        
        // Trash Management
        Route::get('/trash', [AdminProjectController::class, 'trash'])->name('admin.projects.trash');
        Route::put('/{id}/restore', [AdminProjectController::class, 'restore'])->name('admin.projects.restore');
        Route::delete('/{id}/force', [AdminProjectController::class, 'forceDelete'])->name('admin.projects.force-delete');
    });
    
    // Message Management Routes
    Route::prefix('messages')->group(function () {
        Route::get('/', [AdminMessageController::class, 'index'])->name('admin.messages.index');
        Route::get('/{id}', [AdminMessageController::class, 'show'])->name('admin.messages.show');
        Route::delete('/{id}', [AdminMessageController::class, 'destroy'])->name('admin.messages.destroy');
        Route::put('/{id}/read', [AdminMessageController::class, 'markAsRead'])->name('admin.messages.read');
        Route::put('/{id}/unread', [AdminMessageController::class, 'markAsUnread'])->name('admin.messages.unread');
        Route::post('/bulk-action', [AdminMessageController::class, 'bulkAction'])->name('admin.messages.bulk');
    });
    
    // Settings Routes
    Route::prefix('settings')->group(function () {
        Route::get('/', [AdminSettingsController::class, 'index'])->name('admin.settings.index');
        Route::put('/profile', [AdminSettingsController::class, 'updateProfile'])->name('admin.settings.profile');
        Route::put('/password', [AdminSettingsController::class, 'updatePassword'])->name('admin.settings.password');
    });
});
```

Admin routes yang dilindungi middleware:
- **Dashboard**: Statistik dan overview
- **Project Management**: CRUD lengkap dengan trash system
- **Message Management**: Kelola pesan dengan bulk actions
- **Settings**: Pengaturan profil dan password admin
- **Middleware Protection**: Semua route dilindungi admin authentication

---

## BLADE TEMPLATES DAN VIEWS

### 7.1 Layout System

**[SCREENSHOT BAGIAN: File resources/views/layouts/app.blade.php di editor, tunjukkan struktur layout dengan head, navbar, content, footer]**

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

---

```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Rafi Pramana Putra - Portfolio')</title>
    <meta name="description" content="@yield('description', 'Portfolio website of Rafi Pramana Putra - Law Student & Community Leader at Universitas Brawijaya')">
    <meta name="keywords" content="@yield('keywords', 'Rafi Pramana Putra, Portfolio, Law Student, Community Leader, Universitas Brawijaya')">
    
    <!-- CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- External Libraries -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    
    @stack('styles')
</head>
<body class="bg-gray-900 text-white">
    <!-- Navigation -->
    @include('partials.navbar')
    
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
    
    <!-- Footer -->
    @include('partials.footer')
    
    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
    
    @stack('scripts')
</body>
</html>
```

Layout utama aplikasi dengan:
- **Meta Tags**: SEO optimization dengan dynamic title/description
- **Vite Integration**: Modern asset bundling
- **External Libraries**: Font Awesome dan AOS animations
- **Partials**: Navbar dan footer components
- **Stack System**: Dynamic CSS/JS injection

### 7.2 Homepage Sections

**[SCREENSHOT BAGIAN: File resources/views/portofolio.blade.php di editor, tunjukkan struktur section homepage]**

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

---

#### Hero Section

```blade
<!-- Hero Section -->
<section id="home" class="min-h-screen flex items-center justify-center relative parallax" 
         style="background-image: url('{{ asset('images/lofi_background.jpg') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    
    <!-- Floating Icons -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="floating-icon absolute top-20 left-20 text-blue-400">
            <i class="fas fa-gavel text-4xl"></i>
        </div>
        <div class="floating-icon absolute top-32 right-32 text-purple-400">
            <i class="fas fa-users text-3xl"></i>
        </div>
        <div class="floating-icon absolute bottom-40 left-40 text-green-400">
            <i class="fas fa-graduation-cap text-3xl"></i>
        </div>
    </div>
    
    <div class="text-center z-10 relative px-4 sm:px-6" data-aos="fade-up" data-aos-duration="2000">
        <h1 class="text-4xl sm:text-7xl font-bold mb-4 text-shadow typing" 
            data-aos="zoom-in" data-aos-delay="300">
            Rafi Pramana Putra
        </h1>
        
        <p class="text-lg sm:text-2xl mb-8 text-gray-300" 
           data-aos="fade-up" data-aos-delay="600">
            Law Student & Community Leader
        </p>
        
        <div class="flex flex-col sm:flex-row justify-center gap-4" 
             data-aos="fade-up" data-aos-delay="900">
            <a href="#about" class="glass px-8 py-3 rounded-full hover:glow transition-all duration-300">
                <i class="fas fa-user-circle mr-2"></i>
                Explore My Work
            </a>
            <a href="{{ route('cv.download') }}" target="_blank" 
               class="border-2 border-blue-500 px-8 py-3 rounded-full hover:bg-blue-500 transition-all duration-300">
                <i class="fas fa-download mr-2"></i>
                Download CV
            </a>
        </div>
    </div>
</section>
```

#### About Section

```blade
<!-- About Section -->
<section id="about" class="py-20 bg-gray-800">
    <div class="container mx-auto px-6">
        <h2 class="text-5xl font-bold text-center mb-16 gradient-text" data-aos="fade-up">
            About Me
        </h2>
        
        <div class="grid lg:grid-cols-2 gap-12">
            <!-- Profile Card -->
            <div class="glass rounded-2xl p-8" data-aos="fade-right">
                <div class="flex items-center mb-6">
                    <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-2xl font-bold">Professional Profile</h3>
                        <p class="text-gray-400">Law Student & Community Leader</p>
                    </div>
                </div>
                
                <p class="text-gray-300 leading-relaxed mb-6">
                    Saya adalah mahasiswa Hukum di Universitas Brawijaya yang aktif dalam berbagai kegiatan akademik dan organisasi kemahasiswaan. 
                    Dengan pengalaman memimpin komunitas dan berpartisipasi dalam berbagai proyek sosial, saya terus mengembangkan kemampuan 
                    leadership dan advocacy dalam bidang hukum.
                </p>
                
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex items-center">
                        <i class="fas fa-graduation-cap text-blue-400 mr-3"></i>
                        <span class="text-sm">Universitas Brawijaya</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-map-marker-alt text-green-400 mr-3"></i>
                        <span class="text-sm">Malang, Indonesia</span>
                    </div>
                </div>
            </div>
            
            <!-- Mission Card -->
            <div class="glass rounded-2xl p-8" data-aos="fade-left">
                <div class="flex items-center mb-6">
                    <div class="w-20 h-20 bg-gradient-to-r from-green-500 to-teal-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-bullseye text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-2xl font-bold">Mission & Vision</h3>
                        <p class="text-gray-400">Goals & Aspirations</p>
                    </div>
                </div>
                
                <p class="text-gray-300 leading-relaxed mb-6">
                    Berkomitmen untuk memberikan kontribusi positif dalam bidang hukum dan masyarakat melalui pendidikan, 
                    advokasi, dan kepemimpinan yang berprinsip. Saya percaya bahwa hukum adalah alat untuk menciptakan 
                    keadilan dan kesejahteraan bagi semua orang.
                </p>
                
                <div class="space-y-3">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-green-400 mr-3"></i>
                        <span class="text-sm">Promoting Legal Awareness</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-green-400 mr-3"></i>
                        <span class="text-sm">Community Development</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-green-400 mr-3"></i>
                        <span class="text-sm">Social Justice Advocacy</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
```

#### Projects Preview Section

```blade
<!-- Projects Preview Section -->
<section id="projects" class="py-20 bg-gray-900">
    <div class="container mx-auto px-6">
        <h2 class="text-5xl font-bold text-center mb-16 gradient-text" data-aos="fade-up">
            Featured Projects
        </h2>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $project)
                <div class="glass rounded-2xl p-6 hover:scale-105 transition-transform duration-300" 
                     data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                    <div class="w-16 h-16 bg-gradient-to-r {{ $project->gradient_class }} rounded-full flex items-center justify-center mb-4">
                        <i class="{{ $project->icon }} text-2xl"></i>
                    </div>
                    
                    <h3 class="text-xl font-bold mb-3">{{ $project->title }}</h3>
                    <p class="text-gray-400 mb-4">{{ Str::limit($project->description, 100) }}</p>
                    
                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach($project->tags as $tag)
                            <span class="px-3 py-1 bg-gray-700 rounded-full text-sm">{{ $tag }}</span>
                        @endforeach
                    </div>
                    
                    @if($project->link)
                        <a href="{{ $project->link }}" target="_blank" 
                           class="inline-flex items-center text-blue-400 hover:text-blue-300 transition-colors">
                            <i class="fas fa-external-link-alt mr-2"></i>
                            View Project
                        </a>
                    @endif
                </div>
            @endforeach
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('project.index') }}" 
               class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full hover:scale-105 transition-transform">
                <i class="fas fa-th-large mr-2"></i>
                View All Projects
            </a>
        </div>
    </div>
</section>
```

### 7.3 Contact Section

**[SCREENSHOT BAGIAN: Contact section dengan form dan social media links]**

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

---

```blade
<!-- Contact Section -->
<section id="contact" class="py-20 bg-gray-800">
    <div class="container mx-auto px-6">
        <h2 class="text-5xl font-bold text-center mb-16 gradient-text" data-aos="fade-up">
            Get In Touch
        </h2>
        
        <div class="grid lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="glass rounded-2xl p-8" data-aos="fade-right">
                <h3 class="text-2xl font-bold mb-6">Send Message</h3>
                
                <form id="contactForm" action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium mb-2">Full Name</label>
                        <input type="text" id="name" name="name" required
                               class="w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-600 focus:border-blue-500 focus:outline-none transition-colors">
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium mb-2">Email Address</label>
                        <input type="email" id="email" name="email" required
                               class="w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-600 focus:border-blue-500 focus:outline-none transition-colors">
                    </div>
                    
                    <div>
                        <label for="subject" class="block text-sm font-medium mb-2">Subject</label>
                        <input type="text" id="subject" name="subject" required
                               class="w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-600 focus:border-blue-500 focus:outline-none transition-colors">
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-medium mb-2">Message</label>
                        <textarea id="message" name="message" rows="6" required
                                  class="w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-600 focus:border-blue-500 focus:outline-none transition-colors resize-none"></textarea>
                    </div>
                    
                    <button type="submit" 
                            class="w-full px-8 py-3 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg font-semibold hover:scale-105 transition-transform">
                        <i class="fas fa-paper-plane mr-2"></i>
                        Send Message
                    </button>
                </form>
            </div>
            
            <!-- Contact Info -->
            <div class="glass rounded-2xl p-8" data-aos="fade-left">
                <h3 class="text-2xl font-bold mb-6">Contact Information</h3>
                
                <div class="space-y-6">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-envelope text-lg"></i>
                        </div>
                        <div class="ml-4">
                            <h4 class="font-semibold">Email</h4>
                            <p class="text-gray-400">rafi.pramana@example.com</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-teal-600 rounded-full flex items-center justify-center">
                            <i class="fab fa-whatsapp text-lg"></i>
                        </div>
                        <div class="ml-4">
                            <h4 class="font-semibold">WhatsApp</h4>
                            <p class="text-gray-400">+62 812-3456-7890</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full flex items-center justify-center">
                            <i class="fab fa-linkedin text-lg"></i>
                        </div>
                        <div class="ml-4">
                            <h4 class="font-semibold">LinkedIn</h4>
                            <p class="text-gray-400">linkedin.com/in/rafipramanaputra</p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-8 pt-8 border-t border-gray-700">
                    <h4 class="font-semibold mb-4">Follow Me</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center hover:scale-110 transition-transform">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center hover:scale-110 transition-transform">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-600 rounded-full flex items-center justify-center hover:scale-110 transition-transform">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
```

---

## STYLING DAN ANIMATIONS

### 8.1 TailwindCSS Implementation

**[SCREENSHOT BAGIAN: File resources/css/app.css terbuka di editor dengan custom TailwindCSS classes]**

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

---

```css
@tailwind base;
@tailwind components;
@tailwind utilities;

/* Custom CSS Classes */
@layer components {
    .glass {
        @apply bg-white bg-opacity-10 backdrop-blur-md border border-white border-opacity-20;
    }
    
    .gradient-text {
        @apply bg-gradient-to-r from-blue-400 via-purple-500 to-pink-500 bg-clip-text text-transparent;
    }
    
    .text-shadow {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }
    
    .hover-glow:hover {
        box-shadow: 0 0 20px rgba(59, 130, 246, 0.5);
    }
}

/* Custom Animations */
@layer utilities {
    .typing {
        overflow: hidden;
        border-right: 3px solid;
        white-space: nowrap;
        animation: typing 3s steps(20, end), blink 1s infinite;
    }
    
    @keyframes typing {
        from { width: 0 }
        to { width: 100% }
    }
    
    @keyframes blink {
        0%, 50% { border-color: transparent }
        51%, 100% { border-color: white }
    }
    
    .floating-icon {
        animation: float 3s ease-in-out infinite;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(5deg); }
    }
    
    .parallax {
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
}

/* Responsive Design */
@media (max-width: 768px) {
    .typing {
        animation: none;
        border-right: none;
    }
    
    .parallax {
        background-attachment: scroll;
    }
}

/* Scrollbar Styling */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #1f2937;
}

::-webkit-scrollbar-thumb {
    background: #3b82f6;
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: #2563eb;
}
```

### 8.2 Custom JavaScript Animations

**[SCREENSHOT BAGIAN: File resources/js/app.js dengan custom JavaScript functions]**

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

---

```javascript
// resources/js/app.js
import './bootstrap';

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Navbar scroll effect
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (navbar) {
        if (window.scrollY > 100) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    }
});

// Contact form submission
document.getElementById('contactForm')?.addEventListener('submit', function(e) {
    e.preventDefault();
    
    const form = this;
    const formData = new FormData(form);
    const submitButton = form.querySelector('button[type="submit"]');
    
    // Disable submit button
    submitButton.disabled = true;
    submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Sending...';
    
    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showNotification('Message sent successfully!', 'success');
            form.reset();
        } else {
            showNotification('Error sending message. Please try again.', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Error sending message. Please try again.', 'error');
    })
    .finally(() => {
        // Re-enable submit button
        submitButton.disabled = false;
        submitButton.innerHTML = '<i class="fas fa-paper-plane mr-2"></i>Send Message';
    });
});

// Notification system
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 z-50 px-6 py-4 rounded-lg shadow-lg transition-all duration-300 transform translate-x-full`;
    
    if (type === 'success') {
        notification.className += ' bg-green-500 text-white';
    } else if (type === 'error') {
        notification.className += ' bg-red-500 text-white';
    } else {
        notification.className += ' bg-blue-500 text-white';
    }
    
    notification.innerHTML = `
        <div class="flex items-center">
            <i class="fas fa-${type === 'success' ? 'check' : type === 'error' ? 'exclamation' : 'info'}-circle mr-3"></i>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    // Show notification
    setTimeout(() => {
        notification.classList.remove('translate-x-full');
    }, 100);
    
    // Hide notification after 5 seconds
    setTimeout(() => {
        notification.classList.add('translate-x-full');
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 5000);
}

// Skills progress animation
function animateSkillBars() {
    const skillBars = document.querySelectorAll('.skill-bar');
    
    skillBars.forEach(bar => {
        const progress = bar.getAttribute('data-progress');
        const progressFill = bar.querySelector('.skill-progress');
        
        if (progressFill) {
            progressFill.style.width = progress + '%';
        }
    });
}

// Initialize animations when page loads
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });
    }
    
    // Animate skill bars when they come into view
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateSkillBars();
                observer.unobserve(entry.target);
            }
        });
    });
    
    const skillsSection = document.querySelector('#skills');
    if (skillsSection) {
        observer.observe(skillsSection);
    }
});
```

---

## JAVASCRIPT FUNCTIONALITY

### 9.1 Admin Panel JavaScript

**[SCREENSHOT BAGIAN: File resources/js/admin.js dengan admin panel functionality]**

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

---

```javascript
// resources/js/admin.js

// Admin Dashboard Charts
function initDashboardCharts() {
    // Projects by Type Chart
    const projectsChart = document.getElementById('projectsChart');
    if (projectsChart) {
        const ctx = projectsChart.getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Projects', 'Experiences', 'Organizations'],
                datasets: [{
                    data: [
                        projectsChart.dataset.projects,
                        projectsChart.dataset.experiences,
                        projectsChart.dataset.organizations
                    ],
                    backgroundColor: ['#3b82f6', '#10b981', '#f59e0b']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    }
    
    // Messages Chart
    const messagesChart = document.getElementById('messagesChart');
    if (messagesChart) {
        const ctx = messagesChart.getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Messages',
                    data: [12, 19, 3, 5, 2, 3],
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
}

// Project Management
function initProjectManagement() {
    // Add project form validation
    const projectForm = document.getElementById('projectForm');
    if (projectForm) {
        projectForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const submitButton = this.querySelector('button[type="submit"]');
            
            submitButton.disabled = true;
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Saving...';
            
            fetch(this.action, {
                method: this.method,
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showAdminNotification('Project saved successfully!', 'success');
                    if (data.redirect) {
                        window.location.href = data.redirect;
                    }
                } else {
                    showAdminNotification('Error saving project. Please check your input.', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showAdminNotification('Error saving project. Please try again.', 'error');
            })
            .finally(() => {
                submitButton.disabled = false;
                submitButton.innerHTML = '<i class="fas fa-save mr-2"></i>Save Project';
            });
        });
    }
    
    // Delete project confirmation
    document.querySelectorAll('.delete-project').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            if (confirm('Are you sure you want to delete this project?')) {
                const form = this.closest('.delete-form');
                form.submit();
            }
        });
    });
    
    // Bulk actions for projects
    const bulkActionForm = document.getElementById('bulkActionForm');
    if (bulkActionForm) {
        const selectAllCheckbox = document.getElementById('selectAll');
        const itemCheckboxes = document.querySelectorAll('.item-checkbox');
        
        selectAllCheckbox?.addEventListener('change', function() {
            itemCheckboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
        
        bulkActionForm.addEventListener('submit', function(e) {
            const checkedItems = document.querySelectorAll('.item-checkbox:checked');
            
            if (checkedItems.length === 0) {
                e.preventDefault();
                showAdminNotification('Please select at least one item.', 'warning');
                return;
            }
            
            const action = this.querySelector('select[name="action"]').value;
            if (action === 'delete') {
                if (!confirm('Are you sure you want to delete the selected items?')) {
                    e.preventDefault();
                    return;
                }
            }
        });
    }
}

// Message Management
function initMessageManagement() {
    // Mark as read/unread
    document.querySelectorAll('.mark-read, .mark-unread').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            const messageId = this.dataset.id;
            const action = this.classList.contains('mark-read') ? 'read' : 'unread';
            
            fetch(`/admin/messages/${messageId}/${action}`, {
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    showAdminNotification('Error updating message status.', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showAdminNotification('Error updating message status.', 'error');
            });
        });
    });
    
    // Delete message confirmation
    document.querySelectorAll('.delete-message').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            if (confirm('Are you sure you want to delete this message?')) {
                const form = this.closest('.delete-form');
                form.submit();
            }
        });
    });
}

// Admin notification system
function showAdminNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 z-50 px-6 py-4 rounded-lg shadow-lg transition-all duration-300 transform translate-x-full`;
    
    const colors = {
        success: 'bg-green-500 text-white',
        error: 'bg-red-500 text-white',
        warning: 'bg-yellow-500 text-black',
        info: 'bg-blue-500 text-white'
    };
    
    notification.className += ` ${colors[type] || colors.info}`;
    
    const icons = {
        success: 'check-circle',
        error: 'exclamation-circle',
        warning: 'exclamation-triangle',
        info: 'info-circle'
    };
    
    notification.innerHTML = `
        <div class="flex items-center">
            <i class="fas fa-${icons[type] || icons.info} mr-3"></i>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.classList.remove('translate-x-full');
    }, 100);
    
    setTimeout(() => {
        notification.classList.add('translate-x-full');
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 5000);
}

// Initialize admin functionality
document.addEventListener('DOMContentLoaded', function() {
    if (document.body.classList.contains('admin-panel')) {
        initDashboardCharts();
        initProjectManagement();
        initMessageManagement();
    }
});
```

Admin panel JavaScript dengan:
- **Dashboard Charts**: Visualisasi data dengan Chart.js
- **Project Management**: Form validation dan bulk actions
- **Message Management**: Mark as read/unread functionality
- **Notification System**: Admin-specific notification system
- **AJAX Operations**: Smooth user experience tanpa page reload
