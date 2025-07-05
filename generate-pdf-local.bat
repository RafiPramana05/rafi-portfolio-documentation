@echo off
echo ============================================
echo   GENERATE PDF FROM MARKDOWN - LOCAL SCRIPT
echo ============================================
echo.

REM Check if pandoc is installed
pandoc --version >nul 2>&1
if %errorlevel% neq 0 (
    echo ❌ ERROR: Pandoc not installed!
    echo.
    echo Please install Pandoc first:
    echo 1. Download: https://pandoc.org/installing.html
    echo 2. Or use Chocolatey: choco install pandoc
    echo.
    pause
    exit /b 1
)

echo ✅ Pandoc found!
echo.

REM Create custom CSS for styling
echo 📝 Creating custom CSS for syntax highlighting...
(
echo /* Professional PDF Styling */
echo body {
echo     font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
echo     line-height: 1.6;
echo     color: #333;
echo     max-width: none;
echo     margin: 0;
echo     padding: 20px;
echo }
echo.
echo /* Headers */
echo h1, h2, h3, h4, h5, h6 {
echo     color: #2c3e50;
echo     font-weight: 700;
echo     margin-top: 2rem;
echo     margin-bottom: 1rem;
echo }
echo.
echo h1 { font-size: 2.5rem; border-bottom: 3px solid #3498db; padding-bottom: 0.5rem; }
echo h2 { font-size: 2rem; border-bottom: 2px solid #95a5a6; padding-bottom: 0.3rem; }
echo h3 { font-size: 1.5rem; color: #34495e; }
echo.
echo /* Code blocks dengan background hitam */
echo pre {
echo     background-color: #1e1e1e !important;
echo     border: 1px solid #444;
echo     border-radius: 8px;
echo     padding: 1.5rem;
echo     overflow-x: auto;
echo     margin: 1.5rem 0;
echo     box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
echo }
echo.
echo code {
echo     background-color: #1e1e1e !important;
echo     color: #d4d4d4;
echo     padding: 0.3rem 0.5rem;
echo     border-radius: 4px;
echo     font-family: 'Consolas', 'Monaco', 'Courier New', monospace;
echo     font-size: 0.9rem;
echo }
echo.
echo /* Syntax highlighting colors */
echo .sourceCode .kw { color: #c586c0; font-weight: bold; }  /* Keywords ungu */
echo .sourceCode .dt { color: #f9c74f; }  /* HTML tags oranye kekuningan */
echo .sourceCode .st { color: #ce9178; }  /* Strings */
echo .sourceCode .co { color: #6a9955; font-style: italic; }  /* Comments */
echo .sourceCode .at { color: #92c5f7; }  /* Attributes */
echo.
echo /* Screenshot markers styling */
echo p strong:first-child {
echo     background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
echo     color: white;
echo     padding: 0.8rem 1.2rem;
echo     border-radius: 8px;
echo     display: block;
echo     margin: 2rem 0 1rem 0;
echo     font-size: 0.9rem;
echo     font-weight: 600;
echo     box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
echo }
) > pdf-style.css

echo ✅ CSS styling created!
echo.

REM Check if documentation file exists
if not exist "DOKUMENTASI_WEBSITE_RAFI_PRAMANA_PUTRA.md" (
    echo ❌ ERROR: Documentation file not found!
    echo Please make sure DOKUMENTASI_WEBSITE_RAFI_PRAMANA_PUTRA.md exists in current directory.
    echo.
    pause
    exit /b 1
)

echo ✅ Documentation file found!
echo.

REM Generate PDF with pandoc
echo 🚀 Generating PDF with professional styling...
echo.

pandoc "DOKUMENTASI_WEBSITE_RAFI_PRAMANA_PUTRA.md" ^
  -o "Dokumentasi_Portfolio_Rafi_Pramana_Putra.pdf" ^
  --from markdown ^
  --to pdf ^
  --pdf-engine=wkhtmltopdf ^
  --highlight-style=breezedark ^
  --css=pdf-style.css ^
  --toc ^
  --toc-depth=3 ^
  --metadata title="Dokumentasi Website Portfolio Rafi Pramana Putra" ^
  --metadata author="Rafi Pramana Putra" ^
  --metadata date="%DATE%" ^
  --margin-top 20mm ^
  --margin-bottom 20mm ^
  --margin-left 20mm ^
  --margin-right 20mm

if %errorlevel% eq 0 (
    echo.
    echo ✅ SUCCESS! PDF generated successfully!
    echo 📄 File: Dokumentasi_Portfolio_Rafi_Pramana_Putra.pdf
    echo.
    echo 🎨 Features included:
    echo - Professional styling dengan syntax highlighting
    echo - Background hitam untuk code blocks
    echo - Warna ungu untuk keywords
    echo - Warna oranye kekuningan untuk HTML tags
    echo - Table of contents dengan numbering
    echo - Responsive layout untuk print
    echo.
    
    REM Clean up temporary CSS file
    del pdf-style.css
    
    echo 🔍 Opening PDF...
    start "" "Dokumentasi_Portfolio_Rafi_Pramana_Putra.pdf"
) else (
    echo.
    echo ❌ ERROR: Failed to generate PDF!
    echo.
    echo Possible solutions:
    echo 1. Install wkhtmltopdf: https://wkhtmltopdf.org/downloads.html
    echo 2. Or try with different PDF engine:
    echo    - Install MiKTeX for LaTeX support
    echo    - Or use built-in engines
    echo.
)

echo.
pause
