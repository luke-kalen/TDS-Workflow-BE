<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrganizationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'departments' => DepartmentResource::collection($this->departments),
            'employees' => UserResource::collection($this->employees),
            'projects' => ProjectResource::collection($this->projects)
        ];
    }
}
