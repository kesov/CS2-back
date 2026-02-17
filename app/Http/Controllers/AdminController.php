<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Player;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getTeams()
    {
        $teams = Team::with('players')->get();
        return response()->json($teams);
    }

    public function deleteTeam(Request $request, $id)
    {
        $password = $request->input('password');
        
        if ($password !== '123456') {
            return response()->json(['error' => 'Неверный пароль'], 403);
        }

        $team = Team::find($id);
        
        if (!$team) {
            return response()->json(['error' => 'Команда не найдена'], 404);
        }

        $team->delete(); // Каскадно удалятся и игроки благодаря внешнему ключу

        return response()->json(['message' => 'Команда успешно удалена']);
    }
}