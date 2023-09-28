<?php
// Caminho para a pasta de imagens
$folderPath = 'img/';

// Lista de extensões de imagem suportadas
$supportedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

// Função para verificar se um arquivo é uma imagem com base na extensão
function isImageFile($filename, $extensions) {
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    return in_array(strtolower($ext), $extensions);
}

// Obtém a lista de arquivos na pasta
$files = scandir($folderPath);

// Filtra apenas os arquivos de imagem
$imageFiles = array_filter($files, function ($filename) use ($folderPath, $supportedExtensions) {
    return isImageFile($filename, $supportedExtensions);
});

// Escolhe aleatoriamente uma imagem da lista
$randomIndex = array_rand($imageFiles);
$selectedImage = $imageFiles[$randomIndex];

// Define o cabeçalho para a imagem
header("Content-Type: image/jpeg"); // Ajuste o tipo de imagem conforme necessário

// Envia a imagem como resposta
readfile($folderPath . $selectedImage);
?>
