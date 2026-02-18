<?php

namespace App\Core;

class Flasher {
    public static function setFlash($pesan, $aksi, $tipe)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            $type = $_SESSION['flash']['tipe'] ?? 'info';
            $styles = [
                'success' => 'bg-emerald-50 border-emerald-200 text-emerald-800',
                'danger' => 'bg-rose-50 border-rose-200 text-rose-800',
                'warning' => 'bg-amber-50 border-amber-200 text-amber-800',
                'info' => 'bg-blue-50 border-blue-200 text-blue-800',
            ];

            $styleClass = $styles[$type] ?? $styles['info'];
            $pesan = htmlspecialchars($_SESSION['flash']['pesan'] ?? '', ENT_QUOTES, 'UTF-8');
            $aksi = htmlspecialchars($_SESSION['flash']['aksi'] ?? '', ENT_QUOTES, 'UTF-8');

            echo '<div class="rounded-lg border px-4 py-3 text-sm ' . $styleClass . '" role="alert">' .
                    $pesan . ' <strong>' . $aksi . '</strong>' .
                '</div>';
                
            unset($_SESSION['flash']);
        }
    }
}
