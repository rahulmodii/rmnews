<?php

namespace RM\News\models;

use Illuminate\Database\Eloquent\Model;

class Rmnews extends Model
{
    protected $fillable=['name','image','description','order'];
}
