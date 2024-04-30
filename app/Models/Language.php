<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    protected $table = 'language';
    public $timestamps = false;
    protected $dates = ['deleted_at'];

    public const AVAILABLE = ['en' => 'en', 'zh' => 'zh-Hans', 'fr' => 'fr-FR'];

    public const DEFAULT = 'en';

    protected $fillable = [ 
        'version',
        'global_id', 
        'code'
    ];
}
