<?php

namespace proyecto;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
	protected $fillable =['name','avatar'];
   /**
 * Get the route key for the model.
 *
 * @return string
 */
public function getRouteKeyName()
{
    return 'slug';
}
	//ESTA ES LA FUNCION QUE ESTA EN PokemonController y se especifica para realizar la muestra del list de pokemons
	public function pokemons(){
	 return $this->hasMany('proyecto\Pokemon'); // retorna la relacion  de uno a muchos
	 											// que un cliente tiene muchos pokemons	
	}


}
