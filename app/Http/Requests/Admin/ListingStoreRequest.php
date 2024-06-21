<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ListingStoreRequest extends FormRequest
{


    public function rules(): array
    {
        return [
            'image' => ['required', 'image', 'max:3000'],
            'thumbnail_image' => ['required', 'image', 'max:3000'],
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'integer'],
            'location' => ['required', 'integer'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'website' => ['nullable', 'url'],
            'facebook_link' => ['nullable', 'url'],
            'x_link' => ['nullable', 'url'],
            'linkedin_link' => ['nullable', 'url'],
            'whatsapp_link' => ['nullable', 'url'],
            'attachment' => ['nullable', 'mimes:png,jpg,csv,pdf', 'max:10000'],
            'amenities.*' => ['nullable', 'integer'],
            'description' => ['required'],
            'seo_title' => ['nullable', 'email', 'max:255'],
            'seo_description' => ['nullable', 'email', 'max:255'],
            'google_map_embed_code' => ['nullable'],
            'status' => ['required', 'boolean'],
            'is_featured' => ['required', 'boolean'],
            'is_verified' => ['required', 'boolean'],

        ];
    }
}
