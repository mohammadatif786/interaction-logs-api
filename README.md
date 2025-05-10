<h1>🔥 Laravel Interaction & Session Tracker API</h1>

<p>
  This project is a <strong>secure Laravel REST API</strong> built with Sanctum authentication. 
  It tracks user interactions (clicks, scrolls, etc.) and session login/logout events.
</p>

<hr/>

<h2>🚀 Features</h2>
<ul>
  <li>✅ Secure User Registration & Login (using Laravel Sanctum)</li>
  <li>✅ Log user interactions like clicks, scrolls, and visits</li>
  <li>✅ Retrieve interaction stats (grouped & filtered)</li>
  <li>✅ Track session login and logout timestamps</li>
  <li>✅ API error handling with clean JSON responses</li>
  <li>✅ Fully token-based authentication (Bearer Token)</li>
</ul>

<hr/>

<h2>📦 Installation</h2>

<pre>
git clone https://github.com/mohammadatif786/my-api.git
cd my-api
composer install
cp .env.example .env
php artisan key:generate
</pre>

<p><strong>Setup database:</strong> Update <code>.env</code> with your DB credentials, then run:</p>

<pre>php artisan migrate</pre>

<hr/>

<h2>🔐 Authentication Endpoints</h2>

<h3>📄 Register</h3>
<pre>POST /api/register</pre>

<b>Body Params:</b>

<pre>
name: string
email: string
password: string
password_confirmation: string
</pre>

<h3>🔑 Login</h3>
<pre>POST /api/login</pre>

<b>Body Params:</b>

<pre>
email: string
password: string
</pre>

<hr/>

<h2>📊 Interaction Logging API</h2>

<h3>📝 Log Interaction</h3>
<pre>POST /api/interactions</pre>

<b>Headers:</b>

<pre>Authorization: Bearer {token}</pre>

<b>Body Params:</b>

<pre>
page_url: string
event_type: string  (e.g., click, scroll)
event_data: object  (JSON)
</pre>

<h3>📥 Get Interactions</h3>
<pre>GET /api/interactions</pre>

<b>Optional Query Params:</b>

<pre>
event_type: string
from: date (Y-m-d)
to: date (Y-m-d)
</pre>

<h3>📈 Get Stats</h3>
<pre>GET /api/interactions/stats</pre>

Returns event count grouped by event_type:

<pre>
{
  "click": 20,
  "scroll": 5
}
</pre>

<hr/>

<h2>🕒 Session Tracking API</h2>

<h3>📜 Get Last 5 Sessions</h3>
<pre>GET /api/sessions</pre>

<b>Headers:</b>

<pre>Authorization: Bearer {token}</pre>

<b>Response:</b>

<pre>
[
  {
    "login_at": "2025-05-10T12:00:00.000000Z",
    "logout_at": "2025-05-10T14:00:00.000000Z"
  }
]
</pre>

<hr/>

<h2>⚠️ Error Handling</h2>

<p>All validation and exceptions return JSON format:</p>

<pre>
{
  "message": "Validation failed",
  "errors": {
    "email": ["The email field is required."]
  }
}
</pre>

<hr/>

<h2>🛡️ Security</h2>
<ul>
  <li>✔️ Sanctum API tokens (hashed and secure)</li>
  <li>✔️ CSRF protection (for web routes)</li>
  <li>✔️ Validated requests using Form Requests</li>
  <li>✔️ Token-based session tracking</li>
  <li>✔️ IP address and User-Agent captured on interaction</li>
</ul>

<hr/>

<h2>📝 Bonus Features (Optional)</h2>
<ul>
  <li>Pagination support for <code>/api/interactions</code></li>
  <li>Filter interactions by <code>event_type</code> or date range</li>
  <li>Track device info using User-Agent</li>
  <li>Logout from all devices API (coming soon)</li>
</ul>

<hr/>
