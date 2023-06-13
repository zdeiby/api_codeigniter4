<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\userModel;

class notes extends ResourceController
{   
  protected $modelName = 'App\Models\userModel';
  protected $format    = 'json';

    public function index()
    {   
       return $this->respond($this->model->findAll());
    }

    public function create()
    {
      $form = $this->request->getJSON(true);

     if(!$this->model->insert($form)){
      return $this->failValidationErrors($this->model->errors());
     };
       
     // $note = $this->model->find($id);
      return $this->respondCreated(['message'=>'registro creado correctamente']);
    }

    public function update($id = null){
      $form = $this->request->getJSON(true);
      if(empty($form)){
         return $this->failValidationErrors('No escribio nada');
      }

      if(!$this->model->find($id)){
         return $this->failNotFound();
      }
      
      if(!$this->model->update($id, $form)){
         return $this->failValidationErrors($this->model->errors());
      }

      return $this->respondUpdated([
         'message'=>'Actualizado con exito',
         'data'=>$this->model->find($id)
      ]);
    }

    public function delete($id=null){
      if(!$this->model->find($id)){
         return $this->failNotFound();
      }
      $this->model->where('id',$id)->delete();

      return $this->respondDeleted([
         'message'=>'borrado con exito',
         'data '=>"Registro {$id} fue eliminado con exito."
      ]);
    }
   
}