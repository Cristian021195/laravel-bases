<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /*protected $fillable = [ //assignación masiva: campos permitidos para create.
        'title',
        'slug',
        'category',
        'content'
    ];*/
    protected $guarded = [ //lo contrario, aqui se ignorar los valores para asignación masiva
        'is_active'
    ];
    protected $table = 'posts';

    protected function title(): Attribute{
        return Attribute::make(
            set: fn (string $v): string => strtolower($v),//mutador
            get: fn (string $v): string => ucfirst($v),//mutador
        ); 
    }

    protected function casts(): array {
        // los
        return [
            'published_at'=>'datetime',
            'is_active'=>'boolean'
        ];
    }

    public function getRouteKeyName(){ 
        //si bien no nos funcionó, podemos sobre escribir la variable de busqueda, por defecto es $obj->id, aqui pasa a ser $obj->title
        return 'slug';
    }
}
