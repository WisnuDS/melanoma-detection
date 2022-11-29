<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $gender
 * @property string $age
 * @property string $skin_lession_position
 * @property string $image_path
 * @property string $machine_diagnosis_result
 * @property string $doctor_diagnosis_result
 * @property string $created_at
 * @property string $updated_at
 */
class Diagnosis extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'diagnosis';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'gender', 'age', 'skin_lession_position', 'image_path', 'machine_diagnosis_result', 'doctor_diagnosis_result', 'createdBy', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'createdBy');
    }
}
