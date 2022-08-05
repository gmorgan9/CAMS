# Notes
Everything is working as of right now. Trying to keep up on the notes.

# Middleware
### Admin Pages
```
if(!isAdmin()){
   header('location: /dashboard.php');
}
```
### Not Logged in
```
if(!isLoggedIn()){
   header('location: /login.php');
}
```
### Logged in
```
if(isLoggedIn()){
   header('location: /dashboard.php');
}