<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use Illuminate\Support\Facades\Validator;

class ChatbotController extends Controller
{
    public function submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'nullable|string|max:255', // e.g. Support, Sales, Other
            'message' => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            Lead::create([
                'type' => 'chatbot',
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'subject_or_service' => $request->input('subject', 'Chatbot Inquiry'),
                'message' => $request->input('message'),
                'status' => 'new',
                'reference_page' => url()->previous(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Message received successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while saving your message.'
            ], 500);
        }
    }
}
