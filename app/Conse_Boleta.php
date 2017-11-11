<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conse_Boleta extends Model {

    /**
     * The database connection used by the model.
     *
     */
    protected $connection = 'odbc';
    protected $table = 'Conse_Boleta';
    public $timestamps = false;

}
