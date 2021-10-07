<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ContactMessage
 *
 * @package JTelesforoAntonio\LaravelContactForm\Models
 * @property int $id
 * @property string $name
 * @property string $subject
 * @property string $email
 * @property string $message
 */
class ContactMessage extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contact_messages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'subject', 'email', 'message'
    ];
}