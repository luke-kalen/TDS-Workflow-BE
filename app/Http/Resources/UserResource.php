<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'email' => $this->email,
            'role' => $this->role,
            'avatar' => $this->avatar,
            'avatarApproved' => $this->isAvatarApproved(),
            'avatarColor' => $this->avatar_color,
            'isAdmin' => $this->isAdmin(),
            'emailVerified' => $this->email_verified_at,
            'organization' => $this->organization,
            'department' => $this->department,
            'workflow_tasks' => WorkflowResource::collection($this->projects)
        ];
    }
}
