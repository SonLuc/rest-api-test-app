<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class EventController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return Event::paginate();
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(EventRequest $request)
	{
		$event = Event::create($request->all());

		// Una vez creado el evento, lo devolvemos en formato JSON con un código de respuesta HTTP 201 (CREATED).
		return response()->json(['event', $event], Response::HTTP_CREATED);
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Event $event)
	{
		return $event;
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(EventRequest $request, Event $event)
	{
		$event->update($request->all());
		return response()->json(['event', $event], Response::HTTP_OK);
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Event $event)
	{
		$event->delete();
		return response()->json(['event' => $event], Response::HTTP_ACCEPTED);
	}
}
