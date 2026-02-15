<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamRegistrationController extends Controller
{
    public function register(Request $request)
    {
        // Валидация данных
        $validator = Validator::make($request->all(), [
            'team_name' => 'required|string|max:255',
            'captain_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email',
            
            'players' => 'required|array|size:5',
            'players.*.full_name' => 'required|string|max:255',
            'players.*.birth_date' => 'required|date',
            'players.*.nickname' => 'required|string|max:255',
            'players.*.steam_link' => 'required|string',
            'players.*.phone' => 'required|string|max:20',
            'players.*.is_captain' => 'boolean',
            'players.*.is_contact_person' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        // Создаем команду
        $team = Team::create([
            'team_name' => $request->team_name,
            'captain_name' => $request->captain_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'status' => 'pending'
        ]);

        // Создаем игроков
        foreach ($request->players as $playerData) {
            Player::create([
                'team_id' => $team->id,
                'full_name' => $playerData['full_name'],
                'birth_date' => $playerData['birth_date'],
                'nickname' => $playerData['nickname'],
                'steam_link' => $playerData['steam_link'],
                'phone' => $playerData['phone'],
                'is_captain' => $playerData['is_captain'] ?? false,
                'is_contact_person' => $playerData['is_contact_person'] ?? false,
            ]);
        }

        return response()->json([
            'message' => 'Ваша команда находится на рассмотрении. Мы свяжемся с вами для подтверждения.',
            'team_id' => $team->id
        ], 201);
    }
}