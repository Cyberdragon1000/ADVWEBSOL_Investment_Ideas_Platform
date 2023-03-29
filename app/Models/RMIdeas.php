<?php

namespace App\Models;

use CodeIgniter\Model;

class RMIdeas extends Model
{
    public function getideasrm() {
        $builder = $this->db->table('ideas');
        $builder->select('ideas.*,user_login.first_name');
        $builder->where(' ideas.idea_number NOT IN (SELECT idea_id FROM decision)');
        $builder->where(' ideas.approval !="R"');
        $builder->join('user_login', 'user_login.id = ideas.author_id', 'inner');
        return $builder->get()->getResultArray();
    }

    public function getselectedidea($id) {
        $builder = $this->db->table('ideas');
        $builder->select('ideas.*,user_login.first_name');
        $builder->where('idea_number', $id);
        $builder->join('user_login', 'user_login.id = ideas.author_id', 'inner');
        return $builder->get()->getrow();
    }
    public function getselectedideadecisions($id) {
        $builder = $this->db->table('decision');
        $builder->select('decision.decision,investorprefs.name');
        $builder->where('idea_id', $id);
        $builder->join('investorprefs', 'decision.investor_id = investorprefs.investor_id', 'inner');
        return $builder->get()->getResultArray();
    }
    public function getideanotsentlist($id) {
        $builder = $this->db->table('investorprefs');
        $builder->distinct();
        $builder->select('investorprefs.investor_id,investorprefs.name');
        $builder->from('decision');
        $builder->where('NOT EXISTS (
            SELECT 1
            FROM decision,investorprefs
            WHERE decision.idea_id = '.$id . ' AND decision.investor_id = investorprefs.investor_id)');
        return $builder->get()->getResultArray();
    }
    public function sendfordecision($ideaid,$investorid) {
        $builder = $this->db->table('decision');
        $data = array(
            'idea_id' => $ideaid,
            'investor_id' =>$investorid 
            );
            return $builder->insert($data);
        
    }

    public function getrmsentideas($id) {
        $builder = $this->db->table('ideas');
        $builder->select('*');
        $builder->where(' ideas.idea_number IN (SELECT idea_id FROM decision WHERE decision.decision = \'P\' AND decision.investor_id ='. $id . ')');
        return $builder->get()->getResultArray();
    }

    public function getmyideas($id) {
        $builder = $this->db->table('ideas');
        $builder->select('*');
        $builder->where('author_id', $id);
        return $builder->get()->getResultArray();
    }

    public function getideasinvestedin($id) {
        $builder = $this->db->table('ideas');
        $builder->select('ideas.*,user_login.first_name');
        $builder->where(' ideas.idea_number IN (SELECT idea_id FROM decision WHERE decision.investor_id = )'. $id );
        $builder->join('user_login', 'user_login.id = ideas.author_id', 'inner');
        return $builder->get()->getResultArray();
    }
}