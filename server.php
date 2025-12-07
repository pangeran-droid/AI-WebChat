<?php
// Set header agar output selalu dalam format JSON
header('Content-Type: application/json');

// Ambil pesan user dari body request (POST JSON)
$input = json_decode(file_get_contents("php://input"), true);
$userMessage = $input["message"] ?? "";

if (!$userMessage) {
    echo json_encode(["error" => "Pesan tidak boleh kosong"]);
    exit;
}

// Ambil API key dari file config/config.php
// <?php return ['OPENROUTER_KEY' => 'YOUR_API_KEY'];
$configFile = __DIR__ . '/config/config.php';

if (!file_exists($configFile)) {
    echo json_encode(["error" => "config.php tidak ditemukan"]);
    exit;
}

// Load config.php dan ambil OPENROUTER_KEY
$config = include $configFile;
$apiKey = $config['OPENROUTER_KEY'] ?? null;

if (!$apiKey) {
    echo json_encode(["error" => "API key tidak ditemukan di config"]);
    exit;
}

// Baca system prompt dari file system_prompt.txt
$systemPromptFile = __DIR__ . "/system_prompt.txt";

if (!file_exists($systemPromptFile)) {
    echo json_encode(["error" => "File system_prompt.txt tidak ditemukan"]);
    exit;
}

$systemPrompt = file_get_contents($systemPromptFile);

// Siapkan request CURL ke API OpenRouter
$ch = curl_init("https://openrouter.ai/api/v1/chat/completions");

curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    // Header API wajib untuk autentikasi
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json",
        "Authorization: Bearer $apiKey",
        "User-Agent: AI-ChatBot/1.0"
    ],
    // Kirim pesan system + user ke model AI
    CURLOPT_POSTFIELDS => json_encode([
        "model" => "deepseek/deepseek-chat",   // model bisa diganti sesuai kebutuhan
        // "max_tokens" => 1000,
        "messages" => [
            ["role" => "system", "content" => $systemPrompt],
            ["role" => "user", "content" => $userMessage]
        ]
    ])
]);

// Eksekusi request CURL dan ambil respons API
$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo json_encode(["error" => curl_error($ch)]);
    exit;
}

// Ambil status kode HTTP dari API
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Decode respons OpenRouter
$decoded = json_decode($response, true);

// Jika gagal decode, kirim raw response
if (!$decoded) {
    $decoded = ["raw_response" => $response];
}

// Kirim kembali ke frontend
echo json_encode([
    "status" => $httpcode,
    "response" => $decoded
]);
?>
