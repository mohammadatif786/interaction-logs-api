<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InteractionFormRequest;
use App\Models\Interaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InteractionController extends Controller
{
    public function index(Request $request)
    {
        $query = Interaction::where('user_id', $request->user()->id);

        if ($request->has('event_type')) {
            $query->where('event_typ', $request->event_type);
        }
        if ($request->has('from_date') && $request->has('to_date')) {
            $query->whereBetween('created_at', [$request->from_date, $request->to_date]);
        }

        $interaction = $query->orderBy('created_at', 'desc')->paginate(10);

        return response()->json($interaction);
    }

    public function store(InteractionFormRequest $request)
    {
        $interaction = Interaction::create([
            'user_id' => $request->user()->id,
            'page_url' => $request->page_url,
            'event_type' => $request->event_type,
            'event_data' => $request->event_data,
            'user_agent' => $request->header('User-Agent'),
            'ip_address' => $request->ip()
        ]);

        return response()->json([
            'message' => 'Interaction Logged Successfully',
            'data' => $interaction,
        ], 201);
    }


    public function stats(Request $request)
    {
        $stats = Interaction::select('event_type', DB::raw('count(*) as total'))
            ->where('user_id', $request->user()->id)
            ->groupBy('envent_type')
            ->get();

        return response()->json($stats);
    }
}
