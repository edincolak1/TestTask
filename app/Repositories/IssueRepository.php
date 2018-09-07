<?php

namespace App\Repositories;
 
use App\Issues;
 
class IssueRepository
{
  
  protected $issues;
 
  public function __construct(Issues $issues)
  {
    $this->issues = $issues;
  }
  
  public function all()
  {
    return $this->issues->all();
  }
 
  public function find($id)
  {
   return $this->issues->find($id);
  }
  
  public function update($id, array $attributes)
  {
  return $this->issues->find($id)->update($attributes);
  }
 
  public function delete($id)
  {
   return $this->issues->find($id)->delete();
  }
}