<?php

namespace App\Models;

use CodeIgniter\Model;

class RMIdeas extends Model
{
    public function getideasrm() {
        $builder = $this->db->table('ideas');
        $builder->select('*');
        // not needed $builder->where('status', 'active');
        return $builder->get()->getResultArray();
    }
}