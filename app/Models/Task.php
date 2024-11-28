<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tasks';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dni',
        'title',
        'description',
        'expired_at',
        'status_id',
    ];

    /**
     * Protected attributes that CANNOT be mass assigned.
     *
     * @var array
     */
    protected $guarded = [
        'id',
        'code',
    ];

    public function status()
    {
    	return $this->belongsTo(Status::class);
    }

    /**
     * Boot function for using with Task Events
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        
        self::creating(function(Task $object) {
            $preCode = 'T'.date('Y');
            $maxCode = Task::where('code', 'like', "$preCode%")->max(\DB::raw('substr(code,6,3)'));
            $object->code = $preCode.str_pad(++$maxCode, 3, '0', STR_PAD_LEFT);
            return true;
        });
    }
}
