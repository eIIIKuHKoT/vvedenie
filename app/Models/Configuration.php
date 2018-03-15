<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Configuration
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $key
 * @property string $value
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Configuration whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Configuration whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Configuration whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Configuration whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Configuration whereValue($value)
 */
class Configuration extends Model
{


    protected $table = 'configuration';
    protected $fillable = ['key', 'value'];

    public static function getValue(string $key)
    {

        $config =  self::where('key', $key)->first();

        return $config ? $config->value : null;
    }


    public static function setValue(string $key, string $value):string
    {

        return self::updateOrCreate([
            'key' => $key,
            'value' => $value,
        ]);

    }

    public static function getValues(array $keys){

        $configs = self::where('key',$keys[0]);

        if(count($keys) > 1){
            for ($i = 1; $i < count($keys); $i++){
                $configs->orWhere('key',$keys[$i]);
            }
        }
        $result = $configs->get()->map(function ($config) {
            return [$config->key => $config->value];
        });

        return $result->toArray();
    }

    public static function setValues(array $configs){


        foreach ($configs as $config){
            if($config['key'] && $config['value']){
                self::updateOrCreate([
                    'key' => $config['key'],
                    'value' => $config['value'],
                ]);
            }
        }
    }
}



