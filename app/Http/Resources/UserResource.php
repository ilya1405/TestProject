<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class UserResource extends JsonResource
{
    /**
     *
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /* @var User|UserResource $this */
        return [
            'id' => $this->id,
            'email' => $this->email,
            'email_verified' => $this->hasVerifiedEmail(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
