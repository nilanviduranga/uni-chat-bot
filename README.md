# 🎓 Nexora - Laravel Backend / Web Chat App Chat Module

This Laravel backend module and web chat application power the Nexora Campus Copilot, a smart assistant platform designed for university students. The system enables secure OTP-based authentication, real-time AI-integrated chat, and structured data delivery to intelligent agents through robust APIs. The Laravel backend acts as the central bridge between university services and AI systems, while the web-based chat interface provides students with a user-friendly platform to interact with the assistant. Both the backend and web app are designed to support seamless communication across web and mobile platforms.

---
## 📌 Key Features

### 🔐 OTP-Based Student Authentication
- Students log in using a **One-Time Password (OTP)** sent to their **registered university email**.
- OTPs are securely hashed and expire after a set time.
- Registration is verified against the official university database.
- Includes mobile-first API design with Laravel Sanctum for token-based access.

### 💬 Web Chat Interface (Laravel)
- Developed using **Laravel Blade** components.
- Seamless interaction with AI agents via real-time chat.
- Powered by **Laravel Echo / Pusher / Laravel Reverb** for event broadcasting.

### 🧠 AI Assistant API Integration
- Provides endpoints for agentic AI services to access structured university data:
  - Student schedule
  - Cafeteria menu
  - Events
- Responses are optimized for **LLM input consumption**.

### 🔗 External System Communication
- Laravel HTTP clients are used to integrate with:
  - Agentic backend (FastAPI)
  - External APIs
- Ensures compatibility with Retrieval-Augmented Generation (RAG) pipelines.
  
---

## ⚙️ Tech Stack

| Layer              | Technology                     |
|-------------------|---------------------------------|
| Backend Framework | Laravel 12                      |
| Auth System       | OTP + Laravel Sanctum           |
| Database          | MySQL                           |
| Realtime Chat     | Pusher                          |
| API Integration   | Laravel HTTP Client             |
| Deployment        | Apache                          |

---
## 👨‍💻 Developer Responsibility

- Implemented OTP-based login system                                 
 - Developed RESTful APIs for AI agent access                         
- Built Laravel Blade web chat interface                            
- Connected Laravel to agentic backend services and data pipelines   
- Managed student data schema and chat metadata in MySQL             

---

## 🔒 Security Considerations

- All inputs validated using Laravel `FormRequest`.
- OTPs hashed and stored with expiration checks.
- Authenticated APIs protected via `auth:sanctum` middleware.
- Future support for role-based access control (RBAC).

---

## 📱 Screenshots

<div align="center">
    
...
## 🚀 Future Enhancements

- Expanded admin/teacher-level access controls.
- Voice-enabled login and query interaction (via Whisper).
- Push notifications for important campus events.
