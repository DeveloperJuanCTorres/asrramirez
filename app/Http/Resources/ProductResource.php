<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // Decodificamos la cadena JSON del campo 'images'
        $imageArray = json_decode($this->images, true);

        // Aseguramos que sea un array y obtenemos la primera imagen
        $firstImage = is_array($imageArray) && count($imageArray) > 0 ? $imageArray[0] : null;

        return [
            'id'            => $this->id,
            'id_sistema'    => $this->id_sistema,
            'taxonomy_id'   => $this->taxonomy_id,
            'taxonomy_name'      => $this->taxonomy->name ?? null,
            'brand_id'      => $this->brand_id,
            'brand_name'         => $this->brand->name ?? null,
            'name'          => $this->name,
            'description'   => $this->description,
            'information'   => $this->information,
            'price'         => $this->price,            
            'images'        => $firstImage
                            ? asset('storage/' . ltrim(str_replace('\\', '/', $firstImage), '/'))
                            : asset('img/defectomaster.jpeg'),
            'unidad_medida' => $this->unidad_medida,
            'stock'         => $this->stock,
            'slug'          => $this->slug,  
        ];
    }
}
