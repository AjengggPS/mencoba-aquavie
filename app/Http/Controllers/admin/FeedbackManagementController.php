<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedbackManagementController extends Controller
{
    public function index()
    {
        $feedbacks = [
            ['id' => 1, 'user' => 'user@example.com', 'type' => 'Saran', 'message' => 'Tolong tambahkan fitur export ke CSV juga...', 'date' => '20 Des 2025', 'status' => 'new'],
            ['id' => 2, 'user' => 'budidaya@mail.com', 'type' => 'Kritik', 'message' => 'Dashboard loading agak lambat saat...', 'date' => '19 Des 2025', 'status' => 'reviewed'],
            ['id' => 3, 'user' => 'tambak@mail.com', 'type' => 'Pengalaman', 'message' => 'Sangat membantu dalam monitoring...', 'date' => '18 Des 2025', 'status' => 'archived'],
            ['id' => 4, 'user' => 'pembudidaya@mail.com', 'type' => 'Saran', 'message' => 'Bisa ditambahkan dark mode?', 'date' => '20 Des 2025', 'status' => 'new'],
        ];

        $stats = [
            'total' => 156,
            'new' => 24,
            'reviewed' => 45,
            'archived' => 87,
        ];

        return view('admin.feedback', compact('feedbacks', 'stats'));
    }
}