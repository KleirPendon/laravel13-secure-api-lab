# Module 5: Secure API Lab Submission

* **Name:** Kleir A.Pendon
* **Section:** BSICT 3B
* **GitHub Repository URL:** https://github.com/KleirPendon/laravel13-secure-api-lab

## Reflection
A 401 response means I didn't send a valid token, so the API blocked me, while a successful profile response returns my user info because my token was accepted. Once I log out, my token gets deleted, so trying to use that same token again will just give me a 401 error.