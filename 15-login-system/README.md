# Day 15: Login System with Registration & Password Hashing

## What We'll Build

A login and registration system using PHP sessions with secure password hashing. Users are stored in a JSON file with hashed passwords.

## Prerequisites

Review these lessons before starting:

- [11-file-handling](../11-file-handling/) - `file_get_contents()`, JSON
- [13-sessions-cookies](../13-sessions-cookies/) - Sessions basics
- [14-password-hashing](../14-password-hashing/) - `password_hash()`, `password_verify()`
- [08-forms](../08-forms/) - Form handling with `$_POST`

## Project Structure

```
15-login-system/
├── users.json          # User credentials (hashed passwords)
├── register.php        # Registration form
├── login.php           # Login form and logic
├── index.php           # Home page (shows login status)
└── logout.php          # Destroy session
```

---

## Step 1: Create `users.json`

Create a JSON file with username as key and **hashed password** as value.

```json
{
    "admin": "$2y$12$hashedPasswordHere..."
}
```

**Note:** Never store plaintext passwords! Use `password_hash()` to generate hashes.

---

## Step 2: Create `register.php`

This file handles new user registration with password hashing.

### PHP Logic (before HTML):

1. Start the session
2. Initialize `$error = ''` and `$success = ''`
3. Check if form is submitted using `$_SERVER['REQUEST_METHOD'] === 'POST'`
4. Get username, password, and confirm password from `$_POST`
5. Validate:
   - Username and password are not empty
   - Passwords match
   - Password is at least 6 characters
6. Read existing users from `users.json`
7. Check if username already exists
8. Hash the password using `password_hash($password, PASSWORD_DEFAULT)`
9. Add new user to array and save to `users.json`
10. Show success message

### HTML:

1. Show error/success messages
2. Create a form with `method="POST"`
3. Add username input
4. Add password input
5. Add confirm password input
6. Add submit button
7. Add link to login page

---

## Step 3: Create `login.php`

This file handles the login form and authentication.

### PHP Logic (before HTML):

1. Start the session
2. Read `users.json` using `file_get_contents()`
3. Convert JSON to array using `json_decode($json, true)`
4. Initialize `$error = ''`
5. Check if form is submitted
6. Get username and password from `$_POST`
7. Check if user exists and verify password using `password_verify($password, $hash)`
8. If valid: store username in `$_SESSION['user']` and redirect to `index.php`
9. If invalid: set error message

### HTML:

1. Show error message if `$error` is not empty
2. Create a form with `method="POST"`
3. Add username input (type="text")
4. Add password input (type="password")
5. Add submit button
6. Add links to register and home pages

---

## Step 4: Create `index.php`

The home page that shows different content based on login status.

### PHP Logic:

1. Start the session
2. Check if user is logged in: `isset($_SESSION['user'])`

### HTML:

1. If logged in: show welcome message with username and logout link
2. If not logged in: show message with login and register links

---

## Step 5: Create `logout.php`

Simple file to destroy the session (no HTML needed).

1. Start the session
2. Clear session data: `$_SESSION = []`
3. Destroy session: `session_destroy()`
4. Redirect to `index.php`

---

## Running the Project

```bash
cd 15-login-system
php -S localhost:8015
```

Open browser: http://localhost:8015

## Test Credentials

| Username | Password   |
| -------- | ---------- |
| admin    | admin123   |
| kiran    | kiran123   |
| student  | student123 |

## Key Functions Reference

| Function                              | Purpose                           |
| ------------------------------------- | --------------------------------- |
| `session_start()`                     | Start/resume session              |
| `file_get_contents()`                 | Read file as string               |
| `file_put_contents()`                 | Write string to file              |
| `json_decode($json, true)`            | Convert JSON to array             |
| `json_encode($arr, JSON_PRETTY_PRINT)`| Convert array to JSON             |
| `password_hash($pw, PASSWORD_DEFAULT)`| Hash a password securely          |
| `password_verify($pw, $hash)`         | Verify password against hash      |
| `$_SESSION['key']`                    | Store/read session data           |
| `header('Location: url')`             | Redirect to another page          |
| `session_destroy()`                   | End the session                   |

## Important Rules

1. `session_start()` must be called before ANY HTML
2. `header()` must be called before any output
3. Always use `exit` after redirect
4. Never store plaintext passwords - always use `password_hash()`
5. Always verify passwords using `password_verify()`, never compare directly
