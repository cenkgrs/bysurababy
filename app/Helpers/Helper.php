<?php

namespace App\Helpers;

class Helper
{
    public static function getBookingStatus($status) 
    {
        $statuses = [
            1 => __('Sipariş Alındı'),
            2 => __('Siparişiniz Hazırlanıyor'),
            3 => __('Kargoya Verildi'),
            4 => __('Teslim Edildi'),
            5 => __('İptal Edildi'),
        ];

        return $statuses[$status];
    }

    public static function getBookingOperation($status)
    {
        $operations = [
            1 => "Cancel",
            2 => "Cancel",
            3 => "Refund",
            4 => "Refund",
        ];

        return $operations[$status];
    }
}