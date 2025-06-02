<?php 
namespace App\Models;

use CodeIgniter\Model;

class Users extends Model{
    protected $table = 'user';
    protected $primaryKey = 'userID';
    protected $allowedFields = ['nombre', 'apellido', 'mail', 'usuario', 'perfilID', 'baja','password','loggedIn'];

    public function marcarComoBaja($id)
    {
        return $this->update($id, ['baja' => 1]);
    }
    
    public function marcarComoAlta($id)
    {
        return $this->update($id, ['baja' => 0]);
    }
}