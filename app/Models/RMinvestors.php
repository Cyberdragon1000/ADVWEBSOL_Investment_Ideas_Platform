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

    public function getpreferences($investorid) {
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
    
    public function sendfordecision($id,$choice,$idea) {
        $builder = $this->db->table('decision');
        $builder->set('decision', $choice);
        $builder->where('investor_id', $id);
        $builder->where('idea_id', $idea);
        return $builder->update();
    }

//not necessary now that we've changed it so that rm drops
    public function sendfordelete($id,$idea) {
        $builder = $this->db->table('decision');
        $builder->where('investor_id', $id);
        $builder->where('idea_id', $idea);
        return $builder->delete();
    }

    public function getapprovedideas($id) {
        $builder = $this->db->table('ideas');
        $builder->select('*');
        $builder->where(' ideas.idea_number IN (SELECT idea_id FROM decision WHERE decision.decision = \'A\' AND decision.investor_id ='. $id . ')');
        return $builder->get()->getResultArray();
    }

    public function getmyapprovedideas($id) {
        $builder = $this->db->table('ideas');
        $builder->select('*');
        $builder->where(' ideas.idea_number IN (SELECT idea_id FROM decision WHERE decision.decision = \'A\' )');
        $builder->where('author_id', $id);
        return $builder->get()->getResultArray();
    }
    public function ideadelete($idea) {
        $builder = $this->db->table('ideas');
        $builder->where('idea_number', $idea);
        return $builder->delete();
    }

    public function ideaenter($title,$abs,$auth,$risk,$pd,$ed,$cont,$cur,$int,$pt,$maj,$min,$reg,$con){
        $data = array(
            'title' => $title,
            'abstract' =>$abs,
            'published_on' => $pd,
            'expires_on' => $ed,
            'author_id' =>$auth ,
            'content' => $cont,
            'risk' => $risk,
            'product_type' => $pt,
            'instruments' => $int,
            'currency' => $cur,
            'major_sector' => $maj,
            'minor_sector' => $min,
            'region' => $reg,
            'country' =>$con  
          );
         
         $this->db->table('ideas')->insert($data);

    }

    public function prefupdate($id,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l){
        $data = array();
        $builder = $this->db->table('investorprefs');
        $this->addnotempty($a,'name',$builder);
        $this->addnotempty($d,'key_terms',$builder);
        $this->addnotempty($b,'expires_on',$builder);
        $this->addnotempty($g,'preferences',$builder);
        $this->addnotempty($c,'risk',$builder);
        $this->addnotempty($f,'product_type',$builder);
        $this->addnotempty($e,'instruments',$builder);
        $this->addnotempty($h,'currency',$builder);
        $this->addnotempty($i,'major_sector',$builder);
        $this->addnotempty($j,'minor_sector',$builder);
        $this->addnotempty($k,'region',$builder);
        $this->addnotempty($l,'country',$builder);
        $builder->where('investor_id', $id);
        $builder->update();
        
    }

    public function addnotempty($str,$field,$builder){
        if (!empty($str)) {
            $builder->set($field,$str);
        }
        return;
    }
}

