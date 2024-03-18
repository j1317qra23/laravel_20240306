<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function parseData(Request $request)
    {
        // 接收從前端傳來的資料（在這裡是 JSON 格式）
        $data = json_decode($request->getContent(), true);

        // 將 Username 資料全部改為小寫字母
        foreach ($data as &$user) {
            $user['username'] = strtolower($user['username']);
            $user['email'] = '<a href="mailto:' . $user['email'] . '">' . $user['email'] . '</a>';
        }

        // 將處理後的資料回傳給前端
        return response()->json($data);
    }
}
