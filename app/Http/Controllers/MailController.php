<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
   public static function partnerEmail($data)
   {
      Mail::send(['text' => 'mail'], $data, function($message) {
         $message->to('cenkgrs@gmail.com', 'BySuraBaby')->subject('Partner Email');
         $message->from('info@bysurababy.com','info@bysurababy');
      });

   }
}