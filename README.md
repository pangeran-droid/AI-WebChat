# 🚀 AI WebChat – Simple PHP + JS Chatbot Using OpenRouter API

AI WebChat adalah aplikasi **chatbot berbasis web** yang menggunakan **OpenRouter API** dengan model AI seperti **DeepSeek**, **GPT**, dan lainnya. Dibuat menggunakan **HTML**, **CSS**, **JavaScript** untuk frontend, dan **PHP** untuk backend. Proyek ini ringan, responsif, dan mudah dipelajari.

Komunikasi dengan API dilakukan melalui server untuk menjaga **API Key** tetap aman dan tidak terbuka di browser.

---

## ✨ Fitur Utama

- 💬 **Chat interaktif** dengan AI secara realtime
- 🧠 Menggunakan model **AI** dari **OpenRouter** (bisa DeepSeek, GPT, Llama, dll)
- 🔐 **API Key** aman di server (.env) untuk mencegah kebocoran
- 📱 **UI modern & responsif**, kompatibel di desktop dan perangkat mobile
- ⚡ **Proses cepat** & **ringan**, cocok untuk chatbot atau personal assistant
- 🌙 **Dark Mode** untuk tampilan yang nyaman di malam hari
- 🔄 **Mudah dikembangkan** menjadi customer service, personal assistant, dll.

---

## 🔧 Cara Instalasi

### 1️⃣ Clone Repository  
   ```bash
   git clone https://github.com/pangeran-droid/AI-WebChat.git
   cd ai-web-chat
   ```

### 2️⃣ Masukkan API Key

Di dalam file config.php, simpan API key dengan cara berikut:
```bash
<?php return ['OPENROUTER_KEY' => 'YOUR_API_KEY'];
```
Gantilah 'YOUR_API_KEY' dengan API key yang kamu dapatkan dari penyedia layanan OpenRouter ([get one here](https://openrouter.ai/)).

### 3️⃣ Jalankan Server (XAMPP / Laragon / Hosting / Lainnya)

Letakkan seluruh project di folder:

XAMPP → htdocs/AI-WebChat

Laragon → www/AI-WebChat

Lalu akses di browser:

http://localhost/AI-WebChat/

### 🛠️ Teknologi yang Digunakan

- HTML5 + CSS3 – Frontend UI
- Vanilla JavaScript – Chat logic
- PHP – Server-side request handler
- OpenRouter API – AI model provider

### 📌 Roadmap Pengembangan

- 💾 Menyimpan riwayat chat pengguna
- 👤 Menambahkan avatar untuk AI dan pengguna
- ⚡ Menggunakan streaming response untuk chat lebih cepat
- 🎤 Multimodal: Upload gambar, suara, dll.
- 🤖 Integrasi dengan model AI lainnya seperti OpenAI GPT, Bing AI, dll.

### 📄 Lisensi

Proyek ini menggunakan lisensi MIT License.
Bebas digunakan untuk proyek personal maupun komersial.
