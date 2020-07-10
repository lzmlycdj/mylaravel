<?php 

namespace App\Http\Controllers;
use App\Service\AwesomeServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TestController extends Controller
{
     public function doAwesome(AwesomeServiceInterface $awesome_service)
     {
         $awesome_service->doAwesomeThing();
         echo 'sfsfsdf';
         exit;
         return new Response();
     }
}