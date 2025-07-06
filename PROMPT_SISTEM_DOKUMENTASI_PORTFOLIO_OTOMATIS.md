# 📚 PROMPT LENGKAP UNTUK MEMBUAT SISTEM DOKUMENTASI PORTFOLIO OTOMATIS DENGAN PDF GENERATION

## 🎯 **CONTEXT DAN TUJUAN**

Buat sistem dokumentasi portfolio website yang lengkap dengan auto PDF generation menggunakan GitHub Actions. Sistem ini harus menghasilkan dokumentasi teknis komprehensif dalam format Markdown yang otomatis dikonversi ke PDF dengan styling profesional, syntax highlighting, dan release management otomatis. Target hasil adalah dokumentasi portfolio Laravel dengan admin panel, contact system, project management, dan soft delete functionality.

## 🛠️ **INSTALASI MANUAL YANG DIPERLUKAN (TIDAK BISA AUTO-INSTALL)**

### **Sebelum Memulai - Install Manual:**
1. **GitHub Account** - Buat account GitHub jika belum ada
2. **Git Configuration** - Setup git config dengan username dan email
3. **Repository Access** - Pastikan punya akses ke repository target >salin akses repository<
4. **Browser Extensions** (Optional):
   - GitHub CLI extension untuk terminal
   - GitHub Desktop untuk GUI management
5. **Local Tools** (Optional tapi Recommended):
   - **Pandoc**: Download dari https://pandoc.org/installing.html untuk local PDF generation
   - **MikTeX atau TeX Live**: LaTeX distribution untuk advanced PDF styling
   - **VS Code**: Dengan extension "Markdown PDF" untuk alternative generation

## 📋 **PROMPT UTAMA UNTUK AI**

Saya ingin Anda membantu saya membuat sistem dokumentasi portfolio website yang lengkap dengan auto PDF generation. Ikuti langkah-langkah berikut dengan sangat detail dan jangan lewatkan satu langkah pun:

### **FASE 1: REPOSITORY SETUP DAN ANALISIS**

1. **Clone atau Akses Repository Target**:
   - Clone repository portfolio website yang akan didokumentasikan
   - Baca seluruh struktur folder dan file untuk memahami arsitektur
   - Identifikasi teknologi stack yang digunakan (Laravel, React, etc.)
   - Catat semua dependencies dari composer.json, package.json

2. **Buat Repository Dokumentasi Baru**:
   - Nama repository: `[nama-project]-documentation`
   - Set sebagai public repository
   - Initialize dengan README.md yang menjelaskan tujuan dokumentasi

### **FASE 2: GITHUB ACTIONS WORKFLOW SETUP**

3. **Buat Struktur Folder GitHub Actions**:
   ```
   .github/
   └── workflows/
       ├── convert-md-to-pdf.yml
       ├── latex-header.tex
       └── simple-style.css
   ```

4. **Implementasi Workflow File** (`.github/workflows/convert-md-to-pdf.yml`):
   ```yaml
   name: Convert Markdown to PDF
   
   on:
     push:
       branches: [ main ]
       paths: 
         - '**.md'
     workflow_dispatch:
   
   jobs:
     convert-md-to-pdf:
       runs-on: ubuntu-latest
       
       steps:
         - name: Checkout repository
           uses: actions/checkout@v4
         
         - name: Setup Python
           uses: actions/setup-python@v4
           with:
             python-version: '3.x'
         
         - name: Install LaTeX and Pandoc
           run: |
             sudo apt-get update
             sudo apt-get install -y \
               pandoc \
               texlive-latex-base \
               texlive-fonts-recommended \
               texlive-latex-extra \
               texlive-fonts-extra \
               texlive-xetex \
               lmodern \
               fonts-liberation
         
         - name: Install Python dependencies
           run: |
             pip install emoji
         
         - name: Pre-process Markdown
           run: |
             python3 << 'EOF'
             import re
             import emoji
             
             # Read main documentation file
             with open('DOKUMENTASI_WEBSITE_[NAMA_PROJECT].md', 'r', encoding='utf-8') as f:
                 content = f.read()
             
             # Replace emojis with text alternatives
             content = emoji.demojize(content, delimiters=("[", "]"))
             
             # Wrap long code lines
             def wrap_code_blocks(match):
                 code_content = match.group(1)
                 lines = code_content.split('\n')
                 wrapped_lines = []
                 for line in lines:
                     if len(line) > 80:
                         wrapped_lines.append(line[:80] + '\\')
                         wrapped_lines.append('    ' + line[80:])
                     else:
                         wrapped_lines.append(line)
                 return '```\n' + '\n'.join(wrapped_lines) + '\n```'
             
             content = re.sub(r'```(.*?)```', wrap_code_blocks, content, flags=re.DOTALL)
             
             # Write processed content
             with open('processed_documentation.md', 'w', encoding='utf-8') as f:
                 f.write(content)
             EOF
         
         - name: Convert to PDF with XeLaTeX
           run: |
             pandoc processed_documentation.md \
               -o portfolio-documentation.pdf \
               --pdf-engine=xelatex \
               --include-in-header=.github/workflows/latex-header.tex \
               --table-of-contents \
               --number-sections \
               --highlight-style=github \
               --geometry=margin=1in \
               --variable=documentclass:article \
               --variable=fontsize:11pt \
               --variable=linestretch:1.2 \
               || pandoc processed_documentation.md \
                  -o portfolio-documentation.pdf \
                  --pdf-engine=pdflatex \
                  --include-in-header=.github/workflows/latex-header.tex \
                  --table-of-contents \
                  --number-sections \
                  --highlight-style=github
         
         - name: Create Release
           id: create_release
           uses: actions/create-release@v1
           env:
             GITHUB_TOKEN: ${{ secrets.GITHUB_TOKEN }}
           with:
             tag_name: v${{ github.run_number }}
             release_name: Documentation v${{ github.run_number }}
             body: |
               Auto-generated PDF documentation
               
               ## Changes
               - Updated documentation with latest portfolio features
               - Professional PDF styling with syntax highlighting
               - Auto-generated from commit ${{ github.sha }}
             draft: false
             prerelease: false
         
         - name: Upload PDF to Release
           uses: actions/upload-release-asset@v1
           env:
             GITHUB_TOKEN: ${{ secrets.GITHUB_TOKEN }}
           with:
             upload_url: ${{ steps.create_release.outputs.upload_url }}
             asset_path: ./portfolio-documentation.pdf
             asset_name: Portfolio-Documentation-v${{ github.run_number }}.pdf
             asset_content_type: application/pdf
         
         - name: Upload PDF as Artifact
           uses: actions/upload-artifact@v3
           with:
             name: portfolio-documentation-pdf
             path: portfolio-documentation.pdf
   ```

5. **LaTeX Header Styling** (`.github/workflows/latex-header.tex`):
   ```latex
   \usepackage{fancyvrb}
   \usepackage{fvextra}
   \usepackage{listings}
   \usepackage{xcolor}
   \usepackage{geometry}
   \usepackage{graphicx}
   \usepackage{booktabs}
   \usepackage{longtable}
   \usepackage{array}
   \usepackage{multirow}
   \usepackage{wrapfig}
   \usepackage{float}
   \usepackage{colortbl}
   \usepackage{pdflscape}
   \usepackage{tabu}
   \usepackage{threeparttable}
   \usepackage{threeparttablex}
   \usepackage[normalem]{ulem}
   \usepackage{makecell}
   
   % Define colors for syntax highlighting
   \definecolor{background}{HTML}{1e1e1e}
   \definecolor{keyword}{HTML}{c586c0}
   \definecolor{string}{HTML}{f9c74f}
   \definecolor{comment}{HTML}{6a9955}
   \definecolor{number}{HTML}{b5cea8}
   \definecolor{operator}{HTML}{d4d4d4}
   
   % Configure code block styling
   \DefineVerbatimEnvironment{Highlighting}{Verbatim}{
     backgroundcolor=\color{background},
     formatcom=\color{white},
     fontsize=\small,
     breaklines=true,
     breakanywhere=true
   }
   
   % Configure listings for specific languages
   \lstset{
     backgroundcolor=\color{background},
     basicstyle=\ttfamily\color{white}\small,
     keywordstyle=\color{keyword}\bfseries,
     stringstyle=\color{string},
     commentstyle=\color{comment}\itshape,
     numberstyle=\color{number},
     breaklines=true,
     breakatwhitespace=true,
     showstringspaces=false,
     frame=single,
     rulecolor=\color{gray},
     framesep=5pt,
     xleftmargin=10pt,
     xrightmargin=10pt
   }
   
   % Custom section styling
   \usepackage{titlesec}
   \titleformat{\section}{\Large\bfseries\color{blue}}{\thesection}{1em}{}
   \titleformat{\subsection}{\large\bfseries\color{purple}}{\thesubsection}{1em}{}
   
   % Custom page layout
   \geometry{
     top=1in,
     bottom=1in,
     left=1in,
     right=1in,
     includeheadfoot
   }
   ```

### **FASE 3: DOKUMENTASI CONTENT CREATION**

6. **Buat File Dokumentasi Utama** (`DOKUMENTASI_WEBSITE_[NAMA_PROJECT].md`):

   **Struktur Wajib:**
   ```markdown
   # DOKUMENTASI WEBSITE PORTOFOLIO [NAMA LENGKAP]
   
   ## LATAR BELAKANG DAN OVERVIEW
   ### 1.1 Informasi Proyek
   ### 1.2 Latar Belakang Pembuatan  
   ### 1.3 Target Audience
   ### 1.4 Fitur Utama
   
   ## STRUKTUR FOLDER DAN ARSITEKTUR
   ### 2.1 Struktur Direktori Utama
   ### 2.2 Arsitektur MVC
   
   ## KONFIGURASI DEPENDENCIES
   ### 3.1 Backend Dependencies (Composer)
   ### 3.2 Frontend Dependencies (NPM)
   ### 3.3 Build Configuration
   
   ## DATABASE MODELS
   ### 4.1 Model User
   ### 4.2 Model Project  
   ### 4.3 Model Contact
   ### 4.4 Model Admin
   
   ## CONTROLLERS DAN LOGIC
   ### 5.1 PortofolioController
   ### 5.2 ProjectController
   ### 5.3 AdminController
   ### 5.4 ContactController
   ### 5.5 AdminProjectController
   ### 5.6 AdminMessageController
   
   ## ROUTING SYSTEM
   ### 6.1 Public Routes
   ### 6.2 Admin Routes Group
   
   ## BLADE TEMPLATES DAN VIEWS
   ### 7.1 Layout System
   ### 7.2 Homepage Sections
   ### 7.3 Project Detail Page
   ### 7.4 Admin Panel Views
   
   ## STYLING DAN ANIMATIONS
   ### 8.1 TailwindCSS Implementation
   ### 8.2 Custom CSS Animations
   ### 8.3 AOS (Animate On Scroll) Integration
   ### 8.4 Responsive Design
   
   ## JAVASCRIPT FUNCTIONALITY
   ### 9.1 Core JavaScript Features
   ### 9.2 Interactive Elements
   ### 9.3 Admin Panel JavaScript
   ### 9.4 Performance Optimizations
   
   ## FITUR ADMIN PANEL
   ### 10.1 Authentication System
   ### 10.2 Dashboard Overview
   ### 10.3 Project Management
   ### 10.4 Message Management
   ### 10.5 Media Management
   
   ## DEPLOYMENT DAN MAINTENANCE
   ### 12.1 Environment Setup
   ### 12.2 Performance Optimization
   ### 12.3 Security Measures
   ### 12.4 Backup Strategy
   
   ## GITHUB ACTIONS WORKFLOW
   ### 13.1 Auto PDF Generation
   ### 13.2 Styling Features
   ### 13.3 Automated Release
   
   ## SOFT DELETE SYSTEM
   ### 14.1 Implementasi Soft Delete
   ### 14.2 Trash Management
   ### 14.3 Controller Methods
   ### 14.4 Database Migration
   
   ## DOKUMENTASI SUPPORT FILES
   ### 15.1 Quick Access Documentation
   ### 15.2 PDF Generation Guide
   ### 15.3 Changelog Management
   ### 15.4 Environment Configuration
   ### 15.5 Build Scripts
   
   ## KESIMPULAN
   ```

7. **Format Content Setiap Section**:
   - **Screenshot Markers**: `**[SCREENSHOT BAGIAN: Deskripsi detail screenshot]**`
   - **Code Blocks**: Selalu gunakan syntax highlighting yang sesuai
   - **Penjelasan Code**: WAJIB ada paragraf penjelasan di bawah setiap code block
   - **Technical Details**: Include namespace, imports, error handling
   - **Best Practices**: Security, validation, optimization

### **FASE 4: CODE IMPLEMENTATION EXAMPLES**

8. **Template Code yang Harus Ada**:

   **Model Example:**
   ```php
   <?php
   // app/Models/Project.php
   namespace App\Models;
   
   use Illuminate\Database\Eloquent\Model;
   use Illuminate\Database\Eloquent\Factories\HasFactory;
   use Illuminate\Database\Eloquent\SoftDeletes;
   
   class Project extends Model
   {
       use HasFactory, SoftDeletes;
   
       protected $fillable = [
           'title', 'description', 'icon', 'gradient_from', 'gradient_to',
           'tags', 'type', 'duration', 'location', 'link', 'is_active', 'sort_order'
       ];
   
       protected $casts = [
           'tags' => 'array',
           'is_active' => 'boolean'
       ];
   
       public function scopeActive($query) {
           return $query->where('is_active', true);
       }
   
       public function scopeByType($query, $type) {
           return $query->where('type', $type);
       }
   
       public function scopeOrdered($query) {
           return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
       }
   
       public function getGradientClassAttribute() {
           return "from-{$this->gradient_from} to-{$this->gradient_to}";
       }
   }
   ```

   **Controller Example:**
   ```php
   <?php
   // app/Http/Controllers/ProjectController.php
   namespace App\Http\Controllers;
   
   use App\Models\Project;
   use Illuminate\Http\Request;
   
   class ProjectController extends Controller
   {
       public function index()
       {
           $projects = Project::active()
                       ->byType('project')
                       ->ordered()
                       ->get();
           
           $experiences = Project::active()
                       ->byType('experience')  
                       ->ordered()
                       ->get();
           
           $organizations = Project::active()
                       ->byType('organization')
                       ->ordered()
                       ->get();
           
           return view('project.index', compact('projects', 'experiences', 'organizations'));
       }
   }
   ```

9. **Wajib Include Dependencies Files**:
   ```json
   // composer.json
   {
       "require": {
           "php": "^8.2",
           "laravel/framework": "^12.0",
           "laravel/tinker": "^2.10.1"
       },
       "require-dev": {
           "fakerphp/faker": "^1.23",
           "laravel/pail": "^1.2.2", 
           "phpunit/phpunit": "^11.5.3"
       }
   }
   ```

   ```json
   // package.json
   {
       "scripts": {
           "dev": "vite",
           "build": "vite build",
           "preview": "vite preview"
       },
       "devDependencies": {
           "vite": "^6.2.4",
           "laravel-vite-plugin": "^1.0.0",
           "tailwindcss": "^4.0.0",
           "axios": "^1.8.2",
           "postcss": "^8.4.35",
           "autoprefixer": "^10.4.16"
       }
   }
   ```

### **FASE 5: SUPPORT FILES CREATION**

10. **Buat Support Files**:

    **README.md:**
    ```markdown
    # 📄 Dokumentasi Website Portfolio [NAMA]
    
    ## 🚀 Auto PDF Generator
    Repository ini dilengkapi dengan GitHub Actions yang otomatis mengconvert dokumentasi Markdown ke PDF dengan styling profesional.
    
    ### ✨ Fitur PDF Generator:
    - 🎨 Syntax highlighting dengan warna custom
    - 🖤 Background hitam untuk code blocks
    - 💜 Warna ungu untuk keywords
    - 🧡 Warna oranye untuk HTML tags
    - 📑 Table of contents otomatis
    - 🔢 Section numbering
    ```

    **QUICK_ACCESS.md:**
    ```markdown
    # 🚀 QUICK ACCESS LINKS
    
    ## 📝 EDIT & GENERATE PDF
    - **Edit Documentation:** [Direct Edit Link]
    - **Manual Trigger Workflow:** [Actions Link]
    
    ## 📊 MONITOR PROGRESS  
    - **Actions Dashboard:** [Actions URL]
    - **Workflow Runs:** [Workflow URL]
    
    ## 📥 DOWNLOAD PDF
    - **Artifacts:** [Artifacts Link]
    - **Releases:** [Releases Link]
    ```

    **QUICK_PDF_GUIDE.md:**
    ```markdown
    # 🚀 QUICK PDF GENERATION GUIDE
    
    ## 📋 ALTERNATIVE METHODS:
    
    ### Method 1: Local Generation (Recommended)
    1. Install Pandoc: https://pandoc.org/installing.html
    2. Run Script: Double-click generate-pdf-local.bat
    3. Done! PDF ter-generate dengan styling lengkap
    ```

### **FASE 6: TESTING DAN TROUBLESHOOTING**

11. **Test Workflow**:
    - Commit dan push semua files
    - Monitor GitHub Actions run
    - Check for errors dan fix sesuai error message
    - Verify PDF generation dan download

12. **Common Issues & Solutions**:
    - **lmodern.sty not found**: Sudah handled di install step
    - **backgroundcolor undefined**: Fixed di latex-header.tex
    - **Code wrapping issues**: Handled di pre-processing step
    - **Emoji rendering**: Fixed dengan emoji demojize
    - **Long tables**: LaTeX packages sudah include longtable

### **FASE 7: FINALIZATION**

13. **Repository Settings**:
    - Enable GitHub Actions di repository settings
    - Set workflow permissions ke "Read and write permissions"
    - Enable Issues untuk screenshot upload (optional)

14. **Final Verification**:
    - Test manual workflow trigger
    - Verify PDF di Releases section
    - Check Artifacts availability
    - Test local PDF generation script

## 🎯 **HASIL YANG DIHARAPKAN**

Setelah mengikuti prompt ini, Anda akan memiliki:

1. ✅ **Repository dokumentasi lengkap** dengan struktur profesional
2. ✅ **GitHub Actions workflow** yang auto-generate PDF
3. ✅ **Dokumentasi teknis komprehensif** dengan 15+ sections
4. ✅ **Code examples lengkap** dengan penjelasan detail
5. ✅ **PDF styling profesional** dengan syntax highlighting
6. ✅ **Automated release management** dengan versioning
7. ✅ **Support files** untuk easy access dan troubleshooting
8. ✅ **Soft delete system documentation** dengan implementation details
9. ✅ **Complete MVC examples** dengan Laravel best practices
10. ✅ **Frontend build configuration** dengan Vite dan TailwindCSS

## ⚠️ **IMPORTANT NOTES**

- **Replace [NAMA_PROJECT]** dengan nama project actual di semua file
- **Sesuaikan teknologi stack** dengan project yang didokumentasikan  
- **Test setiap langkah** sebelum lanjut ke langkah berikutnya
- **Monitor GitHub Actions logs** untuk troubleshooting
- **Backup files** sebelum membuat perubahan besar
- **Follow naming conventions** untuk consistency

## 🚀 **EXECUTION COMMAND**

Jalankan semua langkah di atas secara berurutan tanpa melewatkan satu pun. Mulai dengan FASE 1 dan lanjutkan hingga FASE 7. Setiap fase harus completed sebelum lanjut ke fase berikutnya. Good luck! 🎉
