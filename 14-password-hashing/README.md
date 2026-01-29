# Password Security in PHP

### Key Functions

```php
// Hash (registration)
$hash = password_hash($password, PASSWORD_DEFAULT);

// Verify (login)
if (password_verify($password, $storedHash)) {
    // Password correct!
}
```

### Files

| File | Description |
|------|-------------|
| index.php | Basic demo - hash & verify with interactive test |
| 01_hashing.php | Why hashing, multiple hash demo, verification table, hash structure |
| 02_register.php | User registration with validation and password hashing |
| 03_login.php | User login with password_verify() |

### index.php
- Shows password and its hash
- Displays key code snippet
- Interactive form to test password matching

### 01_hashing.php
- Explains why hashing is important (plain text vs MD5 vs bcrypt)
- Shows same password creates different hashes
- Verification table with pass/fail examples
- Hash structure breakdown ($2y, cost, salt, hash)

### 02_register.php
- Registration form (username, email, password)
- Input validation (length, email format)
- Uses `password_hash()` to store password
- Saves users to JSON file

### 03_login.php
- Login form (username, password)
- Uses `password_verify()` to check password
- Session management (login/logout)
- Shows logged-in user info

### Golden Rules

1. **NEVER** store passwords in plain text
2. **NEVER** use MD5 or SHA1 for passwords
3. **ALWAYS** use `password_hash()` with `PASSWORD_DEFAULT`
4. **ALWAYS** use `password_verify()` to check passwords

### Why `password_hash()` with `PASSWORD_DEFAULT`?

```php
$hash = password_hash($password, PASSWORD_DEFAULT);
```

- **Strongest algorithm automatically** — Uses the best available algorithm in your PHP version (currently bcrypt, may upgrade to Argon2 in future)
- **Future-proof** — When PHP upgrades its default algorithm, your code benefits without any changes
- **Automatic salt generation** — No need to create your own salt
- **Intentionally slow** — Makes brute-force attacks computationally expensive

**Why not `md5()` or `sha256()`?**
- Those are **fast** hashes designed for data integrity, not passwords
- Fast = attackers can try billions of guesses per second
- `password_hash()` uses bcrypt/argon2 which are intentionally **slow**

### Why `password_verify()` for checking?

```php
if (password_verify($inputPassword, $storedHash)) {
    // Password is correct
}
```

- **Timing-safe comparison** — Prevents timing attacks where attackers measure response time to guess characters
- **Handles algorithm upgrades** — Can verify hashes created with older algorithms even after `PASSWORD_DEFAULT` changes
- **Extracts parameters automatically** — The hash contains algorithm, cost, and salt info

**Why not compare hashes directly?**
```php
// DON'T DO THIS
if (password_hash($input, PASSWORD_DEFAULT) === $storedHash) // WRONG!
```
- Each call to `password_hash()` generates a different hash (different salt)
- Direct comparison is vulnerable to timing attacks

### Run

```bash
php -S localhost:8014
```

Then open http://localhost:8014
