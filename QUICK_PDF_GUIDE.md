# 🚀 QUICK PDF GENERATION GUIDE

## 🎯 **CURRENT SITUATION:**
GitHub Actions sedang troubleshooting. Sementara itu, gunakan alternatif ini untuk generate PDF.

## 📋 **ALTERNATIVE METHODS:**

### **Method 1: Local Generation (Recommended)**
1. **Install Pandoc**: https://pandoc.org/installing.html
2. **Run Script**: Double-click `generate-pdf-local.bat`
3. **Done!** PDF akan ter-generate dengan styling lengkap

### **Method 2: Online Converter (No Install)**
1. **Buka**: https://md-to-pdf.fly.dev/
2. **Upload**: File `DOKUMENTASI_WEBSITE_RAFI_PRAMANA_PUTRA.md`
3. **Download**: PDF hasil konversi
4. **Note**: Styling akan basic, tidak custom

### **Method 3: Typora (Best Quality)**
1. **Download**: https://typora.io/ (Free trial)
2. **Open**: File markdown
3. **Export**: File → Export → PDF
4. **Styling**: Automatic dengan syntax highlighting

### **Method 4: VS Code Extension**
1. **Install**: Extension "Markdown PDF"
2. **Open**: File markdown di VS Code
3. **Export**: Ctrl+Shift+P → "Markdown PDF: Export"
4. **Config**: Bisa custom styling di settings

---

## 🎨 **STYLING FEATURES (Yang sudah disetup):**

✅ **Background hitam** untuk code blocks (#1e1e1e)  
✅ **Keywords ungu** (#c586c0) untuk `button`, `class`, `function`  
✅ **HTML tags oranye kekuningan** (#f9c74f) untuk `<div class>`, etc  
✅ **Professional layout** dengan margins dan fonts  
✅ **Table of contents** dengan numbering  
✅ **Screenshot markers** dengan gradient background  

---

## 🔧 **GITHUB ACTIONS TROUBLESHOOTING:**

### **Possible Issues:**
1. **Repository permissions** - Actions might be disabled
2. **Workflow syntax** - YAML indentation issues
3. **Token permissions** - GITHUB_TOKEN scope limitations

### **Solutions to Try:**
1. **Enable Actions**:
   - Go to: Settings → Actions → General
   - Select: "Allow all actions and reusable workflows"

2. **Check Permissions**:
   - Settings → Actions → General → Workflow permissions
   - Select: "Read and write permissions"

3. **Manual Trigger**:
   - Actions tab → "Convert Markdown to PDF" → "Run workflow"

---

## 🎯 **NEXT STEPS:**

1. **Use local script** untuk generate PDF sekarang
2. **Debug GitHub Actions** untuk automasi kedepan
3. **Update documentation** kapan saja
4. **PDF auto-generate** setelah Actions fixed

---

**💡 Rekomendasi**: Gunakan **Method 1 (Local Script)** untuk hasil terbaik dengan styling lengkap!
