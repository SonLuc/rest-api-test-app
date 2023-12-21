<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	use HasFactory;

	protected $fillable = [
		'event_name',
		'event_date',
		'event_max_capacity',
		'event_speaker_name',
		'event_location_name',
		'event_meetup_url',
		'event_is_virtual',
	];

	public static $rules = [
		"event_name" => ['required', 'unique:App\Models\Event,event_name', 'max:255'],
		"event_date" => ['required', 'date'],
		"event_max_capacity" => ['required', 'integer' ,'min:2', 'max:100'], // Multiple rules in Array format
		"event_speaker_name" => ['required', 'max:255'],
		"event_location_name" => 'nullable|max:255', //Multiple rules in String format
		"event_meetup_url" => 'nullable|url',
		"event_is_virtual" => ['required', 'boolean']
];
}
