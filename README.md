# CS100 Module 12 — From GitHub Pages to EC2 and PHP

**Based on Module 11 Challenge 4: Power Up! Portfolio.**

## Folders
- `portfolio/`: completed Module 11 HTML, CSS and JavaScript Portfolio with localStorage. Deploy these same files to GitHub Pages and then to Apache on EC2. They require **no PHP**.
- `php_form/`: separate HTML GET/POST form and incomplete PHP receiver for the **end-of-class** activity. PHP will not execute on GitHub Pages.
- `docs/`: guided instructions and checklist.

## Learning path
1. Deploy `portfolio/` to GitHub Pages (static hosting).
2. Launch an Ubuntu EC2 instance, configure access, and install Apache.
3. Publish the **same** Portfolio files on EC2 (still no backend).
4. Compare the Portfolio in different browsers: localStorage data is separate.
5. Install PHP on EC2 and complete `php_form/receive.php` to receive GET and POST data.

**Important:** Closing the browser does not normally erase localStorage. The limitation is that data does not automatically travel to another browser or device. PHP receiving a form does not make data persistent; server-side storage is Module 13.

Start with `docs/STUDENT_LAB.md`.
