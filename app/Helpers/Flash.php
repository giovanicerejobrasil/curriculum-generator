<?php
namespace App\Helpers;

class Flash {
    public static function set(string $type, string $message): void
    {
        if (!session_id()) {
            session_start();
        }

        $_SESSION['flash'][$type] = $message;
    }

    public static function get(string $type): ?string
    {
        if (!session_id()) {
            session_start();
        }
        return $_SESSION['flash'][$type] ?? null;
    }

    public static function display(): void
    {
        if (!session_id()) {
            session_start();
        }

        if (!empty($_SESSION['flash'])) {
            foreach ($_SESSION['flash'] as $type => $message) {
                $class = match ($type) {
                    'success' => 'flash-success',
                    'error' => 'flash-error',
                    'warning' => 'flash-warning',
                    default => 'flash-info'
                };
                echo "<div class='flash {$class}'>{$message}</div>";
            }

            unset($_SESSION['flash']); // limpa após exibir
        }
    }
}