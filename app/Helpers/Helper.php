<?php

namespace App\Helpers;

use IntlDateFormatter;
use App;
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

    public static function getHumanizedDate($date, $hour = false)
    {
        $date_lang = 'tr_TR';

        if (App::getLocale() === 'en') {
            $date_lang = 'en_EN';
        }

        $pattern = "dd LLLL yyyy eeee";

        if ($hour) {
            $pattern = "dd LLLL yyyy eeee hh:mm";
        } 
        
        $dateFormatLong = new IntlDateFormatter($date_lang, IntlDateFormatter::FULL, IntlDateFormatter::FULL);
        $dateFormatLong->setPattern($pattern);

        return $dateFormatLong->format($date);
    }
}