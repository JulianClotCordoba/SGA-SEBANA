<?php

namespace App\Modules\JuntaDirectiva\Controllers;
use App\Modules\JuntaDirectiva\Models\JuntaDirectivaModel;

class JuntaDirectivaController
{

   public function index()
   {
      $model = new JuntaDirectivaModel();
      $junta = $model->getJuntaDirectiva();

      require BASE_PATH . '/app/modules/JuntaDirectiva/View/index.php';
   }
}