<?php 
function formatDate($tanggal)
{
    $timestamp = strtotime($tanggal);

    $today = strtotime(date("Y-m-d"));

    $diff = ($today - $timestamp) / (60 * 60 * 24);

    if ($diff == 0) {
        return "Hari ini";
    } elseif ($diff == 1) {
        return "Kemarin";
    } else {
        $daysOfWeek = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        $months = [
            1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", 
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];

        $dayOfWeek = date("w", $timestamp);
        $day = date("j", $timestamp);
        $month = date("n", $timestamp);
        $year = date("Y", $timestamp);

        return $daysOfWeek[$dayOfWeek] . ", " . $day . " " . $months[$month] . " " . $year;
    }
}
?>