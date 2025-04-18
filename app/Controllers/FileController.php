<?php

namespace App\Controllers;

class FileController
{
  public function index($fileName)
  {
    // Define um diretório base para os arquivos. É importante para segurança limitar o acesso.
    $baseDir = realpath(__DIR__ . '/../../public/files');

    foreach (FILES_DIR as $fileDir) {
      // Constrói o caminho absoluto do arquivo
      $filePath = realpath($baseDir . DIRECTORY_SEPARATOR . $fileDir . DIRECTORY_SEPARATOR . trim($fileName, '/'));

      // Verifica se o arquivo existe e se está dentro da pasta permitida
      if ($filePath || strpos($filePath, $baseDir) === 0 || is_file($filePath)) {
        $this->serve($filePath);
        return;
      }
    }

    $found = $this->findFileByName($baseDir, $fileName);

    if ($found) {
      $this->serve($found);
      return;
    }



    header("HTTP/1.0 404 Not Found");
    echo 'Arquivo não encontrado ou acesso negado.';
    return;
  }

  private function serve($path)
  {
    // Detecta o tipo de conteúdo do arquivo
    $mimeType = mime_content_type($path);

    // Configura os headers para envio do arquivo
    header('Content-Type: ' . $mimeType);
    header('Content-Length: ' . filesize($path));
    header('Content-Disposition: inline; filename="' . basename($path) . '"');

    // Limpa o buffer e envia o arquivo
    flush();
    readfile($path);
  }

  private function findFileByName($baseDir, $fileName)
  {
    $it = new \RecursiveIteratorIterator(
      new \RecursiveDirectoryIterator($baseDir, \FilesystemIterator::SKIP_DOTS)
    );
    foreach ($it as $file) {
      if ($file->getFileName() === $fileName) {
        return $file->getPathName();
      }
    }

    return null;
  }
}
