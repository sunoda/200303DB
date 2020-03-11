<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property int $phone
 * @property string $message
 * @property string $created_at
 * @property string $updated_at
 */
class Contact extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Contact';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'phone', 'message', 'created_at', 'updated_at'];

}
