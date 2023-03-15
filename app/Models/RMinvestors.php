<?php

namespace App\Models;

use CodeIgniter\Model;

class RMinvestors extends Model
{
    public function getinvestorsrm() {
        $builder = $this->db->table('investorprefs');
        $builder->select('*');
        // not needed $builder->where('status', 'active');
        return $builder->get()->getResultArray();
    }

    public function getselectedinvestor($investorid) {
        $builder = $this->db->table('investorprefs');
        $builder->select('*');
        $builder->where('investor_id', $investorid);
        return $builder->get()->getrow();
    }

    public function getinvestordecision() {
        $builder = $this->db->table('decision');
        $builder->select('ideas.idea_number, ideas.title, ideas.abstract, ideas.expires_on, ideas.risk, investorprefs.name, decision.decision');
        $builder->join('ideas', 'decision.idea_id = ideas.idea_number', 'inner');
        $builder->join('investorprefs', 'decision.investor_id = investorprefs.investor_id', 'inner');

        return $builder->get()->getResultArray();
    }

    public function getselectedinvestordecisions($id) {
        $builder = $this->db->table('decision');
        $builder->select('*');
        $builder->where('investor_id', $id);
        return $builder->get()->getResultArray();
    }
}